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

        // Partie Plat

        if ($request->is('plats/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Creer plat'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('plats/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Modifier plat')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        if ($request->is('plats')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Afficher plat')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Supprimer plat')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }
        // Partie Entree Stock

        if ($request->is('entreeStocks/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Creer entreeStock'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('entreeStocks/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Modifier entreeStock')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        if ($request->is('entreeStocks')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Afficher entreeStock')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Supprimer entreeStock')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        // Partie Commande

        if ($request->is('commandes/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Creer commande'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('commandes/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Modifier commande')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        if ($request->is('commandes')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Afficher commande')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        if ($request->is('facturePdf/*')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Facturer commande')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Supprimer commande')) {
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