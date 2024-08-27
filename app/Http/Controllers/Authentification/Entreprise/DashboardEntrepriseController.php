<?php

namespace App\Http\Controllers\Authentification\Entreprise;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardEntrepriseController extends Controller
{
    public function index()
    {
       
    $entreprise = Auth::guard('entreprise')->user();
    return view('dashboard.dashboardEntr', compact('entreprise'));
    }
}
