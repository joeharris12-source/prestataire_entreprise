<?php
use App\Http\Controllers\Authentification\Prestataire\PrestataireController;
use App\Http\Controllers\Authentification\Entreprise\EntrepriseController;
use App\Http\Controllers\Authentification\LoginController;
use App\Http\Controllers\Authentification\Prestataire\DashboardController;
use App\Http\Controllers\Authentification\Prestataire\ProfilController;
use App\Http\Controllers\Authentification\Entreprise\DashboardEntrepriseController;
use App\Http\Controllers\Authentification\Prestataire\EntrprestataireController;
use App\Http\Controllers\Authentification\Prestataire\DashboardEntrpresController;
use App\Http\Controllers\Authentification\Prestataire\ProfilEntrpresController;
use App\Http\Controllers\Authentification\Entreprise\ProfilEntrepriseController;
use App\Http\Controllers\Authentification\Entreprise\ProjetController;





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

Route::get('/register-entrprestataire', [EntrprestataireController::class, 'showRegisterForm'])->name('login1');
Route::post('/register-entrprestataire', [EntrprestataireController::class, 'register'])->name('entrprestataires.register');
Route::middleware(['IsEntrprestataire'])->group(function () {
    Route::get('/dashboardentpres', [DashboardEntrpresController::class, 'index'])->name('dashboardentpres');
    Route::get('/profilEntrpres', [ProfilEntrpresController::class, 'show'])->name('profilEntrpres');
    Route::post('/profil/update', [ProfilEntrpresController::class, 'updatentrpres'])->name('update-profilEntrpres');
    Route::delete('/profil/delete', [ProfilEntrpresController::class, 'destroy'])->name('delete-profilEntrpres');
});
Route::get('/entreprise/register', [EntrepriseController::class, 'showRegisterForm'])->name('login2');
Route::post('/entreprise/register', [EntrepriseController::class, 'register'])->name('entreprise.register');
Route::get('/entreprise/prestataires', [EntrepriseController::class, 'showPrestataires'])->name('entreprise-prestataires');

Route::middleware(['auth:entreprise'])->group(function () {
    Route::get('/entreprise/dashboard', [DashboardEntrepriseController::class, 'index'])->name('entreprise.dashboard');
    Route::get('/profil-entreprise', [ProfilEntrepriseController::class, 'show'])->name('profilEntr');
    Route::put('/profil-entreprise', [ProfilEntrepriseController::class, 'update'])->name('profilEntreprise.update');
    Route::delete('/entreprise/{id}', [ProfilEntrepriseController::class, 'destroy'])->name('delete-profilEntr');
    Route::get('/projets/create', [ProjetController::class, 'create'])->name('projet');
    Route::post('/projets', [ProjetController::class, 'store'])->name('projets.store');
    Route::get('/historique', [ProjetController::class, 'index'])->name('historique');
    Route::get('/projets/{id}/edit', [ProjetController::class, 'edit'])->name('projets.edit');
    Route::put('/projets/{id}', [ProjetController::class, 'update'])->name('projets.update');
    Route::delete('/projets/{id}', [ProjetController::class, 'destroy'])->name('projets.destroy');
    Route::get('/api/inscriptions', [EntrepriseController::class, 'getInscriptionsData']);
    Route::get('/api/secteurd\'activite',[EntrepriseController::class,'getSecteursActiviteData']);

});


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

