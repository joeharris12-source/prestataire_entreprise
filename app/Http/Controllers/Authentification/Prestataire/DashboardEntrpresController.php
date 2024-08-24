<?php

namespace App\Http\Controllers\Authentification\Prestataire;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardEntrpresController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboardentpre');
    }

}
