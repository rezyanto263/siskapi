<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return Auth::check()
            ? match (Auth::user()->role->nama) {
                'Mahasiswa' => redirect()->intended('/'),
                'UPAPKK' => redirect()->intended('/'),
                'Kepala Prodi' => redirect()->intended('/'),
                'BAAK' => redirect()->intended('/'),
                default => abort(401, 'Unauthorized')
            }
            : $next($request);
    }
}
