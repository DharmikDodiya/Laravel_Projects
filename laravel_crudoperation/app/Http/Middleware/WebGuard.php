<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        // if($request->age && $request->age < 18){
        //     return redirect('no-access');
        //     die;
        // }
        // else
            
            if($request->age <=18)
                return redirect('no-access');
             else 
                return $next($request);
    }


}
