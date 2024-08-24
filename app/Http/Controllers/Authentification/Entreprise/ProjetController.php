<?php

namespace App\Http\Controllers\Authentification\Entreprise;

use App\Models\Projet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjetController extends Controller
{
    // Afficher le formulaire pour créer un nouveau projet
    public function create()
    {
        return view('profil.projet');
    }

    // Stocker un nouveau projet dans la base de données
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'temps_execution' => 'required|integer',
            'cahier_charge' => 'nullable|file|mimes:pdf|max:2048', // Champ optionnel pour le PDF
        ]);

        $data = $request->all();

        // Gérer le fichier PDF
        if ($request->hasFile('cahier_charge')) {
            $file = $request->file('cahier_charge');
            $path = $file->store('cahiers_charge', 'public');
            $data['cahier_charge'] = $path;
        }

        // Associer le projet à l'entreprise authentifiée
        $data['entreprise_id'] = auth()->guard('entreprise')->id();

        // Créer le projet
        Projet::create($data);

        return redirect()->route('entreprise.dashboard')->with('success', 'Projet créé avec succès.');
    }

    // Afficher la liste des projets de l'entreprise authentifiée
    public function index()
    {
        $projets = Projet::where('entreprise_id', auth()->guard('entreprise')->id())->get();

        return view('profil.historique', ['projets' => $projets]);
    }

    // Afficher le formulaire pour modifier un projet existant
    public function edit($id)
    {
        $projet = Projet::findOrFail($id);

        return view('profil.edit_projet', ['projet' => $projet]);
    }

    // Mettre à jour un projet existant dans la base de données
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'required|string',
            'budget' => 'required|numeric',
            'temps_execution' => 'required|integer',
            'cahier_charge' => 'nullable|file|mimes:pdf|max:2048', // Champ optionnel pour le PDF
        ]);

        $projet = Projet::findOrFail($id);
        $data = $request->all();

        // Gérer le fichier PDF
        if ($request->hasFile('cahier_charge')) {
            $file = $request->file('cahier_charge');
            $path = $file->store('cahiers_charge', 'public');
            $data['cahier_charge'] = $path;
        }

        // Mettre à jour le projet
        $projet->update($data);

        return redirect()->route('historique')->with('success', 'Projet mis à jour avec succès.');
    }

    // Supprimer un projet existant de la base de données
    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->delete();

        return redirect()->route('historique')->with('success', 'Projet supprimé avec succès.');
    }
}
