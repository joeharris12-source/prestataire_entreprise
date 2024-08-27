<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Prestataire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PrestataireController extends Controller
{
    public function index () {
        $prestataires = Prestataire::paginate(7);
        $categories = Categorie::paginate(7);
       // dd($prestataires);
        return view('back-end.pages.prestataire.prestataire' , compact('prestataires' , 'categories'));
     }

     public function show ($id) {
         $prestataire = Prestataire::findOrFail($id);
         return view('back-end.pages.prestataire.prestataire-show',compact('prestataire'));
     }

     public function addPrestataire (Request $request) {

         if($request->input('id') > 0){

             $prestataire = Prestataire::findOrFail($request->input('id'));
             $prestataire->metier = $request->metier ;
             $prestataire->competence = $request->competence;
             $prestataire->niveau = $request->niveau;
             $prestataire->categorie_id = $request->categorie_id;
             $prestataire->save();

            $user = User::FindOrFail($prestataire->user_id);
            $user->nom = $request->nom ;
            $user->prenom = $request->prenom;
            $user->telephone = $request->telephone;
            $user->email = $request->email;

            if($user->password != $request->input('password') ) {
                 $user->password= Hash::make('123456789');
             // $user->password= bcrypt($request->input('password'));
            }
            $user->save();
             return redirect()->route('admin.prestataire.index')->with('success','Prestataire Modifié avec Success !');
         }else{
             $user = new User;
             $user->nom = $request->nom ;
             $user->prenom = $request->prenom;
             $user->telephone = $request->telephone;
             $user->email = $request->email;
             $user->role = $request->role;
             $user->password= Hash::make('123456789');
             $user->save();

             $prestataire= new Prestataire();
             $prestataire->metier = $request->metier ;
             $prestataire->competence = $request->competence;
             $prestataire->niveau = $request->niveau;
             $prestataire->categorie_id = $request->categorie_id;
             $prestataire->user_id = $user->id;
             $prestataire->save();


             return  redirect()->back()->with('success','Prestataire Ajoutè avec Success !');
         };
      }

      public function edit ($id) {
         $entreprise =Prestataire::findOrFail($id);
         $categories = Categorie::all();
         return view('back-end.pages.entreprise.entreprise-edite',compact('entreprise' , 'categories'));
     }

     public function delete ($id) {
         $entreprise = Prestataire::findOrFail($id);
         $entreprise->delete();
         return redirect()->back()->with('success','Prestataire supprimer avec Success !');
     }

}
