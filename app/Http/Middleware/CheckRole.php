<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,String $role)
    {
        $roles = [
            'admin' => [1],
            'buyer' => [3]
        ];

        $roleIds = $roles[$role] ?? [];
        if(!in_array(auth()->user()->user_type_id ,$roleIds)){
            abort(403);
        }

        return $next($request);
    }
}
