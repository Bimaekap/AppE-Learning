<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,): Response
    {
        if(Auth::check() && Auth::user()->role === 'admin'){
            return $next($request); 
        }else if(Auth::check() && Auth::user()->role ==='guru'){
            return $next($request);
        }else{
            return $next($request);
        }
        return response()->json('You dont have permisson');
    }
}
