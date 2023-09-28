<?php

namespace App\Http\Middleware;

use Closure;

class applicationsession
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
        // $now = time(); // Checking the time now when home page starts.

        // if ($now > $request->session()->get('expire')) 
        // {
        //     session(['expire' => null]);
            if($request->session()->get('type') === null)
            {
                return redirect("/")->with('message','Session is Expired.');
            }
           
           
            
        // }
        // elseif($request->session()->get('expire') === null && $request->session()->get('type') === null)
        // {
        //     return redirect("/")->with('message','Session is Expired.');
        // }

        return $next($request);
    }
}
