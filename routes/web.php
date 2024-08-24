<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;

// Page d'accueil - accessible à tous
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes nécessitant une authentification
Route::middleware('auth')->group(function () {
    // Routes pour ProduitController
    Route::resource('produits', ProduitController::class);

    // Routes pour FournisseurController
    Route::resource('fournisseurs', FournisseurController::class);
});

// Routes de gestion de l'inscription et de la connexion

// Route pour afficher le formulaire d'inscription
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');

// Route pour gérer la soumission du formulaire d'inscription
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Route pour afficher le formulaire de connexion
Route::get('/login', [LoginController::class, 'showing'])->name('login.showing');

// Route pour gérer la soumission du formulaire de connexion
Route::post('/login', [LoginController::class, 'login'])->name('login');

// Route pour déconnecter l'utilisateur
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');
