<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {

        Log::info('User logged in before redirect: ' . Auth::check());
        Log::info('Authenticated User: ', (array)Auth::user());

        if (!Auth::check()) {
            Log::info('Session ID before redirect: ' . session()->getId());
            Log::info('User logged in before redirect: ' . Auth::check());  
            return redirect()->route('login'); // Redirect ke halaman login jika belum login
        }

        $user = Auth::user();

        if ($user->user_level !== 'admin' && $role == 'admin') {
            return redirect()->route('dashboardsiswa');
        }
        // dd($user->user_level && $role);
        return $next($request);
    }
}
