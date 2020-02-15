<?php

namespace App\Http\Middleware;

use Closure;

class Verifikator
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
        if(auth()->user()->type == 'Verifikator'){
            return $next($request);
            }
            return redirect('home')->with('error','Kamu bukan verifikator');
    }
}
