<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Jawaban;
use App\Models\HasilKuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class KuisController extends Controller
{
    /**
     * Tampilkan halaman kuis berdasarkan tipe
     */
    private function showKuisPage($kuisType, $viewName)
    {
        try {
            $soal = Soal::with('jawaban')->where('kuis_type', $kuisType)->get();
            
            if ($soal->isEmpty()) {
                return redirect()->back()->with('error', 'Belum ada soal yang tersedia untuk kuis ini.');
            }

            $hasilSebelumnya = Auth::check() ? HasilKuis::getLatestResult(Auth::id(), $kuisType) : null;

            // Format data soal untuk JavaScript
            $soalFormatted = $soal->map(function($item) {
                return [
                    'id' => $item->id,
                    'question' => $item->pertanyaan, // Ganti 'pertanyaan' menjadi 'question'
                    'options' => $item->jawaban->map(function($jawaban) {
                        return [
                            'option' => $jawaban->pilihan, // Ganti 'pilihan' menjadi 'option'
                            'text' => $jawaban->teks_jawaban // Ganti 'teks_jawaban' menjadi 'text'
                        ];
                    })
                ];
            });

            return view($viewName, compact('soal', 'hasilSebelumnya', 'soalFormatted'));

        } catch (\Exception $e) {
            Log::error("Error loading kuis {$kuisType}: " . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan halaman kuis 1
     */
    public function index(Request $request)
    {
        return $this->showKuisPage('kuis1', 'kuis.kuis1');
    }

    /**
     * Tampilkan halaman kuis 2
     */
    public function showKuis2(Request $request)
    {
        return $this->showKuisPage('kuis2', 'kuis.kuis2');
    }

    /**
     * Tampilkan halaman kuis 3
     */
    public function showKuis3(Request $request)
    {
        return $this->showKuisPage('kuis3', 'kuis.kuis3');
    }
    
    public function showEvaluasi(Request $request)
    {
        return $this->showKuisPage('evaluasi', 'kuis.evaluasi');
    }



    /**
     * Proses submit kuis (universal untuk semua kuis)
     */
    public function submitKuis(Request $request)
    {
        try {
            if (!Auth::check()) {
                return $this->handleErrorResponse($request, 'Silakan login terlebih dahulu untuk mengerjakan kuis.');
            }

            $user = Auth::user();
            
            if (!$user || !$user->exists) {
                Auth::logout();
                return $this->handleErrorResponse($request, 'Session Anda tidak valid. Silakan login kembali.');
            }

            // Tentukan kuisType dari route atau input
            $kuisType = $this->determineKuisType($request);

            // Validasi input
            $this->validateKuisSubmission($request);

            // Proses jawaban
            $result = $this->processKuisAnswers($request, $kuisType, $user);
            
            if (!$result['success']) {
                return $this->handleErrorResponse($request, $result['message']);
            }

            // Simpan hasil kuis
            $hasilKuis = $this->saveKuisResult($result, $user, $kuisType);

            return $this->handleSuccessResponse($request, $hasilKuis, $result);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->handleValidationError($request, $e);
        } catch (\Exception $e) {
            Log::error('Error submit kuis:', [
                'error' => $e->getMessage(),
                'user_id' => Auth::id(),
                'kuis_type' => $kuisType ?? 'unknown'
            ]);
            
            return $this->handleErrorResponse($request, 'Terjadi kesalahan sistem: ' . $e->getMessage());
        }
    }

    /**
     * Tentukan tipe kuis dari request
     */
    private function determineKuisType(Request $request)
    {
        // Cek dari input form
        $kuisType = $request->input('nama_kuis', 'kuis1');
        
        // Jika dari form masih default, cek dari route
        if ($kuisType === 'kuis1') {
            $currentRoute = $request->route();
            if ($currentRoute) {
                $routeName = $currentRoute->getName();
                if (str_contains($routeName, 'kuis2')) return 'kuis2';
                if (str_contains($routeName, 'kuis3')) return 'kuis3';
                if (str_contains($routeName, 'evaluasi')) return 'evaluasi';
            }
        }
        
        return $kuisType;
    }

    /**
     * Validasi submission kuis
     */
    private function validateKuisSubmission(Request $request)
    {
        $request->validate([
            'jawaban' => 'required|array|min:1',
            'waktu_mulai' => 'required|integer',
        ], [
            'jawaban.required' => 'Anda harus menjawab semua soal.',
            'jawaban.array' => 'Format jawaban tidak valid.',
            'jawaban.min' => 'Anda harus menjawab minimal 1 soal.',
            'waktu_mulai.required' => 'Waktu mulai tidak valid.',
        ]);
    }

    /**
     * Proses jawaban kuis
     */
    private function processKuisAnswers(Request $request, $kuisType, $user)
    {
        $soal = Soal::with(['jawaban', 'jawabanBenar'])->where('kuis_type', $kuisType)->get();
        
        if ($soal->isEmpty()) {
            return ['success' => false, 'message' => 'Tidak ada soal yang tersedia.'];
        }

        $totalSoal = $soal->count();
        $jawabanUser = $request->input('jawaban', []);
        $waktuMulai = $request->input('waktu_mulai');
        
        $waktuSelesai = time();
        $waktuPengerjaan = $waktuSelesai - $waktuMulai;

        $jawabanBenar = 0;
        $detailJawaban = [];

        foreach ($soal as $s) {
            $soalId = $s->id;
            $jawabanUserPilihan = $jawabanUser[$soalId] ?? null;
            
            if ($jawabanUserPilihan) {
                $jawabanDipilih = $s->jawaban->where('pilihan', $jawabanUserPilihan)->first();
                $jawabanBenarSoal = $s->jawabanBenar;
                
                $isBenar = $jawabanDipilih && $jawabanBenarSoal && 
                          $jawabanDipilih->pilihan === $jawabanBenarSoal->pilihan;
                
                if ($isBenar) {
                    $jawabanBenar++;
                }

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

        return [
            'success' => true,
            'total_soal' => $totalSoal,
            'jawaban_benar' => $jawabanBenar,
            'jawaban_salah' => $jawabanSalah,
            'nilai' => $nilai,
            'detail_jawaban' => $detailJawaban,
            'waktu_pengerjaan' => $waktuPengerjaan
        ];
    }

    private function getSubmitUrl()
{
    // Logika untuk menentukan URL submit berdasarkan quizId
    return match($this->quizId) {
        'kuis1' => route('kuis1.submit'),
        'kuis2' => route('kuis2.submit'),
        'kuis3' => route('kuis3.submit'),
        'evaluasi' => route('evaluasi.submit'),
        default => route('kuis.submit')
    };
}

    /**
     * Simpan hasil kuis ke database
     */
    private function saveKuisResult($result, $user, $kuisType)
    {
        $namaKuis = match($kuisType) {
            'kuis1' => 'Kuis 1',
            'kuis2' => 'Kuis 2', 
            'kuis3' => 'Kuis 3',
            'evaluasi' => 'Evaluasi',
            default => ucfirst($kuisType)
        };

        return HasilKuis::create([
            'user_id' => $user->id,
            'nama_kuis' => $namaKuis,
            'total_soal' => $result['total_soal'],
            'jawaban_benar' => $result['jawaban_benar'],
            'jawaban_salah' => $result['jawaban_salah'],
            'nilai' => $result['nilai'],
            'detail_jawaban' => $result['detail_jawaban'],
            'waktu_pengerjaan' => $result['waktu_pengerjaan'],
            'tanggal_kuis' => Carbon::now(),
        ]);
    }

    /**
     * Handle success response
     */
    private function handleSuccessResponse(Request $request, $hasilKuis, $result)
    {
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'nama' => Auth::user()->name,
                    'nisn' => Auth::user()->nisn,
                    'kelas' => Auth::user()->kelas,
                    'nilai' => number_format($result['nilai'], 1),
                    'grade' => $hasilKuis->grade,
                    'status' => $hasilKuis->status,
                    'jawaban_benar' => $result['jawaban_benar'],
                    'total_soal' => $result['total_soal'],
                    'waktu_pengerjaan' => $hasilKuis->formatted_waktu,
                    'tanggal_kuis' => $hasilKuis->tanggal_kuis->format('d M Y, H:i'),
                    'hasil_id' => $hasilKuis->id
                ]
            ]);
        }

        return redirect()->route('kuis.hasil', ['id' => $hasilKuis->id])
                       ->with('success', 'Kuis berhasil diselesaikan!');
    }

    /**
     * Handle error response
     */
    private function handleErrorResponse(Request $request, $message)
    {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => $message], 422);
        }
        
        return redirect()->back()->with('error', $message);
    }

    /**
     * Handle validation error
     */
    private function handleValidationError(Request $request, $e)
    {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
        
        return redirect()->back()
                       ->withErrors($e->errors())
                       ->withInput()
                       ->with('error', 'Data yang dimasukkan tidak valid.');
    }

    /**
     * Tampilkan hasil kuis
     */
    public function hasil($id)
    {
        try {
            $hasil = HasilKuis::with('user')->findOrFail($id);
            
            if (!Auth::check() || (Auth::id() !== $hasil->user_id && !Auth::user()->isAdmin())) {
                return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
            }

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
     * Tampilkan hasil semua kuis
     */
    public function hasilSemuaKuis()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        
        $user = Auth::user();
        
        // Ambil hasil kuis terbaru untuk setiap jenis kuis
        $quizResults = [
            'kuis1' => $user->getLatestQuizResult('kuis1'),
            'kuis2' => $user->getLatestQuizResult('kuis2'),
            'kuis3' => $user->getLatestQuizResult('kuis3'),
            'evaluasi' => $user->getLatestQuizResult('evaluasi'),
        ];
        
        // Hitung progress
        $totalQuizCount = 3; // Total kuis yang tersedia
        $completedQuizCount = 0;
        
        foreach ($quizResults as $result) {
            if ($result) {
                $completedQuizCount++;
            }
        }
        
        $progressPercentage = ($completedQuizCount / $totalQuizCount) * 100;
        
        // Catat progress di database
        $this->updateKuisProgress($user->id, $completedQuizCount, $totalQuizCount);
        
        return view('kuis.hasil_semua_kuis', compact(
            'quizResults', 
            'totalQuizCount', 
            'completedQuizCount', 
            'progressPercentage'
        ));
    }
    
    /**
     * Update progress kuis di database
     */
    private function updateKuisProgress($userId, $completedCount, $totalCount)
    {
        $namaAktivitas = 'kuis-progress';
        $judulAktivitas = 'Progress Kuis';
        $skor = $completedCount;
        $totalSoal = $totalCount;
        
        // Gunakan model ProgresSiswa untuk mencatat progress
        \App\Models\ProgresSiswa::catatProgres(
            $userId,
            $namaAktivitas,
            $judulAktivitas,
            $skor,
            $totalSoal
        );
    }

    /**
     * Reset kuis (untuk testing)
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
     * Evaluasi
     */
    
}