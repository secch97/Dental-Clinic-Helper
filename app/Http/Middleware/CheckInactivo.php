<?php

namespace App\Http\Middleware;

use Closure;

class CheckInactivo
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
        if (auth()->check() && auth()->user()->estado==0) 
        {
            auth()->logout();
            $message = '¡Aviso! Su cuenta se encuentra inactiva';          
            return redirect()->route('login')->withMessage($message);
        }
        return $next($request);
    
    }
}
