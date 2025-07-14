<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrimNullQuery
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET') && $request->query->count() > 0) {
            $original = $request->query();

            $filtered = collect($original)
                ->reject(fn($value) => $value === null || $value === '' || $value === 'null')
                ->toArray();

            if ($filtered !== $original) {
                return redirect()->route('mahasiswa.kegiatan', $filtered);
            }
        }

        return $next($request);
    }
}
