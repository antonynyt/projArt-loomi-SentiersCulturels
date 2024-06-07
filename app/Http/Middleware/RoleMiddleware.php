<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if(!auth()->check()){
            if(in_array("user", $roles) || in_array("editor", $roles))
                return redirect()->route('login');
            else
                abort(403);
        }
        if(!auth()->user()->hasAnyRole($roles)){
            abort(403);
        }
        return $next($request);
    }
}
