<?php

use App\Http\Controllers\Authentification\Prestataire\PrestataireController;
use App\Http\Controllers\Authentification\Entreprise\EntrepriseController;
use App\Http\Controllers\Authentification\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/connexion', [LoginController::class, 'showLoginForm'])->name('connexion');
Route::post('/connexion', [LoginController::class, 'login'])->name('users.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register/prestataire', [PrestataireController::class, 'showRegisterForm'])->name('login');
Route::post('/register-prestataire', [PrestataireController::class, 'register'])->name('prestataire.register');

Route::get('/register/entreprise', [EntrepriseController::class, 'showRegisterForm'])->name('login2');
Route::post('/register-entreprise', [EntrepriseController::class, 'register'])->name('entreprise.register');
