<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsEntrprestataire
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
        // Vérifiez si l'utilisateur est authentifié et appartient à la garde 'entrprestataires'
        if (Auth::guard('entrprestataires')->check()) {
            return $next($request);
        }

        // Si l'utilisateur n'est pas authentifié, redirigez-le vers la page de connexion
        return redirect()->route('login1')->with('error', 'Vous devez être connecté en tant qu\'entreprise pour accéder à cette page.');
    }
}
