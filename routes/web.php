<?php

use App\Http\Controllers\Authentification\Entreprise\EntrepriseController;
use App\Http\Controllers\Authentification\Prestataire\PrestataireController;
use App\Http\Controllers\Authentification\Entreprise\EntrepriseControllerController;
use App\Http\Controllers\Authentification\LoginController;
use App\Http\Controllers\Authentification\Prestataire\DashboardController;
use App\Http\Controllers\Authentification\Prestataire\ProfilController;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Formulaire de connexion
Route::get('/connexion', [LoginController::class, 'showLoginForm'])->name('connexion');
Route::post('/connexion', [LoginController::class, 'login'])->name('users.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Formulaire d'inscription pour les prestataires
Route::get('/register/prestataire', [PrestataireController::class, 'showRegisterForm'])->name('login');
Route::post('/prestataire/register', [PrestataireController::class, 'register'])->name('prestataire.register');
Route::get('/register/entreprise', [EntrepriseController::class, 'showRegisterForm'])->name('login2');
Route::post('entreprise/register', [EntrepriseController::class, 'register'])->name('entreprise.register');

// Tableau de bord pour les prestataires (protégé par middleware)
Route::middleware(['auth:prestataire'])->group(function () {
    Route::get('/dashboard/prestataire', [DashboardController::class, 'index'])->name('prestataire.dashboard');

    // Route pour afficher le profil
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil');

    // Route pour mettre à jour le profil
    Route::put('/profil', [ProfilController::class, 'update'])->name('update-profil');
    // Route pour la suppression du profil
// Route pour la suppression du profil
Route::delete('/profil/supprimer', [ProfilController::class, 'destroy'])->name('delete-profil');

});
