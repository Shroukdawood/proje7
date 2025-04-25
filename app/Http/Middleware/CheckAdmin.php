<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }

    public function login(Request $request)
    {
        $credential = $request->only('username', 'password');
        if (Auth::attempt(($credential))){
            return redirect()->route('dashboard');
        }
        else{
            return back()->withErrors(['message'=>'please check your username and password']);
        }
    }
}
