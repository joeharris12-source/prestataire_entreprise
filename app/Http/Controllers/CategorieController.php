<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    public function index () {
        $categories = Categorie::paginate(2);
        return view('back-end.pages.Categorie.categorie' , compact('categories'));
    }

    public function show ($id) {
      $categorie = Categorie::findOrFail($id);
      return view('back-end.pages.Categorie.categorie-show' , compact('categorie'));
    }

    public function create (Request $request) {
        $request->validate([
            'description'=>'required',
            'libelle'=>'required',
        ]);

        Categorie::create([
            'libelle' => $request->libelle ,
            'description'=>$request->description ,

        ]);
        return redirect()->route('admin.categorie.index')->with('success' , "Categorie Ajouter");
    }
    public function update ($id , Request $request) {
        $categorie = Categorie::findOrFail($id);
        if($request->hasFile('image')) {

            Storage::delete('public/images/' . $categorie->image_path);
            $filename = time().'.'.$request->file('image_path')->extension();
            $path = $request->file('image_path')->storeAs(
            'CategorieImg',
             $filename,
             'public'
            );

            $categorie->image_path = $path ;
           }

        $categorie->libelle = $request->libelle ;
        $categorie->save();
        return redirect()->route('admin.categorie.index')->with('success' , "Categorie modifier");
    }

    public function delete ($id) {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->back()->with('success' , "Categorie Supprimer") ;
    }
}
