<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdmin
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

        if(auth()->guest()){
            abort(Response::HTTP_FORBIDDEN);
        }

        //Needs change, I don't agree with this
        if(auth()->user()->username !== 'admin'){
            abort(Response::HTTP_FORBIDDEN);
        }
        return $next($request);
    }
}
