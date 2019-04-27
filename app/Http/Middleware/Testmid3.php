<?php

namespace App\Http\Middleware;

use Closure;

class Testmid3
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
        if ($request->full_text == ''){
            $request->full_text = 'Вы не написали статью';
        }
        return $next($request);
    }
}
