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
            // Redirect ke login dengan pesan
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman admin.');
        }
        
        // Cek apakah user adalah admin
        if (!Auth::user()->is_admin) {
            // Logout user non-admin dan redirect ke home
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman admin.');
        }
        
        return $next($request);
    }
}