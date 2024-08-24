<?php

namespace App\Http\Controllers\Authentification\Prestataire;

use App\Http\Controllers\Controller;
use App\Models\Entrprestataires;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EntrprestataireController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('inscription.login1');
    }

    // Traite l'inscription
    public function register(Request $request)
    {
        try {
            // Validation des données du formulaire
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'firstname' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:entrprestataires',
                'telephone' => 'required|string|max:20',
                'ville' => 'required|string|max:255',
                'adresse' => 'required|string|max:255',
                'secteurs_activite' => 'required|string|max:255',
                'nom_responsable' => 'required|string|max:255',
                'nom_entreprise' => 'required|string|max:255',
                'date_creation_entreprise' => 'required|date',
                'password' => 'required|string|min:8',
                'password_confirmation' => 'required|string|same:password',
            ]);

            // Création du nouvel Entrprestataire
            $entrprestataire = Entrprestataires::create([
                'name' => $request->input('name'),
                'firstname' => $request->input('firstname'),
                'email' => $request->input('email'),
                'telephone' => $request->input('telephone'),
                'ville' => $request->input('ville'),
                'adresse' => $request->input('adresse'),
                'secteurs_activite' => $request->input('secteurs_activite'),
                'nom_responsable' => $request->input('nom_responsable'),
                'nom_entreprise' => $request->input('nom_entreprise'),
                'date_creation_entreprise' => $request->input('date_creation_entreprise'),
                'password' => Hash::make($request->input('password')),
            ]);
            $user = User::create([
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);

            // Authentification de l'Entrprestataire
            Auth::guard('entrprestataires')->login($entrprestataire);

            // Redirection vers le tableau de bord
            return redirect()->route('dashboardentpres')->with('status', 'Inscription réussie !');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Gestion des erreurs de validation
            return redirect()->back()
                             ->withErrors($e->validator)
                             ->withInput();
        } catch (\Exception $e) {
            // Gestion des autres erreurs
            return redirect()->back()
                             ->with('error', 'Une erreur est survenue lors de l\'inscription.')
                             ->withInput();
        }
    }
}
