<?php

namespace App\Http\Controllers\Authentification\Entreprise;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardEntrepriseController extends Controller
{
    public function index()
    {
        // Return the dashboard view
        return view('entreprise.dashboard', [
            'entreprise' => Auth::user()
        ]);
    }
}
