<?php
namespace App\Http\Controllers\Authentification\Prestataire;

use App\Http\Controllers\Controller;
use App\Models\Prestataire; // Assurez-vous que ce chemin est correct
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ProfilController extends Controller
{
    
    public function show()
    {
        
        $prestataire = Auth::user();

        return view('profil', compact('prestataire'));
    }

    
    public function update(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:prestataires,email,' . Auth::id(),
            'telephone' => 'required|string|max:15',
            'ville' => 'required|string|max:255',
            'secteurs_activite' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        

       $prestataire =  Prestataire::where('id',Auth::user()->id)->first();
        $prestataire->update([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'ville' => $request->ville,
            'secteurs_activite' => $request->secteur_activite,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('profil')->with('success', 'Profil mis à jour avec succès.');
    }
    public function destroy()
{
    $prestataire =  Prestataire::where('id',Auth::user()->id)->first();
    DB::table('users')->where('email', $prestataire->email)->delete();


    $prestataire->delete(); // Supprimer le prestataire de la base de données

    Auth::logout(); // Déconnexion de l'utilisateur

    return redirect('/')->with('success', 'Votre profil a été supprimé avec succès.');
}

}
