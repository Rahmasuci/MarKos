<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        if ($role == 'admin' && auth()->user()->category != 'Admin') {
            abort(403);
        }

        if ($role == 'pengguna' && auth()->user()->category != 'Pengguna') {
            abort(403);
        }

        if ($role == 'pemilik' && auth()->user()->category != 'Pemilik kos') {
            abort(403);
        }

        return $next($request);
    }
}
