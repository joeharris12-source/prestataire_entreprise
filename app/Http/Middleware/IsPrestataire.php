<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPrestataire
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('prestataire')->check()) {
            return $next($request);
        }
        return redirect('/')->with('error', 'Vous devez être connecté pour accéder à cette page.');
    }
}


