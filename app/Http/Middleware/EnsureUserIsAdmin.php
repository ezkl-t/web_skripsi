<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsAdmin
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
                ->with('error', 'Silakan login sebagai admin/guru untuk mengakses halaman ini.');
        }

        // Check if user is admin/guru
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('beranda')
                ->with('error', 'Akses ditolak. Halaman ini khusus untuk admin/guru.');
        }

        if (!Auth::check()) {
            return redirect()->route('login.guru')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (Auth::user()->level !== 'admin') {
            Auth::logout();
            return redirect()->route('login.guru')->with('error', 'Anda tidak memiliki akses sebagai guru/admin.');
        }

        return $next($request);
    }
}