<?php

namespace App\Http\Middleware;

use Closure;

class StatusMiddleware
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
        if (!$request->user()->estado) {
            //abort(403, "¡No tienes edad para ver este video! le diremos a tus padres.");
            //return view('layouts.logout');
            //return response('Unauthorized.', 401);
            //return response('Unauthorized.', 401);
            return response()->view('layouts.logout');
        }
        return $next($request);
    }
}
