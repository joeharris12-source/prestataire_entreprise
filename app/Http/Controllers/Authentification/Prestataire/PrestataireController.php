<?php
namespace App\Http\Controllers\Authentification\Prestataire;

use App\Http\Controllers\Controller;
use App\Models\Prestataire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PrestataireController extends Controller
{
    public function showRegisterForm()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        // Valider les données d'inscription
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:prestataires', 
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'secteurs_activite' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        // Créer un nouveau prestataire
        $prestataire = Prestataire::create([
            'name' => $validatedData['name'],
            'firstname' => $validatedData['firstname'],
            'email' => $validatedData['email'],
            'telephone' => $validatedData['telephone'],
            'ville' => $validatedData['ville'],
            'secteurs_activite' => $validatedData['secteurs_activite'],
            'adresse' => $validatedData['adresse'],
            'password' => Hash::make($validatedData['password']),
        ]);
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Connecter le prestataire après l'inscription
        Auth::guard('prestataire')->login($prestataire);

        // Rediriger vers le dashboard du prestataire
        return redirect()->route('prestataire.dashboard')->with('success', 'Inscription réussie et connecté !');
    }
}
