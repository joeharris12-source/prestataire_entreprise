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
        return view('inscription.login');
    }

    public function register(Request $request)
    {
        // Valider les données d'inscription avec des messages personnalisés
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:prestataires',
            'password' => 'required|string|min:8|confirmed',
            'telephone' => 'required|string|max:20',
            'ville' => 'required|string|max:255',
            'secteurs_activite' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ], [
            'name.required' => 'Le champ Nom est requis.',
            'firstname.required' => 'Le champ Prénom est requis.',
            'email.required' => 'Le champ Email est requis.',
            'email.email' => 'Veuillez fournir une adresse email valide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'password.required' => 'Le champ Mot de passe est requis.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'telephone.required' => 'Le champ Téléphone est requis.',
            'ville.required' => 'Le champ Ville est requis.',
            'secteurs_activite.required' => 'Le champ Secteurs d\'activité est requis.',
            'adresse.required' => 'Le champ Adresse est requis.',

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

