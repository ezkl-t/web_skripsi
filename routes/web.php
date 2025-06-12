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


// Route::get('/buat-akun', [LoginController::class, 'showRegistrationForm'])->name('register');
// Route::post('/buat-akun', [LoginController::class, 'register'])->name('register.post');
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::get('/login-guru', [LoginController::class, 'showGuruLoginForm'])->name('login.guru');
// Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('login.post');
// Route::post('/postLoginGuru', [LoginController::class, 'postGuruLogin'])->name('login.guru.post');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::post('/login', [LoginController::class, 'postLogin'])->name('login.post');
// Route::post('/login-guru', [LoginController::class, 'postGuruLogin'])->name('login.guru.post');

// Authentication Route
Route::get('/buat-akun', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/buat-akun', [LoginController::class, 'register'])->name('register.post');

// Login Route
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login-guru', [LoginController::class, 'showGuruLoginForm'])->name('login.guru');


Route::post('/login', [LoginController::class, 'postLogin'])->name('login.post');

// Logout
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

    Route::get('/home', [MateriController::class, 'showMateri'])->name('home');

    // ===== KUIS ROUTES =====
    Route::get('/kuis/hasil/{id}', [KuisController::class, 'hasil'])->name('kuis.hasil');
    Route::get('/kuis/riwayat', [KuisController::class, 'riwayat'])->name('kuis.riwayat');
    Route::get('/kuis/kuis1', [KuisController::class, 'index'])->name('kuis.index');
    Route::post('/kuis/submit', [KuisController::class, 'submitKuis'])->name('kuis.submit');
    
    Route::get('/kuis2', [KuisController::class, 'showKuis2'])->name('kuis2.index');
    Route::post('/kuis2/submit', function(Request $request) {
        return app(KuisController::class)->submitKuis($request, 'kuis2');
    })->name('kuis2.submit');

    Route::get('/kuis3', [KuisController::class, 'showKuis3'])->name('kuis3.index');
    Route::post('/kuis3/submit', function(Request $request) {
        return app(KuisController::class)->submitKuis($request, 'kuis3');
    })->name('kuis3.submit');

    Route::post('/kuis/reset/{namaKuis}', [KuisController::class, 'reset'])->name('kuis.reset');
    Route::get('/kuis/evaluasi', [KuisController::class, 'showEvaluasi'])->name('evaluasi');

    // Tugas Siswa Routes
    Route::get('tugas/stimulus-1', [TugasController::class, 'showTugas1_0'])->name('stimulus-1');
    Route::get('tugas/identifikasi-masalah-1', [TugasController::class, 'showTugas1_1'])->name('identifikasi-masalah-1');
    Route::get('tugas/pengumpulan-data-1', [TugasController::class, 'showTugas1_2'])->name('pengumpulan-data-1');
    Route::get('tugas/pengolahan-data-1', [TugasController::class, 'showTugas1'])->name('pengolahan-data-1');
    Route::get('tugas/verifikasi-1', [TugasController::class, 'showTugas1_4'])->name('verifikasi-1');
    Route::get('tugas/kesimpulan-1', [TugasController::class, 'showTugas1_5'])->name('kesimpulan-1');

    Route::get('tugas/identifikasi-masalah-2', [TugasController::class, 'showTugas2'])->name('identifikasi-masalah-2');
    Route::get('tugas/pengumpulan-data-2', [TugasController::class, 'showTugas2_2'])->name('pengumpulan-data-2');
    Route::get('tugas/pengolahan-data-2', [TugasController::class, 'showTugas2_3'])->name('pengolahan-data-2');
    Route::get('tugas/verifikasi-2', [TugasController::class, 'showTugas2_4'])->name('verifikasi-2');
    Route::get('tugas/kesimpulan-2', [TugasController::class, 'showTugas2_5'])->name('kesimpulan-2');

    Route::get('tugas/stimulus-3', [TugasController::class, 'showTugas3_1'])->name('stimulus-3');
    Route::get('tugas/identifikasi-masalah-3', [TugasController::class, 'showTugas3_2'])->name('identifikasi-masalah-3');
    Route::get('tugas/pengumpulan-data-3', [TugasController::class, 'showTugas3_3'])->name('pengumpulan-data-3');
    Route::get('tugas/verifikasi-3', [TugasController::class, 'showTugas3_4'])->name('verifikasi-3');
    Route::get('tugas/kesimpulan-3', [TugasController::class, 'showTugas3_5'])->name('kesimpulan-3');
    
    // API untuk menyimpan progres (dipanggil via AJAX dari halaman siswa)
     Route::post('/api/progres/simpan', [UserController::class, 'simpanProgres'])->name('progres.simpan');
});

// Protected Routes for Admin/Guru
Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    
    // Dashboard utama - menampilkan daftar siswa
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard-admin');
    
    // CRUD Siswa menggunakan AuthController
    Route::post('/siswa/tambah', [AuthController::class, 'store'])->name('tambahSiswa');
    Route::put('/siswa/edit/{id}', [AuthController::class, 'update'])->name('editSiswa');
    Route::delete('/siswa/hapus/{id}', [AuthController::class, 'destroy'])->name('deleteSiswa');
    
    // Route untuk nilai siswa
    Route::get('/nilai-siswa', [UserController::class, 'nilaiSiswa'])->name('nilai-siswa');

    // Route untuk filter nilai siswa berdasarkan kelas
    Route::get('/nilai-siswa/kelas/{kelas}', [UserController::class, 'nilaiSiswaByKelas'])->name('nilai-siswa-by-kelas');

    // Route untuk detail nilai siswa spesifik
    Route::get('/detail-nilai-siswa/{userId}', [UserController::class, 'detailNilaiSiswa'])->name('detail-nilai-siswa');

    // Route untuk export nilai (opsional)
    Route::get('/export-nilai', [UserController::class, 'exportNilai'])->name('export-nilai');

    // Route untuk debug nama kuis (untuk troubleshooting)
    Route::get('/debug-nama-kuis', [UserController::class, 'debugNamaKuis'])->name('debug-nama-kuis');

    // Route untuk soal siswa (yang sudah ada)
    Route::get('/soal-siswa', [UserController::class, 'soalSiswa'])->name('soal-siswa');

    Route::get('/soal-siswa', [UserController::class, 'soalSiswa'])->name('soal-siswa');

    Route::get('/debug-nama-kuis', [UserController::class, 'debugNamaKuis'])->name('debug-nama-kuis');

    // Route untuk debug data siswa (untuk troubleshooting spesifik nilai siswa)
    Route::get('/debug-data-siswa', [UserController::class, 'debugDataSiswa'])->name('debug-data-siswa');

    
    // Routes untuk progres siswa
    Route::get('/progres-siswa', [UserController::class, 'progresSiswa'])->name('progres-siswa');
    Route::get('/detail-progres-siswa/{userId}', [UserController::class, 'detailProgresSiswa'])->name('detail-progres-siswa');
    Route::post('/progres/reset', [UserController::class, 'resetProgres'])->name('progres.reset');
    Route::get('/export-progres', [UserController::class, 'exportProgres'])->name('export-progres');

    // Route Pengaturan KKM
    Route::get('/admin/pengaturan-kkm', [UserController::class, 'aturKKM'])->name('pengaturan-kkm');
    Route::post('/admin/update-kkm', [UserController::class, 'updateKkm'])->name('update-kkm');
    Route::post('/admin/reset-kkm', [UserController::class, 'resetKkm'])->name('reset-kkm');
    Route::get('/admin/export-ketuntasan', [UserController::class, 'exportKetuntasan'])->name('export-ketuntasan');
    Route::get('/admin/statistik-ketuntasan', [UserController::class, 'getStatistikKetuntasan'])->name('statistik-ketuntasan');
});

// API Routes (untuk AJAX calls)
Route::get('/api/login-status', [LoginController::class, 'checkLoginStatus'])->name('api.login.status');


// UNTUK DEBUGGING INGAT HAPUSI
// Test login form submission
Route::post('/test-login-debug', function(Request $request) {
    return response()->json([
        'all_input' => $request->all(),
        'login_type' => $request->input('login_type'),
        'is_guru_login' => $request->input('login_type') === 'guru',
        'referer' => $request->header('referer'),
        'has_guru_in_referer' => str_contains($request->header('referer'), 'login-guru')
    ]);
});



// Check all users and their levels
Route::get('/check-users', function() {
    $users = \App\Models\User::all(['id', 'name', 'nisn', 'level', 'kelas']);
    return response()->json($users);
});


// KODE BEKAS TIDAK TERPAKAI. PERIKSA LAGI SBLM DIHAPUS TOTAL

// Create test admin user
// Route::get('/create-test-admin', function() {
//     try {
//         $admin = \App\Models\User::create([
//             'name' => 'Test Admin',
//             'nisn' => 'admin001',
//             'kelas' => null,
//             'level' => 'admin',
//             'password' => 'admin123'
//         ]);
        
//         return "Admin created: NIP = admin001, Password = admin123";
//     } catch (\Exception $e) {
//         return "Error: " . $e->getMessage();
//     }
// });