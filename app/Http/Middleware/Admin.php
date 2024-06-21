<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check() && Auth::user()->role === 'admin') {
        return $next($request);
        }

        // dd($request->path());

        if($request->path() === 'admin/dashboard' || $request->path() === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'anda tidak memiliki akses');
    }
}
