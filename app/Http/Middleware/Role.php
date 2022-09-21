<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {        
        $roleList = explode('|', $role);
        
        if (!in_array(Auth::user()->role, $roleList)) {
            session()->flash('login_error', "You don't have permission to view this page.");
            return redirect()->route('login', ['redirect' => $request->fullUrl()]);
        }
        
        return $next($request);
    }
}
