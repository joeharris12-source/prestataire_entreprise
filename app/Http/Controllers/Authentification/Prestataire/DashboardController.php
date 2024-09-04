<?php

namespace App\Http\Controllers\Authentification\Prestataire;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Prestataire;
use App\Models\Project;


class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer les informations du prestataire actuellement connecté
        $prestataire = Auth::guard('prestataire')->user();

     

        // Passer les données à la vue
        return view('dashboard.dashboardPres', [
            'prestataire' => $prestataire,
        
        ]);
    }
}
