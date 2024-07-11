<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {   
        if(auth()->check() && auth()->user()->role_id == Role::IS_ADMIN)
        {            
            return $next($request);
        } 
        elseif (auth()->check() && auth()->user()->role_id != Role::IS_ADMIN) 
        {
            auth()->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect('/')->with('message', 'Your role has been demoted. You have been logged out.');
        }        

        abort(403, 'Page does not exist.');
    }
}

/*
Closure $next is a parameter declaration in a middleware's handle method.
In Laravel middleware, $next is a callable that represents the next middleware or the final route handler that the current request should be passed to.
A Closure is a type of anonymous function in PHP. It allows you to create a function on the fly and pass it around as a variable.
In the middleware handle method, the $next parameter is a reference to the next middleware or the final route handler in the pipeline. 
The handle method should call this $next closure in order to continue the request to the next middleware or the final route handler.
So, when you call $next($request) inside the middleware, Laravel will pass the request to the next middleware or the final route handler in the pipeline.
*/