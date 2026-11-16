<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PelangganMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'pelanggan') {
            return $next($request);
        }
        if (Auth::check()) {
            return redirect('/dashboard')->with('error', 'Akses ditolak.');
        }
        return redirect('/login');
    }
}
