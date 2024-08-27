<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\Entreprise;
use App\Models\Prestataire;
use App\Models\Projet;
use GuzzleHttp\Promise\Create;

class ContratController extends Controller
{
    public function index () {
        $contrats = Contrat::paginate(2);
        $prestataires = Prestataire::all();
        $projets = Projet::all();
        $entreprises = Entreprise::all();
        return view('back-end.pages.contrat.contrat' , compact('contrats', 'prestataires' , 'entreprises' , 'projets'));
    }

    public function show ($id) {
        $contrat = Contrat::FindOrFail($id);
        return view('back-end.pages.contrat.contrat-show' , compact('contrat' ));
    }

    public function Create (Request $request) {
        /*$request->validate([

        ]);*/
         Contrat::create([
            "debut"=>$request->debut ,
            "dure" => $request->dure ,
            "prestataire_id"=> $request->prestataire_id,
            "projet_id"=> $request->projet_id ,
            "entreprise_id"=>$request->entreprise_id,
            "description"=>$request->description,
         ]);

         return redirect()->back()->with('success' , "Contrat ajouté");
    }

    public function edit ($id) {
        $contrat = Contrat::FindOrFail($id);
        $prestataires = Prestataire::all();
        $projets = Projet::all();
        $entreprises = Entreprise::all();
        return view('back-end.pages.contrat.contat-edite', compact('contrat','prestataires' , 'entreprises' , 'projets'));
    }

    public function update ($id , Request $request) {
        $contrat = Contrat::findOrFail($id);
        $contrat->debut=$request->debut ;
        $contrat->dure = $request->dure ;
        $contrat->prestataire_id = $request->prestataire_id ;
        $contrat->projet_id = $request->projet_id ;
        $contrat->entreprise_id=$request->entreprise_id;
        $contrat->description=$request->description;
        $contrat->save();
        return redirect()->route('admin.contrat.index')->with('success' , "contrat modifier");
    }

    public function delete ($id) {
      $contrat = Contrat::FindOrFail($id);
      $contrat->delete();
      return redirect()->back();
    }
}
