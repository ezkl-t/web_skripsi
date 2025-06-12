<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('beranda')
                ->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Check if user is a student
        if (!Auth::user()->isSiswa()) {
            return redirect()->route('beranda')
                ->with('error', 'Akses ditolak. Halaman ini khusus untuk siswa.');
        }

        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        // Cek apakah user adalah siswa
        if (Auth::user()->level !== 'siswa') {
            // Logout user yang bukan siswa
            Auth::logout();
            
            return redirect()->route('login')
                ->with('error', 'Akses ditolak. Halaman ini khusus untuk siswa.');
        }
        
        return $next($request);
    }
}