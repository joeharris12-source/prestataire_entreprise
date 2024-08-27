<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestataire;
use App\Models\Projet;

class DashboardController extends Controller
{
    public function index () {

        $prestataires = Prestataire::all()->count();

        $missions = Projet::all()->count();


        return view('back-end.pages.dashboard',compact('prestataires','missions'));
    }
}
