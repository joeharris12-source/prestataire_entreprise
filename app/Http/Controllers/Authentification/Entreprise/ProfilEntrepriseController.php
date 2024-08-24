<?php

namespace App\Http\Controllers\Authentification\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilEntrepriseController extends Controller
{
    /**
     * Afficher le profil de l'entreprise.
     */
    public function show()
    {
        // Récupère l'entreprise authentifiée
        $entreprise = Auth::guard('entreprise')->user();

        // Retourne la vue avec les données de l'entreprise
        return view('profil.profilEntr', compact('entreprise'));
    }

    /**
     * Mettre à jour le profil de l'entreprise.
     */
    public function update(Request $request)
    {
        // Valide les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:entreprises,email,' . Auth::guard('entreprise')->id(),
            'telephone' => 'required|string|max:15',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        // Récupère l'entreprise authentifiée
        $entreprise = Entreprise::where('id', Auth::guard('entreprise')->user()->id)->first();

        // Met à jour les informations de l'entreprise
        $entreprise->update([
            'name' => $request->name,
            'status' => $request->status,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'ville' => $request->ville,
            'adresse' => $request->adresse,
        ]);

        // Redirige vers le profil avec un message de succès
        return redirect()->route('profilEntr')->with('success', 'Votre profil a été mis à jour avec succès.');
    }

    /**
     * Supprimer le profil de l'entreprise.
     */
    public function destroy()
    {
        // Récupère l'entreprise authentifiée
        $entreprise = Entreprise::where('id', Auth::guard('entreprise')->user()->id)->first();

        // Supprime l'entrée correspondante dans la table 'users'
        DB::table('users')->where('email', $entreprise->email)->delete();

        // Supprime l'entreprise de la base de données
        $entreprise->delete();

        // Déconnecte l'entreprise
        Auth::guard('entreprise')->logout();

        // Redirige vers la page d'accueil avec un message de succès
        return redirect('/')->with('success', 'Votre profil a été supprimé avec succès.');
    }
}
