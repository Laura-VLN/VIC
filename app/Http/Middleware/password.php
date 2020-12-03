<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class password
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
        if(\Auth::user()->first_login != true){

            return $next($request);
        }
        $user = User::findOrFail(\Auth::user()->id);
        $user->first_login = false;
        $user->save();
        return redirect('/password/reset');
    }
}
