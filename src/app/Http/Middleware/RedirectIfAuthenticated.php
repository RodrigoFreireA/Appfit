<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
        
            switch ($role) {
                case 'admin':
                    return redirect('/admin/dashboard');
                case 'professor':
                    return redirect('/professor/dashboard');
                case 'aluno':
                    return redirect('/aluno/dashboard');
            }
        }
        

    return $next($request);
    }

}
