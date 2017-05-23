<?php

namespace App\Http\Middleware;

use Closure;

class isBoth
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
        $user = $request->user(); 
            if ($user->role->name == 'Administrator') {
                return $next($request);
            }else if ($user->role->name == 'Author') {
                return $next($request);
            }
        return redirect('/');
        //return $next($request);
    }
}
