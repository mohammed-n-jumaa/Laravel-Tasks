<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        // إعادة التوجيه في حالة عدم التوافق
        return redirect('/movies')->with('error', 'ليس لديك الصلاحية للوصول إلى هذه الصفحة.');
    }
}
