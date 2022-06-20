<?php

namespace App\Http\Middleware;

use Closure;

class Cekrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$levels) 
    { 
        if (in_array($request->user()->role,$levels)) { 
            return $next($request); 
        } 
            return redirect('/'); 
    }
    
}
