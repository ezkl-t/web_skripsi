<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login form (beranda page)
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectAfterLogin();
        }
        
        return view('beranda');
    }

    /**
     * Show the guru login form
     */
    public function showGuruLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectAfterLogin();
        }
        
        return view('login-guru');
    }

    /**
     * Show the registration form
     */
    public function showRegistrationForm()
    {
        if (Auth::check()) {
            return $this->redirectAfterLogin();
        }
        
        return view('buat-akun');
    }

    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'namalengkap' => 'required|string|max:255',
                'nisn' => 'required|string|unique:users,nisn|max:20',
                'kelas' => 'required|string|in:XI-1,XI-2,XI-3',
                'password' => 'required|string|min:6',
            ]);

            $user = User::create([
                'name' => $validated['namalengkap'],
                'nisn' => $validated['nisn'],
                'kelas' => $validated['kelas'],
                'level' => 'siswa',
                'password' => $validated['password'],
            ]);

            Auth::login($user, true);
            $request->session()->regenerate();

            return redirect('/home')->with('success', 'Selamat datang, ' . $user->name . '!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput($request->except('password'));
        }
    }

    /**
     * Handle login request - SIMPLIFIED VERSION
     * Deteksi otomatis berdasarkan dari mana user datang
     */
    public function postLogin(Request $request)
    {
        // Validasi input
        $request->validate([
            'nisn' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = [
            'nisn' => $request->nisn,
            'password' => $request->password
        ];

        // Coba login
        if (Auth::attempt($credentials, true)) {
            // Login berhasil
            $user = Auth::user();
            $request->session()->regenerate();
            
            // Deteksi dari mana request datang
            $previousUrl = url()->previous();
            $isFromGuruPage = str_contains($previousUrl, 'login-guru');
            
            // Jika dari halaman login guru tapi bukan admin, logout
            if ($isFromGuruPage && $user->level !== 'admin') {
                Auth::logout();
                return redirect()->back()
                    ->with('error', 'Terjadi kesalahan. Periksa kembali NIP atau password.');
            }
            
            // Jika dari halaman login siswa tapi bukan siswa, logout  
            if (!$isFromGuruPage && $user->level !== 'siswa') {
                Auth::logout();
                return redirect()->back()
                    ->with('error', 'Terjadi kesalahan. Periksa NISN atau password kembali atau daftar akun jika belum ada.');
            }
            
            // Redirect berdasarkan level
            if ($user->level === 'admin') {
                return redirect()->route('dashboard-admin')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            } else {
                return redirect('/home')
                    ->with('success', 'Selamat datang, ' . $user->name . '!');
            }
            
        } else {
            // Login gagal
            return redirect()->back()
                ->with('error', 'Kredensial yang dimasukkan salah. Periksa dan coba kembali.')
                ->withInput($request->only('nisn'));
        }
    }

    /**
     * Handle logout request
     */
    public function logout(Request $request)
    {
        $userName = Auth::user()->name ?? 'User';
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('beranda')
            ->with('success', 'Sampai jumpa, ' . $userName . '!');
    }

    /**
     * Redirect user after successful login based on their level
     */
    private function redirectAfterLogin()
    {
        $user = Auth::user();
        
        if ($user->level === 'admin') {
            return redirect()->route('dashboard-admin');
        } else {
            return redirect('/home');
        }
    }

    /**
     * Check login status (untuk AJAX calls)
     */
    public function checkLoginStatus()
    {
        return response()->json([
            'logged_in' => Auth::check(),
            'user' => Auth::check() ? [
                'name' => Auth::user()->name,
                'nisn' => Auth::user()->nisn,
                'level' => Auth::user()->level,
                'kelas' => Auth::user()->kelas,
            ] : null
        ]);
    }
}