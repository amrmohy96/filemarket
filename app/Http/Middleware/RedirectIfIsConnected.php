<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfIsConnected
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
        if (auth()->user()->stripe_id){
            return redirect()->route('profile');
        }
        return $next($request);
    }
}
