<?php

namespace App\Http\Middleware;

use Closure;

class AuthAdmin
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
        $user = auth()->user();
        if (!$user || ($user && $user->role !== 'Admin')) {
            return response()->json(['name' =>'Access_Forbidden','error' => "You're don't have rights to access"],403);
        }
        return $next($request);
    }
}
