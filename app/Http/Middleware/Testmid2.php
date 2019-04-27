<?php

namespace App\Http\Middleware;

use Closure;

class Testmid2
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
        $response = $next($request);

        if ($request->short_text == ''){
            $request->short_text = 'Напишите текст';
            redirect(route('entry'));
        }
        return $response;
    }
}
