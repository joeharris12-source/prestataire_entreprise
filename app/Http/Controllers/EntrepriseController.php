<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EntrepriseController extends Controller
{
    public function index () {
        $entreprises = Entreprise::paginate(2);
        return view('back-end.pages.entreprise.entreprise' , compact('entreprises'));
     }

     public function show ($id) {
         $entreprise = Entreprise::findOrFail($id);
         return view('back-end.pages.entreprise.entreprise-show',compact('entreprise'));
     }

     public function addEntreprise (Request $request) {

        if($request->input('id') > 0){

            $entreprise = Entreprise::findOrFail($request->input('id'));
            $entreprise->nom_entreprise = $request->nom_entreprise ;
            $entreprise->fonction = $request->fonction;
            $entreprise->civilite = $request->civilite;
            $entreprise->save();

           $user = User::FindOrFail($entreprise->user_id);
           $user->nom = $request->nom ;
           $user->prenom = $request->prenom;
           $user->telephone = $request->telephone;
           $user->email = $request->email;

        //    if($user->password != $request->input('password') ) {
        //     $user->password= bcrypt($request->input('password'));
        //    }
           $user->save();
            return redirect()->route('admin.projet')->with('success','Entreprise Modifié avec Success !');
        }else{
            $user = new User;
            $user->nom = $request->nom ;
            $user->prenom = $request->prenom;
            $user->telephone = $request->telephone;
            $user->email = $request->email;
            $user->role = 1;
            $user->password= Hash::make('123456789');
            $user->save();

            $entreprise = new Entreprise;
            $entreprise->nom_entreprise = $request->nom_entreprise ;
            $entreprise->fonction = $request->fonction;
            $entreprise->civilite = $request->civilite;
            $entreprise->user_id = $user->id ;
            $entreprise->save();


            return  redirect()->back()->with('success','Entreprise Ajoutè avec Success !');
        };
     }

     public function edit ($id) {
        $entreprise = Entreprise::findOrFail($id);
        return view('back-end.pages.entreprise.entreprise-edite',compact('entreprise'));
    }

    public function delete ($id) {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->delete();
        return redirect()->back()->with('success','Entreprise supprimer avec Success !');
    }
}
