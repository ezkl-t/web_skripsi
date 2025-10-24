<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes (tidak perlu login)
Route::get('/', function () {
    return view('beranda');
})->name('home');

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

// Authentication Route
Route::get('/buat-akun', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/buat-akun', [LoginController::class, 'register'])->name('register.post');

// Login Route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login-guru', [LoginController::class, 'showGuruLoginForm'])->name('login.guru');
Route::post('/login', [LoginController::class, 'postLogin'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/buat-akun', function() {
    return view('buat-akun');
});

Route::get('/dbcon', function() {
    return view('dbcon');
});

// Protected Routes for Students (perlu login sebagai siswa)
Route::middleware(['student'])->group(function () {
    
    Route::get('/home', [MateriController::class, 'showMateri'])->name('home');
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // ===== KUIS ROUTES =====
    Route::get('/kuis/hasil/{id}', [KuisController::class, 'hasil'])->name('kuis.hasil');
    Route::get('/kuis/riwayat', [KuisController::class, 'riwayat'])->name('kuis.riwayat');
    Route::get('/kuis/hasil-semua', [KuisController::class, 'hasilSemuaKuis'])->name('kuis.hasil-semua');
    
    // Kuis 1
    Route::get('/kuis1', [KuisController::class, 'index'])->name('kuis1.index');
    Route::post('/kuis1/submit', [KuisController::class, 'submitKuis'])->name('kuis1.submit');
    
    // Kuis 2
    Route::get('/kuis2', [KuisController::class, 'showKuis2'])->name('kuis2.index');
    Route::post('/kuis2/submit', [KuisController::class, 'submitKuis'])->name('kuis2.submit');

    // Kuis 3
    Route::get('/kuis3', [KuisController::class, 'showKuis3'])->name('kuis3.index');
    Route::post('/kuis3/submit', [KuisController::class, 'submitKuis'])->name('kuis3.submit');

    // Universal submit route (fallback)
    Route::post('/kuis/submit', [KuisController::class, 'submitKuis'])->name('kuis.submit');

    Route::post('/kuis/reset/{namaKuis}', [KuisController::class, 'reset'])->name('kuis.reset');
    Route::get('/kuis/evaluasi', [KuisController::class, 'showEvaluasi'])->name('evaluasi');

    // Tugas Siswa Routes (disingkat untuk fokus pada kuis)
    Route::prefix('tugas')->group(function () {
        Route::get('stimulus-1', [TugasController::class, 'showTugas1_0'])->name('stimulus-1');
        Route::get('identifikasi-masalah-1', [TugasController::class, 'showTugas1_1'])->name('identifikasi-masalah-1');
        Route::get('pengumpulan-data-1', [TugasController::class, 'showTugas1_2'])->name('pengumpulan-data-1');
        Route::get('pengolahan-data-1', [TugasController::class, 'showTugas1'])->name('pengolahan-data-1');
        Route::get('verifikasi-1', [TugasController::class, 'showTugas1_4'])->name('verifikasi-1');
        Route::get('kesimpulan-1', [TugasController::class, 'showTugas1_5'])->name('kesimpulan-1');

        Route::get('stimulus-2', [TugasController::class, 'showTugas2_0'])->name('stimulus-2');
        Route::get('identifikasi-masalah-2', [TugasController::class, 'showTugas2'])->name('identifikasi-masalah-2');
        Route::get('pengumpulan-data-2', [TugasController::class, 'showTugas2_2'])->name('pengumpulan-data-2');
        Route::get('pengolahan-data-2', [TugasController::class, 'showTugas2_3'])->name('pengolahan-data-2');
        Route::get('verifikasi-2', [TugasController::class, 'showTugas2_4'])->name('verifikasi-2');
        Route::get('kesimpulan-2', [TugasController::class, 'showTugas2_5'])->name('kesimpulan-2');

        Route::get('stimulus-3', [TugasController::class, 'showTugas3_1'])->name('stimulus-3');
        Route::get('identifikasi-masalah-3', [TugasController::class, 'showTugas3_2'])->name('identifikasi-masalah-3');
        Route::get('pengumpulan-data-3', [TugasController::class, 'showTugas3_3'])->name('pengumpulan-data-3');
        Route::get('pengolahan-data-3', [TugasController::class, 'showTugas3_4'])->name('pengolahan-data-3');
        Route::get('verifikasi-3', [TugasController::class, 'showTugas3_5'])->name('verifikasi-3');
        Route::get('kesimpulan-3', [TugasController::class, 'showTugas3_6'])->name('kesimpulan-3');
    });
    
    // API untuk menyimpan progres
    Route::post('/api/progres/simpan', [UserController::class, 'simpanProgres'])->name('progres.simpan');
});

// Protected Routes for Admin/Guru
Route::prefix('admin')->middleware(['admin'])->group(function () {
    
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard-admin');
    
    // CRUD Siswa
    Route::post('/siswa/tambah', [AuthController::class, 'store'])->name('tambahSiswa');
    Route::put('/siswa/edit/{id}', [AuthController::class, 'update'])->name('editSiswa');
    Route::delete('/siswa/hapus/{id}', [AuthController::class, 'destroy'])->name('deleteSiswa');
    
    // Nilai Siswa
    Route::get('/nilai-siswa', [UserController::class, 'nilaiSiswa'])->name('nilai-siswa');
    Route::get('/nilai-siswa/kelas/{kelas}', [UserController::class, 'nilaiSiswaByKelas'])->name('nilai-siswa-by-kelas');
    Route::get('/detail-nilai-siswa/{userId}', [UserController::class, 'detailNilaiSiswa'])->name('detail-nilai-siswa');
    Route::get('/export-nilai', [UserController::class, 'exportNilai'])->name('export-nilai');

    // Soal Siswa
    Route::get('/soal-siswa', [UserController::class, 'soalSiswa'])->name('soal-siswa');

    // Debug routes
    Route::get('/debug-nama-kuis', [UserController::class, 'debugNamaKuis'])->name('debug-nama-kuis');
    Route::get('/debug-data-siswa', [UserController::class, 'debugDataSiswa'])->name('debug-data-siswa');
    
    // Progres Siswa
    Route::get('/progres-siswa', [UserController::class, 'progresSiswa'])->name('progres-siswa');
    Route::get('/detail-progres-siswa/{userId}', [UserController::class, 'detailProgresSiswa'])->name('detail-progres-siswa');
    Route::post('/progres/reset', [UserController::class, 'resetProgres'])->name('progres.reset');
    Route::get('/export-progres', [UserController::class, 'exportProgres'])->name('export-progres');

    // Pengaturan KKM
    Route::get('/pengaturan-kkm', [UserController::class, 'aturKKM'])->name('pengaturan-kkm');
    Route::post('/update-kkm', [UserController::class, 'updateKkm'])->name('update-kkm');
    Route::post('/reset-kkm', [UserController::class, 'resetKkm'])->name('reset-kkm');
    Route::get('/export-ketuntasan', [UserController::class, 'exportKetuntasan'])->name('export-ketuntasan');
    Route::get('/statistik-ketuntasan', [UserController::class, 'getStatistikKetuntasan'])->name('statistik-ketuntasan');
});

// API Routes
Route::get('/api/login-status', [LoginController::class, 'checkLoginStatus'])->name('api.login.status');

// Debug routes (hapus di production)
Route::post('/test-login-debug', function(Request $request) {
    return response()->json([
        'all_input' => $request->all(),
        'login_type' => $request->input('login_type'),
        'is_guru_login' => $request->input('login_type') === 'guru',
        'referer' => $request->header('referer'),
        'has_guru_in_referer' => str_contains($request->header('referer'), 'login-guru')
    ]);
});

Route::get('/check-users', function() {
    $users = \App\Models\User::all(['id', 'name', 'nisn', 'level', 'kelas']);
    return response()->json($users);
});

Route::get('/pdf/{filename}', function ($filename) {
    $filePath = public_path('pdfs/' . $filename);
    
    if (!file_exists($filePath)) {
        abort(404, 'File PDF tidak ditemukan');
    }

    return response()->file($filePath);
})->name('pdf.view');

// Route untuk daftar materi PDF
Route::get('/api/materi-pdf', function () {
    $materi = [
        [
            'id' => 'sistem-pertahanan-tubuh',
            'nama' => 'Sistem Pertahanan Tubuh',
            'filename' => 'Biologi-BS-KLS-XI-SISTEM PERTAHANAN TUBUH-HAL. 127-166.pdf',
            'deskripsi' => 'Materi lengkap tentang sistem imun dan pertahanan tubuh'
        ],
        // Tambahkan materi lain di sini
    ];
    
    return response()->json($materi);
});