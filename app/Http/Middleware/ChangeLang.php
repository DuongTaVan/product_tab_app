<?php

namespace App\Http\Middleware;

use Closure;

class ChangeLang
{
    /**
     * Run the request filter.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    \Closure  $next
     * @return  mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = 'vi';

        // if ( Session::has('applocale') {
        //     $locale = Session::get('applocale');
        // }

        config(['app.locale' => $locale]);
        return $next($request);
    }

}