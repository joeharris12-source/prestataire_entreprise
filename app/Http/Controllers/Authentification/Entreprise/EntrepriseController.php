<?php
namespace App\Http\Controllers\Authentification\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\Entreprise;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EntrepriseController extends Controller
{
    public function showLogin()
    {
        return view('login2');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:entreprises|unique:users',
            'password' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        
        try {
            $entreprise = Entreprise::create([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            User::create([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'type' => 'entreprise',
            ]);

            DB::commit();

            return redirect('/login/entreprise')->with('success', 'Inscription réussie');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Erreur lors de l\'inscription: ' . $e->getMessage());
        }
    }
}
