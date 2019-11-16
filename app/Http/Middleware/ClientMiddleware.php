<?php

namespace App\Http\Middleware;

use Closure;

class ClientMiddleware
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
        if (Auth::user()->hasPermissionTo('creer role et permission') or Auth::user()->hasPermissionTo('superadmin')) //If user has this //permission
        {
            return $next($request);
        }


        // partie client


        if ($request->is('clients/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('creer client'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('clients/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('modifier client')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('supprimer client')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        return $next($request);

    }
}
