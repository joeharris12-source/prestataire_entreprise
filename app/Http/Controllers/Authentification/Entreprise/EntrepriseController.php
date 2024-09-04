<?php
namespace App\Http\Controllers\Authentification\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\User;
use App\Models\Prestataire;
use App\Models\Entrprestataires;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

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
    // app/Http/Controllers/EntrepriseController.php
    public function showPrestataires(Request $request)
    {
        $secteur = $request->input('secteur');
    
        if ($secteur) {
            // Recherche par secteur d'activité
            $prestataires = Prestataire::where('secteurs_activite', 'like', '%' . $secteur . '%')->get();
    
            if ($prestataires->isEmpty()) {
                // Si aucun prestataire ne correspond au secteur, envoie un message
                return redirect()->route('entreprise-prestataires')
                                 ->with('error', 'Ce secteur d\'activité n\'existe pas encore.');
            }
        } else {
            // Affiche tous les prestataires si aucun secteur n'est recherché
            $prestataires = Prestataire::select('name', 'email', 'secteurs_activite')->get();
        }
    
        return view('dashboard.entreprise-prestataires', compact('prestataires'));
    }
    
    public function getInscriptionsData()
    {
        // Récupère la date actuelle
        $now = Carbon::now();
        
        // Récupère les inscriptions par jour (pour les 30 derniers jours)
        $inscriptionsParJour = Prestataire::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', $now->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->date => $item->count];
            });

        // Réinitialiser la date à maintenant
        $now = Carbon::now();

        // Préparer les dates pour les jours (pour afficher le graphique)
        $dates = collect(range(0, 29))->map(function ($day) use ($now) {
            return $now->copy()->subDays(29 - $day)->format('Y-m-d');
        })->toArray();

        // Préparer les inscriptions par jour
        $inscriptionsParJourData = collect($dates)->map(function ($date) use ($inscriptionsParJour) {
            return $inscriptionsParJour[$date] ?? 0;
        })->toArray();

        // Récupère les inscriptions par semaine (pour les 12 dernières semaines)
        $inscriptionsParSemaine = Prestataire::selectRaw('YEARWEEK(created_at, 1) as week, COUNT(*) as count')
            ->where('created_at', '>=', $now->subWeeks(12))
            ->groupBy('week')
            ->orderBy('week')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->week => $item->count];
            });

        // Préparer les semaines pour les 12 dernières semaines
        $semaines = collect(range(0, 11))->map(function ($weekOffset) use ($now) {
            return $now->copy()->subWeeks(11 - $weekOffset)->format('oW');
        })->toArray();

        // Préparer les inscriptions par semaine
        $inscriptionsParSemaineData = collect($semaines)->map(function ($week) use ($inscriptionsParSemaine) {
            return $inscriptionsParSemaine[$week] ?? 0;
        })->toArray();

        return response()->json([
            'dates' => $dates,
            'inscriptionsParJour' => $inscriptionsParJourData,
            'semaines' => $semaines,
            'inscriptionsParSemaine' => $inscriptionsParSemaineData
        ]);
    }
    public function getSecteursActiviteData()
    {
        // Récupère le nombre total de prestataires
        $totalPrestataires = Prestataire::count();
    
        // Récupère le nombre de prestataires par secteur d'activité
        $secteurs = Prestataire::selectRaw('secteur_activite, COUNT(*) as count')
            ->groupBy('secteur_activite')
            ->get();
    
        // Calculer le pourcentage pour chaque secteur
        $secteursData = $secteurs->map(function ($item) use ($totalPrestataires) {
            return [
                'secteur' => $item->secteur_activite,
                'pourcentage' => round(($item->count / $totalPrestataires) * 100, 2)
            ];
        });
    
        // Préparer les données pour la réponse JSON
        return response()->json([
            'secteurs' => $secteursData->pluck('secteur'),
            'pourcentages' => $secteursData->pluck('pourcentage')
        ]);
    }
}    