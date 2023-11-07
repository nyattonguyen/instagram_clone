<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            // admin role == 2
            // user role == 1
            if((Auth::user())->role == '2'){
                return $next($request);
            }else {
                return redirect('/dashboard')->with('message', 'Access denied as you are not Admin!!!!');
            }
        }else {
            return redirect('/login')->with('message', 'Login to access the website info');
        }
        
    }
}
