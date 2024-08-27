<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Entreprise;
use App\Models\Projet;
class ProjetController extends Controller
{
    public function index () {
        $projets = Projet::paginate(2);
        $categories = Categorie::all();
        $entreprises = Entreprise::all();
        return view('back-end.pages.projet.projet' , compact('projets' , 'categories' , 'entreprises'));
    }

    public function show ($id) {
     $projet = Projet::findOrFail($id);
     return view('back-end.pages.projet.projet-show',compact('projet'));
    }

    public function edit ($id) {
        $projet = Projet::findOrFail($id);
        $categories = Categorie::all();
        $entreprises = Entreprise::all();
        return view('back-end.pages.projet.projet-edit',compact('projet', 'categories' , 'entreprises'));
    }
    public function addProjet (Request $request) {

        if($request->input('id') > 0){

            $projet = Projet::findOrFail($request->input('id'));
            $projet->type_prestation = $request->type_prestation ;
            $projet->titre = $request->titre;
            $projet->debut = $request->debut;
            $projet->description = $request->description;
            $projet->lieu = $request->lieu ;
            $projet->categorie_id = $request->categorie_id;
            $projet->entreprise_id = $request->entreprise_id;
            $projet->save();
            return redirect()->route('admin.projet')->with('success','Projet Modifié avec Success !');

        }else{
            $projet = new Projet();
            $projet->type_prestation = $request->type_prestation ;
            $projet->titre = $request->titre;
            $projet->debut = $request->debut;
            $projet->description = $request->description;
            $projet->lieu = $request->lieu ;
            $projet->categorie_id = $request->categorie_id;
            $projet->entreprise_id = $request->entreprise_id;
            $projet->save();
            return  redirect()->back()->with('success','Projet Ajoutè avec Success !');
        };
   }
    public function delete ($id) {
        $projet = Projet::findOrFail($id);
        $projet->delete();
        return redirect()->back();
    }
}
