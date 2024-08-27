<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\SousCategorie;
class SousCategorieController extends Controller
{
    public function index () {
        $sousCategories = SousCategorie::paginate(2);
        $Categories = Categorie::all();
        return view('back-end.pages.sousCategorie.sousCategorie' , compact('sousCategories' , 'Categories'));
    }

    public function show ($id) {
      $sousCategorie = SousCategorie::findOrFail($id);
      $Categories = Categorie::all();
      return view('back-end.pages.sousCategorie.sous-categorie-show' , compact('sousCategorie' , 'Categories'));
    }

    public function create (Request $request) {
        SousCategorie::create([
            'libelle' => $request->libelle ,
            'categorie_id' => $request->categorie ,
        ]);
        return redirect()->route('admin.sousCategorie.index')->with('success' , "Sous Categorie Ajouter");
    }

    public function update ($id , Request $request) {
        $SousCategorie = SousCategorie::findOrFail($id);
        $SousCategorie->libelle = $request->libelle ;
        $SousCategorie->categorie_id = $request->categorie ;
        $SousCategorie->save();
        return redirect()->route('admin.sousCategorie.index')->with('success' , "Sous Categorie modifier");
    }

    public function delete ($id) {
        $SousCategorie = SousCategorie::findOrFail($id);
        $SousCategorie->delete();
        return redirect()->back()->with('success' , "Sous Categorie Supprimer") ;
    }
}
