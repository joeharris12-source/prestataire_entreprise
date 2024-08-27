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
        return view('connection.connexion');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Vérifiez si l'utilisateur est un prestataire
        $prestataire = \App\Models\Prestataire::where('email', $request->email)->first();
        if ($prestataire) {
            if (Auth::guard('prestataire')->attempt($request->only('email', 'password'))) {
                return redirect()->route('prestataire.dashboard')->with('success', 'Connexion réussie');
            } else {
                return back()->withErrors(['password' => 'Le mot de passe est incorrect.']);
            }
        }

        // Vérifiez si l'utilisateur est une entreprise
        $entreprise = \App\Models\Entreprise::where('email', $request->email)->first();
        if ($entreprise) {
            if (Auth::guard('entreprise')->attempt($request->only('email', 'password'))) {
                return redirect()->route('entreprise.dashboard')->with('success', 'Connexion réussie');
            } else {
                return back()->withErrors(['password' => 'Le mot de passe est incorrect.']);
            }
        }

        // Vérifiez si l'utilisateur est un Entrprestataire
        $entrprestataire = \App\Models\Entrprestataires::where('email', $request->email)->first();
        if ($entrprestataire) {
            if (Auth::guard('entrprestataire')->attempt($request->only('email', 'password'))) {
                return redirect()->route('entrprestataire.dashboard')->with('success', 'Connexion réussie');
            } else {
                return back()->withErrors(['password' => 'Le mot de passe est incorrect.']);
            }
        }

        // Vérifiez les informations d'identification pour un utilisateur général
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            
            // Vérifiez si l'utilisateur est un prestataire
            if ($user->is_prestataire) {
                return redirect()->route('prestataire.dashboard')->with('success', 'Connexion réussie');
            } 
            // Vérifiez si l'utilisateur est une entreprise
            elseif ($user->is_entreprise) {
                return redirect()->route('entreprise.dashboard')->with('success', 'Connexion réussie');
            } 
            // Vérifiez si l'utilisateur est un Entrprestataire
            elseif ($user->is_entrprestataire) {
                return redirect()->route('entrprestataire.dashboard')->with('success', 'Connexion réussie');
            } 
            else {
                return redirect()->route('home')->with('success', 'Connexion réussie');
            }
        }

        return back()->withErrors([
            'email' => 'Les informations d’identification ne correspondent pas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Déconnecté avec succès.');
    }
}
