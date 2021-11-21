<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $roles = Auth::user()->roles;
        if ($roles->isEmpty())
        {
            return $next($request);
        }
        foreach($roles as $role){
            foreach($role->permissions as $permission){
                if($request->getPathInfo() == $permission->name){
                    return $next($request);
                }
                if($request->route()->uri()==$permission->name){
                    return $next($request);
                }
            }
        }
        //return $next($request);
        return redirect()->back()->with('error','Access Denied');
    }
}
