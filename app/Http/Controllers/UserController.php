<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HasilKuis;
use Illuminate\Http\Request;
use App\Models\ProgresSiswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PengaturanKKM;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::select('name', 'nisn', 'kelas', 'password', 'password_plain')->get();
        
        return view('admin/dashboard', compact('users'));
    }

    public function nilaiSiswa()
    {
        // Gunakan query yang PERSIS SAMA dengan detailNilaiSiswa
        $users = User::where('level', 'siswa')
            ->with(['hasilKuis' => function($query) {
                $query->select('user_id', 'nama_kuis', 'nilai', 'jawaban_benar', 'jawaban_salah', 'total_soal', 'detail_jawaban', 'waktu_pengerjaan', 'tanggal_kuis')
                      ->orderBy('tanggal_kuis', 'desc');
            }])
            ->select('id', 'name', 'nisn', 'kelas')
            ->get();

        // Transform data dengan groupBy yang sama seperti di detail-nilai-siswa
        $dataSiswa = $users->map(function($user) {
            // Gunakan groupBy yang SAMA dengan detail-nilai-siswa
            $groupedKuis = $user->hasilKuis->groupBy('nama_kuis');
            
            return [
                'id' => $user->id,
                'name' => $user->name,
                'nisn' => $user->nisn,
                'kelas' => $user->kelas,
                'grouped_kuis' => $groupedKuis, // Tambahkan ini untuk debug
                'kuis_1' => $this->extractKuisData($groupedKuis, 'kuis1'),
                'kuis_2' => $this->extractKuisData($groupedKuis, 'kuis2'),
                'kuis_3' => $this->extractKuisData($groupedKuis, 'kuis3'),
                'evaluasi' => $this->extractKuisData($groupedKuis, 'evaluasi'),
            ];
        });

        return view('admin/nilai-siswa', compact('dataSiswa'));
    }

    /**
     * Extract data kuis berdasarkan type yang sama dengan detail-nilai-siswa
     */
    private function extractKuisData($groupedKuis, $type)
    {
        $namaKuisKeys = $groupedKuis->keys()->toArray();
        
        // Definisi pola nama kuis berdasarkan type
        $patterns = [
            'kuis1' => ['Kuis 1', 'kuis 1', 'Kuis1', 'Quiz 1', 'KUIS 1', 'Kuis_1'],
            'kuis2' => ['Kuis 2', 'kuis 2', 'Kuis2', 'Quiz 2', 'KUIS 2', 'Kuis_2'],
            'kuis3' => ['Kuis 3', 'kuis 3', 'Kuis3', 'Quiz 3', 'KUIS 3', 'Kuis_3'],
            'evaluasi' => ['Evaluasi', 'evaluasi', 'EVALUASI', 'Ujian', 'ujian', 'UJIAN']
        ];

        if (!isset($patterns[$type])) {
            return null;
        }

        // Cari nama kuis yang cocok
        $namaKuisYangCocok = null;
        foreach ($patterns[$type] as $pattern) {
            if (in_array($pattern, $namaKuisKeys)) {
                $namaKuisYangCocok = $pattern;
                break;
            }
        }

        // Jika tidak ada yang cocok, coba pencarian partial
        if (!$namaKuisYangCocok) {
            foreach ($namaKuisKeys as $key) {
                foreach ($patterns[$type] as $pattern) {
                    if (stripos($key, $pattern) !== false || stripos($pattern, $key) !== false) {
                        $namaKuisYangCocok = $key;
                        break 2;
                    }
                }
            }
        }

        if (!$namaKuisYangCocok || !$groupedKuis->has($namaKuisYangCocok)) {
            return null;
        }

        // Ambil data hasil kuis terbaru (sama seperti di detail-nilai)
        $hasilKuis = $groupedKuis->get($namaKuisYangCocok)->first();
        
        if (!$hasilKuis) {
            return null;
        }

        return [
            'nilai' => $hasilKuis->nilai,
            'jawaban_benar' => $hasilKuis->jawaban_benar,
            'jawaban_salah' => $hasilKuis->jawaban_salah,
            'total_soal' => $hasilKuis->total_soal,
            'grade' => $hasilKuis->grade,
            'status' => $hasilKuis->status,
            'persentase' => $hasilKuis->persentase_benar,
            'nama_kuis' => $namaKuisYangCocok // Untuk debug
        ];
    }

    /**
     * Method untuk mendapatkan detail nilai siswa specific
     */
    public function detailNilaiSiswa($userId)
    {
        $user = User::with(['hasilKuis' => function($query) {
            $query->select('user_id', 'nama_kuis', 'nilai', 'jawaban_benar', 'jawaban_salah', 'total_soal', 'detail_jawaban', 'waktu_pengerjaan', 'tanggal_kuis')
                  ->orderBy('tanggal_kuis', 'desc');
        }])->findOrFail($userId);

        return view('admin/detail-nilai-siswa', compact('user'));
    }

    /**
     * Method untuk export nilai siswa (opsional)
     */
    public function exportNilai()
    {
        $users = User::where('level', 'siswa')
            ->with('hasilKuis')
            ->get();

        // Logic untuk export ke Excel/CSV
        // Bisa menggunakan package seperti Laravel Excel
        
        return response()->json(['message' => 'Export feature coming soon']);
    }

    /**
     * Method untuk filter nilai berdasarkan kelas
     */
    public function nilaiSiswaByKelas($kelas)
    {
        // Gunakan query yang PERSIS SAMA dengan nilaiSiswa dan detailNilaiSiswa
        $users = User::where('level', 'siswa')
            ->where('kelas', $kelas)
            ->with(['hasilKuis' => function($query) {
                $query->select('user_id', 'nama_kuis', 'nilai', 'jawaban_benar', 'jawaban_salah', 'total_soal', 'detail_jawaban', 'waktu_pengerjaan', 'tanggal_kuis')
                      ->orderBy('tanggal_kuis', 'desc');
            }])
            ->select('id', 'name', 'nisn', 'kelas')
            ->get();

        // Transform data sama seperti nilaiSiswa()
        $dataSiswa = $users->map(function($user) {
            $groupedKuis = $user->hasilKuis->groupBy('nama_kuis');
            
            return [
                'id' => $user->id,
                'name' => $user->name,
                'nisn' => $user->nisn,
                'kelas' => $user->kelas,
                'grouped_kuis' => $groupedKuis,
                'kuis_1' => $this->extractKuisData($groupedKuis, 'kuis1'),
                'kuis_2' => $this->extractKuisData($groupedKuis, 'kuis2'),
                'kuis_3' => $this->extractKuisData($groupedKuis, 'kuis3'),
                'evaluasi' => $this->extractKuisData($groupedKuis, 'evaluasi'),
            ];
        });

        return view('admin/nilai-siswa', compact('dataSiswa'));
    }

    /**
     * Method untuk debug - melihat nama kuis yang ada di database
     */
    public function debugNamaKuis()
    {
        $namaKuisYangAda = HasilKuis::distinct()->pluck('nama_kuis')->toArray();
        $jumlahData = HasilKuis::count();
        
        // Ambil contoh user untuk melihat struktur grouped data
        $contohUser = User::where('level', 'siswa')
            ->with(['hasilKuis' => function($query) {
                $query->select('user_id', 'nama_kuis', 'nilai', 'jawaban_benar', 'jawaban_salah', 'total_soal', 'detail_jawaban', 'waktu_pengerjaan', 'tanggal_kuis')
                      ->orderBy('tanggal_kuis', 'desc');
            }])
            ->first();
        
        $groupedKuis = $contohUser ? $contohUser->hasilKuis->groupBy('nama_kuis') : collect();
        
        // Test extractKuisData untuk setiap type
        $testResults = [];
        if ($contohUser) {
            $testResults = [
                'kuis1' => $this->extractKuisData($groupedKuis, 'kuis1'),
                'kuis2' => $this->extractKuisData($groupedKuis, 'kuis2'),
                'kuis3' => $this->extractKuisData($groupedKuis, 'kuis3'),
                'evaluasi' => $this->extractKuisData($groupedKuis, 'evaluasi'),
            ];
        }
        
        return response()->json([
            'total_data_hasil_kuis' => $jumlahData,
            'nama_kuis_yang_ada' => $namaKuisYangAda,
            'contoh_user' => $contohUser ? $contohUser->name : 'Tidak ada user',
            'grouped_kuis_keys' => $groupedKuis->keys()->toArray(),
            'test_extract_results' => $testResults,
            'contoh_data' => HasilKuis::with('user:id,name,kelas')->take(3)->get()
        ]);
    }

    /**
     * Method untuk debug data siswa nilai (sementara untuk troubleshooting)
     */
    public function debugDataSiswa()
    {
        // Gunakan query yang SAMA PERSIS dengan nilaiSiswa()
        $users = User::where('level', 'siswa')
            ->with(['hasilKuis' => function($query) {
                $query->select('user_id', 'nama_kuis', 'nilai', 'jawaban_benar', 'jawaban_salah', 'total_soal', 'detail_jawaban', 'waktu_pengerjaan', 'tanggal_kuis')
                      ->orderBy('tanggal_kuis', 'desc');
            }])
            ->select('id', 'name', 'nisn', 'kelas')
            ->take(3) // Ambil 3 siswa saja untuk debug
            ->get();

        $debugData = $users->map(function($user) {
            $groupedKuis = $user->hasilKuis->groupBy('nama_kuis');
            
            return [
                'user_info' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'nisn' => $user->nisn,
                    'kelas' => $user->kelas
                ],
                'raw_hasil_kuis' => $user->hasilKuis->toArray(),
                'grouped_kuis_keys' => $groupedKuis->keys()->toArray(),
                'grouped_kuis_data' => $groupedKuis->map(function($kuis) {
                    return $kuis->map(function($item) {
                        return [
                            'nama_kuis' => $item->nama_kuis,
                            'nilai' => $item->nilai,
                            'tanggal_kuis' => $item->tanggal_kuis
                        ];
                    });
                }),
                'extract_results' => [
                    'kuis1' => $this->extractKuisData($groupedKuis, 'kuis1'),
                    'kuis2' => $this->extractKuisData($groupedKuis, 'kuis2'),
                    'kuis3' => $this->extractKuisData($groupedKuis, 'kuis3'),
                    'evaluasi' => $this->extractKuisData($groupedKuis, 'evaluasi')
                ]
            ];
        });

        // return response()->json([
        //     'message' => 'Debug data untuk troubleshooting nilai siswa',
        //     'total_users_checked' => $users->count(),
        //     'debug_data' => $debugData
        // ], 200, [], JSON_PRETTY_PRINT);
    }
    
     /**
     * Menampilkan progres pengerjaan siswa
     */
    public function progresSiswa(Request $request)
{
    $kelas = $request->get('kelas');
    $aktivitas = $request->get('aktivitas');

    $daftarAktivitas = self::getDaftarAktivitas();

    // Daftar aktivitas yang tersedia - PERBAIKAN: nama harus sama dengan yang disimpan
    $daftarAktivitas = [
        'stimulus-1' => 'Stimulus 1',
        'identifikasi-masalah-1' => 'Identifikasi Masalah 1',
        'pengumpulan-data-1' => 'Pengumpulan Data 1',
        'pengolahan-data-1' => 'Pengolahan Data 1',
        'verifikasi-1' => 'Verifikasi 1',
        'kesimpulan-1' => 'Kesimpulan-1',
    
        // Aktivitas Set 2
        'stimulus-2' => 'Stimulus 2',
        'identifikasi-masalah-2' => 'Identifikasi Masalah 2',
        'pengumpulan-data-2' => 'Pengumpulan Data 2',
        'pengolahan-data-2' => 'Pengolahan Data 2',
        'verifikasi-2' => 'Verifikasi 2',
        'kesimpulan-2' => 'Kesimpulan-2',
        
        // Aktivitas Set 3
        'stimulus-3' => 'Stimulus 3',
        'identifikasi-masalah-3' => 'Identifikasi Masalah 3',
        'pengumpulan-data-3' => 'Pengumpulan Data 3',
        'pengolahan-data-3' => 'Pengolahan Data 3',
        'verifikasi-3' => 'Verifikasi 3',
        'kesimpulan-3' => 'Kesimpulan-3',
        
        // Kuis dan Evaluasi
        'kuis-1' => 'Kuis 1',
        'kuis-2' => 'Kuis 2',
        'kuis-3' => 'Kuis 3',
        'evaluasi' => 'Evaluasi',
    ];

    // Query siswa
    $siswaQuery = User::siswa()->with(['progresSiswa' => function($query) use ($aktivitas) {
        if ($aktivitas) {
            $query->where('nama_aktivitas', $aktivitas);
        }
    }]);

    if ($kelas) {
        $siswaQuery->where('kelas', $kelas);
    }

    $siswa = $siswaQuery->orderBy('kelas')->orderBy('name')->get();

    // Statistik progres
    $statistik = [];
    foreach ($daftarAktivitas as $namaAktivitas => $judulAktivitas) {
        $stats = ProgresSiswa::getStatistikProgres($namaAktivitas);
        $statistik[$namaAktivitas] = array_merge($stats, ['judul' => $judulAktivitas]);
    }

    // Daftar kelas untuk filter
    $daftarKelas = User::siswa()->distinct()->pluck('kelas')->sort()->values();

    return view('admin.progres-siswa', compact(
        'siswa', 
        'daftarAktivitas', 
        'statistik', 
        'daftarKelas',
        'kelas',
        'aktivitas'
    ));
}

    /**
     * API untuk menyimpan progres siswa (dipanggil via AJAX)
     */
       public function simpanProgres(Request $request)
    {
        try {
            // Log untuk debug (convert to array to avoid object logging error)
            \Log::info('Simpan Progres Request:', $request->all());
            
            // Get authenticated user
            $user = Auth::user();
            
            if (!$user) {
                \Log::error('User tidak terautentikasi');
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak terautentikasi'
                ], 401);
            }

            \Log::info('User yang login:', [
                'id' => $user->id,
                'nisn' => $user->nisn,
                'name' => $user->name
            ]);

            $request->validate([
                'nama_aktivitas' => 'required|string',
                'judul_aktivitas' => 'required|string',
                'skor' => 'required|integer|min:0',
                'total_soal' => 'required|integer|min:1',
                'detail_jawaban' => 'nullable'
            ]);

            $userId = $user->id; // Gunakan ID dari user yang terautentikasi
            $namaAktivitas = $request->nama_aktivitas;
            $judulAktivitas = $request->judul_aktivitas;
            $skor = $request->skor;
            $totalSoal = $request->total_soal;
            $detailJawaban = $request->detail_jawaban;

            // Debug log
            \Log::info('Data yang akan disimpan:', [
                'user_id' => $userId,
                'user_nisn' => $user->nisn,
                'nama_aktivitas' => $namaAktivitas,
                'judul_aktivitas' => $judulAktivitas,
                'skor' => $skor,
                'total_soal' => $totalSoal
            ]);

            // Simpan progres menggunakan model
            $progres = ProgresSiswa::catatProgres(
                $userId,
                $namaAktivitas,
                $judulAktivitas,
                $skor,
                $totalSoal,
                $detailJawaban
            );

            // Log hasil (convert to array to avoid object logging error)
            \Log::info('Progres berhasil disimpan:', [
                'id' => $progres->id,
                'user_id' => $progres->user_id,
                'nama_aktivitas' => $progres->nama_aktivitas,
                'status' => $progres->status,
                'skor' => $progres->skor,
                'total_soal' => $progres->total_soal
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Progres berhasil disimpan',
                'data' => [
                    'id' => $progres->id,
                    'status' => $progres->status,
                    'skor' => $progres->skor,
                    'total_soal' => $progres->total_soal,
                    'persentase' => $progres->persentase,
                    'user_info' => [
                        'id' => $user->id,
                        'nisn' => $user->nisn,
                        'name' => $user->name
                    ]
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation Error:', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error simpan progres:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan progres: ' . $e->getMessage()
            ], 500);
        }
    }
    /**
     * Detail progres siswa tertentu
     */
    public function detailProgresSiswa($userId)
    {
        $siswa = User::findOrFail($userId);
        $progres = $siswa->progresSiswa()->with('user')->get();

        // Daftar aktivitas yang tersedia
        $daftarAktivitas = [
            'pengolahan-data-1' => 'Pengolahan Data 1',
            // Tambahkan aktivitas lain di sini
        ];

        return view('admin.detail-progres-siswa', compact('siswa', 'progres', 'daftarAktivitas'));
    }

    /**
     * Reset progres siswa untuk aktivitas tertentu
     */
    public function resetProgres(Request $request)
    {
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'nama_aktivitas' => 'required|string'
            ]);

            $progres = ProgresSiswa::where('user_id', $request->user_id)
                                  ->where('nama_aktivitas', $request->nama_aktivitas)
                                  ->first();

            if ($progres) {
                $progres->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'Progres berhasil direset'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Progres tidak ditemukan'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mereset progres: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Export progres siswa ke Excel/CSV
     */
    public function exportProgres(Request $request)
    {
        $kelas = $request->get('kelas');
        $aktivitas = $request->get('aktivitas');

        // Query progres
        $progresQuery = ProgresSiswa::with('user');

        if ($kelas) {
            $progresQuery->whereHas('user', function($q) use ($kelas) {
                $q->where('kelas', $kelas);
            });
        }

        if ($aktivitas) {
            $progresQuery->where('nama_aktivitas', $aktivitas);
        }

        $progres = $progresQuery->get();

        // Set headers untuk download CSV
        $filename = 'progres_siswa_' . date('Y-m-d_H-i-s') . '.csv';
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $output = fopen('php://output', 'w');
        
        // Header CSV
        fputcsv($output, [
            'Nama Siswa',
            'NISN', 
            'Kelas',
            'Aktivitas',
            'Status',
            'Skor',
            'Total Soal',
            'Persentase',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Waktu Pengerjaan'
        ]);

        // Data CSV
        foreach ($progres as $p) {
            fputcsv($output, [
                $p->user->name,
                $p->user->nisn,
                $p->user->kelas,
                $p->judul_aktivitas,
                $p->status_format,
                $p->skor,
                $p->total_soal,
                $p->persentase . '%',
                $p->tanggal_mulai ? $p->tanggal_mulai->format('d/m/Y H:i') : '',
                $p->tanggal_selesai ? $p->tanggal_selesai->format('d/m/Y H:i') : '',
                $p->waktu_pengerjaan ?: ''
            ]);
        }

        fclose($output);
        exit;
    }

    public static function getDaftarAktivitas()
    {
        return [
            // Aktivitas Set 1
            'stimulus-1' => 'Stimulus 1',
            'identifikasi-masalah-1' => 'Identifikasi Masalah 1',
            'pengumpulan-data-1' => 'Pengumpulan Data 1',
            'pengolahan-data-1' => 'Pengolahan Data 1',
            'verifikasi-1' => 'Verifikasi 1',
            'kesimpulan-1' => 'Kesimpulan-1',
            'kuis-1' => 'Kuis 1',
        
            // Aktivitas Set 2
            'stimulus-2' => 'Stimulus 2',
            'identifikasi-masalah-2' => 'Identifikasi Masalah 2',
            'pengumpulan-data-2' => 'Pengumpulan Data 2',
            'pengolahan-data-2' => 'Pengolahan Data 2',
            'verifikasi-2' => 'Verifikasi 2',
            'kesimpulan-2' => 'Kesimpulan-2',
            'kuis-2' => 'Kuis 2',
            
            // Aktivitas Set 3
            'stimulus-3' => 'Stimulus 3',
            'identifikasi-masalah-3' => 'Identifikasi Masalah 3',
            'pengumpulan-data-3' => 'Pengumpulan Data 3',
            'pengolahan-data-3' => 'Pengolahan Data 3',
            'verifikasi-3' => 'Verifikasi 3',
            'kesimpulan-3' => 'Kesimpulan-3',
            'kuis-3' => 'Kuis 3',

            // Evaluasi Akhir
            'evaluasi' => 'Evaluasi Akhir',
        ];
    }
    public function soalSiswa()
    {
        return view('admin/soal-siswa');
    }

    /**
     * Halaman pengaturan KKM
     */
    public function aturKKM()
    {
        $PengaturanKKM = PengaturanKKM::active()->orderBy('nama_kuis')->get();
        
        // Statistik ketuntasan untuk setiap kuis
        $statistik = [];
        foreach ($PengaturanKKM as $setting) {
            $stats = PengaturanKKM::getStatistikKetuntasan($setting->nama_kuis);
            $statistik[$setting->nama_kuis] = $stats;
        }

        return view('admin.pengaturan-kkm', compact('PengaturanKKM', 'statistik'));
    }

    /**
     * Update KKM via AJAX
     */
    public function updateKkm(Request $request)
    {
        try {
            $request->validate([
                'nama_kuis' => 'required|string',
                'nilai_kkm' => 'required|numeric|min:0|max:100'
            ]);

            $pengaturanKKM = PengaturanKKM::where('nama_kuis', $request->nama_kuis)->first();

            if (!$pengaturanKKM) {
                return response()->json([
                    'success' => false,
                    'message' => 'Setting KKM tidak ditemukan'
                ], 404);
            }

            $pengaturanKKM->update([
                'nilai_kkm' => $request->nilai_kkm
            ]);

            // Hitung ulang statistik setelah update
            $statistik = PengaturanKKM::getStatistikKetuntasan($request->nama_kuis);

            return response()->json([
                'success' => true,
                'message' => 'KKM berhasil diperbarui',
                'data' => [
                    'nama_kuis' => $pengaturanKKM->nama_kuis,
                    'judul_kuis' => $pengaturanKKM->judul_kuis,
                    'nilai_kkm' => $pengaturanKKM->nilai_kkm,
                    'statistik' => $statistik
                ]
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak valid',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Error update KKM:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui KKM: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Reset KKM ke default
     */
    public function resetKkm(Request $request)
    {
        try {
            $request->validate([
                'nama_kuis' => 'required|string'
            ]);

            $defaultKkm = [
                'kuis1' => 75.00,
                'kuis2' => 72.00,
                'kuis3' => 70.00,
                'evaluasi' => 78.00
            ];

            $pengaturanKKM = PengaturanKKM::where('nama_kuis', $request->nama_kuis)->first();

            if (!$pengaturanKKM) {
                return response()->json([
                    'success' => false,
                    'message' => 'Setting KKM tidak ditemukan'
                ], 404);
            }

            $nilaiDefault = $defaultKkm[$request->nama_kuis] ?? 70.00;

            $pengaturanKKM->update([
                'nilai_kkm' => $nilaiDefault
            ]);

            $statistik = PengaturanKKM::getStatistikKetuntasan($request->nama_kuis);

            return response()->json([
                'success' => true,
                'message' => 'KKM berhasil direset ke nilai default',
                'data' => [
                    'nama_kuis' => $pengaturanKKM->nama_kuis,
                    'judul_kuis' => $pengaturanKKM->judul_kuis,
                    'nilai_kkm' => $pengaturanKKM->nilai_kkm,
                    'statistik' => $statistik
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mereset KKM: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Export data ketuntasan berdasarkan KKM
     */
    public function exportKetuntasan(Request $request)
    {
        $kelas = $request->get('kelas');
        $namaKuis = $request->get('nama_kuis');

        // Query siswa dengan hasil kuis
        $users = User::where('level', 'siswa')
            ->with(['hasilKuis' => function($query) use ($namaKuis) {
                if ($namaKuis) {
                    $query->where('nama_kuis', 'like', '%' . $namaKuis . '%');
                }
                $query->orderBy('tanggal_kuis', 'desc');
            }])
            ->when($kelas, function($query, $kelas) {
                return $query->where('kelas', $kelas);
            })
            ->orderBy('kelas')
            ->orderBy('name')
            ->get();

        // Set headers untuk download CSV
        $filename = 'ketuntasan_siswa_' . date('Y-m-d_H-i-s') . '.csv';
        
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $output = fopen('php://output', 'w');
        
        // Header CSV
        fputcsv($output, [
            'Nama Siswa',
            'NISN', 
            'Kelas',
            'Nama Kuis',
            'Nilai',
            'KKM',
            'Status Ketuntasan',
            'Tanggal Kuis'
        ]);

        // Data CSV
        foreach ($users as $user) {
            foreach ($user->hasilKuis as $hasil) {
                fputcsv($output, [
                    $user->name,
                    $user->nisn,
                    $user->kelas,
                    $hasil->nama_kuis,
                    $hasil->nilai,
                    $hasil->getKkm(),
                    $hasil->ketuntasan_text,
                    $hasil->tanggal_kuis ? $hasil->tanggal_kuis->format('d/m/Y H:i') : ''
                ]);
            }
        }

        fclose($output);
        exit;
    }

    /**
     * Get statistik ketuntasan untuk dashboard
     */
    public function getStatistikKetuntasan()
    {
        $PengaturanKKM = PengaturanKKM::active()->get();
        $statistik = [];

        foreach ($PengaturanKKM as $setting) {
            $stats = PengaturanKKM::getStatistikKetuntasan($setting->nama_kuis);
            $statistik[] = array_merge($stats, [
                'nama_kuis' => $setting->nama_kuis,
                'judul_kuis' => $setting->judul_kuis
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $statistik
        ]);
    }
}