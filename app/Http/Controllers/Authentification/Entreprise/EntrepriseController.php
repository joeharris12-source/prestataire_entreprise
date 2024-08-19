<?php
namespace App\Http\Controllers\Authentification\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class EntrepriseController extends Controller
{
    public function showRegisterForm()
    {
        return view('login2');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:entreprises',
            'telephone'=>'required|string|max:30',
            'ville'=>'required|string|max:255',
            'quartier'=>'required|string|max:255',
            'password' => 'required|string|min:8',
        
        ]);

        DB::beginTransaction();
        
        try {
            $entreprise = Entreprise::create([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'ville' => $request->ville,
                'quartier' => $request->quartier,
                'password' => Hash::make($request->password),
            ]);

            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'entreprise',
            ]);

            DB::commit();
            Auth::guard('entreprise')->login($entreprise);

            return redirect('/login/entreprise')->with('success', 'Inscription réussie');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erreur lors de l\'inscription: ' . $e->getMessage());
        }
    }
}
