<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CaissierMiddleware
{
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
        if ($request->is('chambres/index'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Liste chambre'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('chambres/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Creer chambre'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('chambres/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Modifier chambre')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Supprimer Chambre')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        // partie client
        if ($request->is('clients/index'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Liste client'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

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
            if (!Auth::user()->hasPermissionTo('Modifier client')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Supprimer client')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        //partie reservations

        if ($request->is('reservations/index'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Liste reservation'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('reservations/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Creer reservation'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('reservations/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Modifier reservation')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Supprimer reservation')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }



        // tarif

        if ($request->is('tarifs/index'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Liste tarif'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('tarifs/create'))//If user is creating a post
        {
            if (!Auth::user()->hasPermissionTo('Creer tarif'))
            {
                abort('401');
            }
            else {
                return $next($request);
            }
        }

        if ($request->is('tarifs/*/edit')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Modifier tarif')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->isMethod('Delete')) //If user is deleting a post
        {
            if (!Auth::user()->hasPermissionTo('Supprimer tarif')) {
                abort('401');
            }
            else
            {
                return $next($request);
            }
        }

        //calendrier
        if ($request->is('calendrier')) //If user is editing a post
        {
            if (!Auth::user()->hasPermissionTo('Liste reservation')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        return $next($request);


    }




}
