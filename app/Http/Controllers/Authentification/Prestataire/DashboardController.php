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

        // Récupérer les projets liés au prestataire
        $completedProjects = Project::where('prestataire_id', $prestataire->id)
                                    ->where('status', 'completed')
                                    ->get();

        $ongoingProjects = Project::where('prestataire_id', $prestataire->id)
                                   ->where('status', 'ongoing')
                                   ->get();

        // Passer les données à la vue
        return view('dashboardPres', [
            'prestataire' => $prestataire,
            'completedProjects' => $completedProjects,
            'ongoingProjects' => $ongoingProjects,
        ]);
    }
}
