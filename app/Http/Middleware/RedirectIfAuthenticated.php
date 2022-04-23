<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $kader=1;
        //dd($kader);

     //   foreach ($guards as $guard) {
          /*  if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            } */
          /* if ($guard == "writer" && Auth::guard($guard)->check()) {
                dd($guard) ;
                return redirect('/writer');
            } 
           /* if ($guard == "writer" && Auth::guard($guard)->check()) {
                return redirect('/writer');
            }*/
          /*  if (Auth::guard($guard)->check()) {
                return redirect('/home');
            }*/

            

        /*    if(Auth::guard($guard)->check() && Auth::user()->role == 1) {
                dd($kader) ;
                return redirect(RouteServiceProvider::HOME);            }
            elseif(Auth::guard($guard)->check() && Auth::user()->role ==2) {
                dd($kader) ;
                return redirect(RouteServiceProvider::HOME);             ;
            }
          //  else dd($kader) ;
    
        } */
        foreach ($guards as $guard) {
        if(Auth::guard($guard)->check() && Auth::user()) {    return redirect('/welcome');     }
            elseif ($guard == "writer" && Auth::guard("writer")->check()) {return redirect('/writer');}
    }
        

        return $next($request);
    } 
}
