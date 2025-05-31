<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        
        // Tambahkan logika untuk memeriksa apakah user adalah admin
        // Misalnya, jika Anda menambahkan kolom 'is_admin' di tabel users
        // if (!Auth::user()->is_admin) {
        //     return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        // }
        
        return $next($request);
    }
}