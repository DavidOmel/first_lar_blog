<?php

namespace App\Http\Middleware;

use Closure;

class securelaw
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
        //dd($request->user);
        if (isset($request->user) && isset($request->_token)){
            if ($request->user->_token == $request->_token)
                return $next($request);
            else return redirect(route('entry'));
        }

        return $next($request);
    }
}
