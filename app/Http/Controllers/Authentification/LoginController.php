<?php

namespace App\Http\Controllers\Authentification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('connexion');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirection en fonction du type d'utilisateur
            $user = Auth::user();
            if ($user->is_prestataire) {
                return redirect()->route('prestataire.dashboard')->with('success', 'Connexion réussie');
            } elseif ($user->is_entreprise) {
                return redirect()->route('entreprise.dashboard')->with('success', 'Connexion réussie');
            } else {
                return redirect()->route('home')->with('success', 'Connexion réussie');
            }
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Déconnexion réussie');
    }
}
