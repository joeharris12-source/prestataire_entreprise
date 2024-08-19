<?php
use App\Http\Controllers\Authentification\Prestataire\PrestataireController;
use App\Http\Controllers\Authentification\Entreprise\EntrepriseController;
use App\Http\Controllers\Authentification\LoginController;
use App\Http\Controllers\Authentification\Prestataire\DashboardController;
use App\Http\Controllers\Authentification\Prestataire\ProfilController;
use App\Http\Controllers\Authentification\Entreprise\DashboardEntrepriseController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth:prestataire', 'is_prestataire'])->group(function () {
    Route::get('/dashboard/prestataire', [DashboardController::class, 'index'])->name('prestataire.dashboard');
    Route::get('/profil', [ProfilController::class, 'show'])->name('profil');
    Route::put('/profil', [ProfilController::class, 'update'])->name('update-profil');
    Route::delete('/profil/supprimer', [ProfilController::class, 'destroy'])->name('delete-profil');
});
Route::post('/logout', [App\Http\Controllers\Authentification\LoginController::class, 'logout'])->name('logout');
Route::get('/register', function() {
    return view('auth.register'); 
})->name('register');
Route::middleware(['auth', 'CheckEntreprise'])->group(function () {
    Route::get('/dashboard/entreprise', [DashboardEntrepriseController::class, 'index'])->name('entreprise.dashboard');
});
