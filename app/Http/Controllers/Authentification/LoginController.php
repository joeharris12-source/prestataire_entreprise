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
    $prestataire = \App\Models\Prestataire::where('email', $request->email)->first();
    if ($prestataire) {
        if (Auth::guard('prestataire')->attempt($request->only('email', 'password'))) {
            return redirect()->route('prestataire.dashboard')->with('success', 'Connexion réussie');
        } else {
            return back()->withErrors(['password' => 'Le mot de passe est incorrect.']);
        }
    }

    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        
        // Vérifiez si l'utilisateur est un prestataire
        if ($user->is_prestataire) {
            return redirect()->route('prestataire.dashboard')->with('success', 'Connexion réussie');
        } elseif ($user->is_entreprise) {
            return redirect()->route('entreprise.dashboard')->with('success', 'Connexion réussie');
        } else {
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