<?php
namespace App\Http\Controllers\Authentification\Prestataire;

use App\Http\Controllers\Controller;
use App\Models\Prestataire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PrestataireController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:prestataires|unique:users',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        
        try {
            $prestataire = Prestataire::create([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'prestataire',
            ]);

            DB::commit();

            return redirect('/login')->with('success', 'Inscription réussie');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erreur lors de l\'inscription: ' . $e->getMessage());
        }
    }
}
