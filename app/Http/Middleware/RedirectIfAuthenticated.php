<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->role_id == 1 && Auth::user()->role->role_type == 'admin') return redirect(RouteServiceProvider::ADMIN);
                if(Auth::user()->role_id == 2 && Auth::user()->role->role_type == 'teacher') return redirect(RouteServiceProvider::TEACHER);
                if(Auth::user()->role_id == 3 && Auth::user()->role->role_type == 'student') return redirect(RouteServiceProvider::STUDENT);
                if(Auth::user()->role_id == 4 && Auth::user()->role->role_type == 'tutor') return redirect(RouteServiceProvider::TUTOR);
                if(Auth::user()->role_id == 5 && Auth::user()->role->role_type == 'psychologist') return redirect(RouteServiceProvider::PSYCHOLOGIST);
                return abort(403, 'Access denied. You must be an admin, teacher, student, tutor, or psychologist to view this page.');
            }
        }

        return $next($request);
    }
}
