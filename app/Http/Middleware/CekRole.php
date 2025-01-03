<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Periksa apakah pengguna memiliki role 'admin' atau 'superadmin'
        if ($user && in_array($user->role, ['admin', 'superadmin'])) {
            return $next($request); // Lanjutkan ke URL tujuan
        }

        // Jika bukan, arahkan ke URL '/'
        return redirect('/')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
