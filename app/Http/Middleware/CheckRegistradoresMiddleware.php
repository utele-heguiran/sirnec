<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRegistradoresMiddleware
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
        if ( Auth::check() && auth()->user()->tipousuario_id==5 ) {
            return $next($request);
        }
        if ( Auth::check() && auth()->user()->tipousuario_id==1 ) {
            return $next($request);
        }

        return redirect('home')->witherror_message('Usted No Cuenta con los Privilegios Necesarios para Ingresar a este Modulo');

    }
}
