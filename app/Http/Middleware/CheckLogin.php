<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class CheckLogin
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
        $uid = Session::get('UID');

        if ($uid == '') {
            return redirect('/');
        }
        return $next($request);
    }
}