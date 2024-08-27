<?php
namespace App\Http\Controllers\Authentification\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    // Affiche le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('inscription.login2');
    }

    // Gère l'inscription d'une entreprise
public function register(Request $request, Entreprise $entreprise)
{
        //dd($request);
        // Validation des données du formulaire
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:entreprises',
            'telephone' => 'required|string|max:30',
            'ville' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Débogage des données validées
        
    
        try {
            // Crée une nouvelle entreprise
            $entreprise = Entreprise::create([
                'name' => $validateData['name'],
                'status' => $validateData['status'],
                'email' => $validateData['email'],
                'telephone' => $validateData['telephone'],
                'ville' => $validateData['ville'],
                'adresse' => $validateData['adresse'],
                'password' => Hash::make($validateData['password']),
            ]);
            $user = User::create([
                'email' => $validateData['email'],
                'password' => Hash::make($validateData['password']),
            ]);
    
            // Authentifie l'entreprise après inscription
            Auth::guard('entreprise')->login($entreprise);
    
            // Redirige vers le tableau de bord avec un message de succès
            return redirect()->route('entreprise.dashboard')->with('success', 'Inscription réussie');
        } catch (\Exception $e) {
            // Débogage de l'erreur
            dd($e->getMessage());
    
            return back()->with('error', 'Erreur lors de l\'inscription: ' . $e->getMessage());
        }
    }
    
    
}
