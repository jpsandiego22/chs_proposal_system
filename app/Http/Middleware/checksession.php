<?php

namespace App\Http\Middleware;

use Closure;

class checksession
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
        
        if($request->session()->get('account_id')=== null)
        {
            return redirect("/login")->with('message','You need to Sign In.');
        }
        
        return $next($request);
    }
}
