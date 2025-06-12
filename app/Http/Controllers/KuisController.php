<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\HasilKuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KuisController extends Controller
{
    /**
     * Tampilkan halaman kuis 1
     */
    public function index(Request $request)
    {
        try {
            // Ambil soal khusus untuk kuis 1
            $soal = Soal::with('jawaban')->where('kuis_type', 'kuis1')->get();
            
            if ($soal->isEmpty()) {
                return redirect()->back()->with('error', 'Belum ada soal yang tersedia untuk kuis ini.');
            }

            // Cek apakah user sudah pernah mengerjakan kuis ini
            $hasilSebelumnya = null;
            if (Auth::check()) {
                $hasilSebelumnya = HasilKuis::getLatestResult(Auth::id(), 'kuis1');
            }

            // Jika ada request POST (submit kuis)
            if ($request->isMethod('post')) {
                return $this->submitKuis($request, 'kuis1');
            }

            return view('kuis.kuis1', compact('soal', 'hasilSebelumnya'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan halaman kuis 2
     */
    public function showKuis2(Request $request)
    {
        try {
            // Ambil soal khusus untuk kuis 2
            $soal = Soal::with('jawaban')->where('kuis_type', 'kuis2')->get();
            
            if ($soal->isEmpty()) {
                return redirect()->back()->with('error', 'Belum ada soal yang tersedia untuk kuis ini.');
            }

            // Cek apakah user sudah pernah mengerjakan kuis ini
            $hasilSebelumnya = null;
            if (Auth::check()) {
                $hasilSebelumnya = HasilKuis::getLatestResult(Auth::id(), 'kuis2');
            }

            // Jika ada request POST (submit kuis)
            if ($request->isMethod('post')) {
                return $this->submitKuis($request, 'kuis2');
            }

            return view('kuis.kuis2', compact('soal', 'hasilSebelumnya'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan halaman kuis 3
     */
    public function showKuis3(Request $request)
    {
        try {
            // Ambil soal khusus untuk kuis 3
            $soal = Soal::with('jawaban')->where('kuis_type', 'kuis3')->get();
            
            if ($soal->isEmpty()) {
                return redirect()->back()->with('error', 'Belum ada soal yang tersedia untuk kuis ini.');
            }

            // Cek apakah user sudah pernah mengerjakan kuis ini
            $hasilSebelumnya = null;
            if (Auth::check()) {
                $hasilSebelumnya = HasilKuis::getLatestResult(Auth::id(), 'kuis3');
            }

            // Jika ada request POST (submit kuis)
            if ($request->isMethod('post')) {
                return $this->submitKuis($request, 'kuis3');
            }

            return view('kuis.kuis3', compact('soal', 'hasilSebelumnya'));

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Proses submit kuis (universal untuk semua kuis)
     */
    public function submitKuis(Request $request, $kuisType = 'kuis1')
    {
        try {
            // Validasi user harus login dan ada di database
            if (!Auth::check()) {
                return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengerjakan kuis.');
            }

            $user = Auth::user();
            
            // Double check apakah user masih ada di database
            if (!$user || !$user->exists) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Session Anda tidak valid. Silakan login kembali.');
            }

            // Debug info (comment out setelah testing)
            \Log::info('User submit kuis:', [
                'user_id' => $user->id,
                'user_name' => $user->name,
                'kuis_type' => $kuisType,
                'auth_id' => Auth::id()
            ]);

            // Validasi input
            $request->validate([
                'jawaban' => 'required|array',
                'waktu_mulai' => 'required|integer',
            ], [
                'jawaban.required' => 'Anda harus menjawab semua soal.',
                'jawaban.array' => 'Format jawaban tidak valid.',
                'waktu_mulai.required' => 'Waktu mulai tidak valid.',
            ]);

            // Ambil soal berdasarkan tipe kuis
            $soal = Soal::with(['jawaban', 'jawabanBenar'])->where('kuis_type', $kuisType)->get();
            
            if ($soal->isEmpty()) {
                return redirect()->back()->with('error', 'Tidak ada soal yang tersedia.');
            }

            $totalSoal = $soal->count();
            $jawabanUser = $request->input('jawaban');
            $waktuMulai = $request->input('waktu_mulai');
            
            // Hitung waktu pengerjaan
            $waktuSelesai = time();
            $waktuPengerjaan = $waktuSelesai - $waktuMulai;

            $jawabanBenar = 0;
            $detailJawaban = [];

            // Periksa setiap jawaban
            foreach ($soal as $index => $s) {
                $soalId = $s->id;
                $jawabanUserPilihan = $jawabanUser[$soalId] ?? null;
                
                if ($jawabanUserPilihan) {
                    // Cari jawaban yang dipilih user
                    $jawabanDipilih = $s->jawaban->where('pilihan', $jawabanUserPilihan)->first();
                    $jawabanBenarSoal = $s->jawabanBenar;
                    
                    $isBenar = $jawabanDipilih && $jawabanBenarSoal && 
                              $jawabanDipilih->pilihan === $jawabanBenarSoal->pilihan;
                    
                    if ($isBenar) {
                        $jawabanBenar++;
                    }

                    // Simpan detail jawaban
                    $detailJawaban[] = [
                        'soal_id' => $soalId,
                        'pertanyaan' => $s->pertanyaan,
                        'jawaban_user' => $jawabanUserPilihan,
                        'jawaban_benar' => $jawabanBenarSoal ? $jawabanBenarSoal->pilihan : null,
                        'is_benar' => $isBenar,
                        'teks_jawaban_user' => $jawabanDipilih ? $jawabanDipilih->teks_jawaban : null,
                        'teks_jawaban_benar' => $jawabanBenarSoal ? $jawabanBenarSoal->teks_jawaban : null,
                    ];
                }
            }

            $jawabanSalah = $totalSoal - $jawabanBenar;
            $nilai = $totalSoal > 0 ? ($jawabanBenar / $totalSoal) * 100 : 0;

            // Konversi kuisType ke nama yang sesuai untuk database
            $namaKuis = match($kuisType) {
                'kuis1' => 'Kuis 1',
                'kuis2' => 'Kuis 2', 
                'kuis3' => 'Kuis 3',
                default => ucfirst($kuisType)
            };

            // Simpan hasil ke database dengan user_id yang valid
            $hasilKuis = HasilKuis::create([
                'user_id' => $user->id,
                'nama_kuis' => $namaKuis,
                'total_soal' => $totalSoal,
                'jawaban_benar' => $jawabanBenar,
                'jawaban_salah' => $jawabanSalah,
                'nilai' => $nilai,
                'detail_jawaban' => $detailJawaban,
                'waktu_pengerjaan' => $waktuPengerjaan,
                'tanggal_kuis' => \Carbon\Carbon::now(),
            ]);

            // Return JSON response untuk popup
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'data' => [
                        'nama' => $user->name,
                        'nisn' => $user->nisn,
                        'kelas' => $user->kelas,
                        'nilai' => number_format($nilai, 1),
                        'grade' => $hasilKuis->grade,
                        'status' => $hasilKuis->status,
                        'jawaban_benar' => $jawabanBenar,
                        'total_soal' => $totalSoal,
                        'waktu_pengerjaan' => $hasilKuis->formatted_waktu,
                        'tanggal_kuis' => $hasilKuis->tanggal_kuis->format('d M Y, H:i'),
                        'hasil_id' => $hasilKuis->id
                    ]
                ]);
            }

            return redirect()->route('kuis.hasil', ['id' => $hasilKuis->id])
                           ->with('success', 'Kuis berhasil diselesaikan!');

        } catch (\Illuminate\Validation\ValidationException $e) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'errors' => $e->errors()], 422);
            }
            return redirect()->back()
                           ->withErrors($e->errors())
                           ->withInput()
                           ->with('error', 'Data yang dimasukkan tidak valid.');
        } catch (\Exception $e) {
            \Log::error('Error submit kuis:', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'kuis_type' => $kuisType
            ]);
            
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'Terjadi kesalahan sistem'], 500);
            }
            
            return redirect()->back()
                           ->with('error', 'Terjadi kesalahan sistem: ' . $e->getMessage())
                           ->withInput();
        }
    }

    /**
     * Tampilkan hasil kuis
     */
    public function hasil($id)
    {
        try {
            $hasil = HasilKuis::with('user')->findOrFail($id);
            
            // Pastikan user hanya bisa melihat hasil kuisnya sendiri (kecuali admin)
            if (!Auth::check() || (Auth::id() !== $hasil->user_id && !Auth::user()->isAdmin())) {
                return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }

            // Statistik tambahan berdasarkan nama kuis
            $rataRataNilai = HasilKuis::getAverageScore($hasil->nama_kuis);
            $totalPeserta = HasilKuis::where('nama_kuis', $hasil->nama_kuis)->distinct('user_id')->count();

            return view('kuis.hasil', compact('hasil', 'rataRataNilai', 'totalPeserta'));

        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Hasil kuis tidak ditemukan.');
        }
    }

    /**
     * Tampilkan riwayat kuis user
     */
    public function riwayat()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $riwayat = HasilKuis::where('user_id', Auth::id())
                           ->orderBy('tanggal_kuis', 'desc')
                           ->paginate(10);

        return view('kuis.riwayat', compact('riwayat'));
    }

    /**
     * Reset kuis (untuk testing - hapus jika tidak diperlukan)
     */
    public function reset($namaKuis)
    {
        if (!Auth::check() || !Auth::user()->isAdmin()) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        HasilKuis::where('nama_kuis', $namaKuis)->delete();
        
        return redirect()->back()->with('success', 'Data kuis berhasil direset.');
    }

    /**
     * Evaluasi (placeholder)
     */
    public function showEvaluasi()
    {
        return view('kuis.evaluasi');
    }
}