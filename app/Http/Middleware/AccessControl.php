<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $entity
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $entity)
    {
        $user = Auth::user();


        // Registered users have read access to all entities and records
        if ($user->role === 'user' && $request->isMethod('get')) {
            return $next($request);
        }

        // Editor users have read and create access to all entities and records
        if ($user->role === 'editor' && in_array($request->method(), ['GET', 'POST','PUT'])) {
            return $next($request);
        }

        // Admin users have full access to all entities and records
        if ($user->role === 'admin') {
            return $next($request);
        }

        abort(403, 'Forbidden');
    }
}
