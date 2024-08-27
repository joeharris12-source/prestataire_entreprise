<?php

namespace App\Http\Controllers\Authentification\Prestataire;

use App\Http\Controllers\Controller;
use App\Models\Entrprestataires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfilEntrpresController extends Controller
{
    public function show()
    {
        $entrprestataires = Auth::guard('entrprestataires')->user();
        if (Auth::guard('entrprestataires')->check()) {
            $user = Auth::guard('entrprestataires')->user();
    
            return view('profil.profilEntrpres', compact('entrprestataires'));
        }
    
        return redirect()->route('login1')->with('error', 'Vous devez être connecté pour voir votre profil.');
    }
    

    public function updatentrpres(Request $request)
{
    //dd($request);
    // Validez les données du formulaire
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:entrprestataires,email,' . Auth::guard('entrprestataires')->id(),
        'telephone' => 'required|string|max:20',
        'ville' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'secteurs_activite' => 'required|string|max:255',
        'nom_responsable' => 'required|string|max:255',
        'nom_entreprise' => 'required|string|max:255',
        'date_creation_entreprise' => 'required|date',
    ]);

    // Récupérez l'utilisateur authentifié
    $user = Auth::guard('entrprestataires')->user();
    
    // Trouvez le profil du prestataire en fonction de l'utilisateur authentifié
    $entrprestataires = Entrprestataires::where('id', $user->id)->first();
    
    if (!$entrprestataires) {
        return redirect()->route('profilEntrpres')->with('error', 'Profil introuvable.');
    }

    // Mettez à jour les données du profil
    $entrprestataires->update([
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
    ]);

    // Redirigez avec un message de succès
    return redirect()->route('profilEntrpres')->with('success', 'Profil mis à jour avec succès.');
}

    


    public function destroy()
    {
        if (Auth::guard('entrprestataires')->check()) {
            $entrprestataires = Entrprestataires::where('id', Auth::guard('entrprestataires')->user()->id)->first();
            
            if ($entrprestataires) {
                // Supprimer l'utilisateur de la table 'users'
                DB::table('users')->where('email', $entrprestataires->email)->delete();
                
                // Supprimer le profil de la table 'entrprestataires'
                $entrprestataires->delete();
                
                // Déconnecter l'utilisateur
                Auth::guard('entrprestataires')->logout();
                
                return redirect('/')->with('success', 'Votre profil a été supprimé avec succès.');
            } else {
                return redirect()->route('profilEntrpres')->with('error', 'Profil introuvable.');
            }
        } else {
            return redirect()->route('login1')->with('error', 'Vous devez être connecté pour supprimer votre profil.');
        }
    }
    
}