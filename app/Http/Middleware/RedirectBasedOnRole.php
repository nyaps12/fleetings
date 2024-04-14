<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $user = Auth::user();
            foreach ($roles as $role) {
                if ($user->hasRole($role)) {
                    return $this->redirectToRole($role);
                }
            }
        }
        
        return $next($request);
    }

    protected function redirectToRole($role)
    {
        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'driver':
                return redirect()->route('driver.dashboard');
            default:
                return redirect()->route('home');
        }
    }
}
