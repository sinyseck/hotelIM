<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::user()->hasPermissionTo('creer role et permission') or Auth::user()->hasPermissionTo('superadmin')) //If user has this //permission
        {
            return $next($request);
        }

        if ($request->is('produits/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Create Produit'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('produits/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Edit Produit')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Delete Produit')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        // partie client


        if ($request->is('clients/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Creer client'))
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
            if (!Auth::user()->hasPermissionTo('Delete Produit')) {
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