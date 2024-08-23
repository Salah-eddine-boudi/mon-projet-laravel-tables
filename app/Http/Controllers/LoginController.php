<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showing()
    {
        return view('login.showing');
    }

    public function login(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Récupérer les informations de connexion
        $credentials = $request->only('email', 'password');

        // Essayer de se connecter avec les informations fournies
        if (Auth::attempt($credentials)) {
            // Connexion réussie : rediriger vers la liste des produits
            return redirect()->route('produits.index');
        } else {
            // Connexion échouée : retourner à la page de connexion avec une erreur
            return back()->withErrors([
                'email' => 'Les identifiants fournis sont incorrects.',
            ]);
        }
    }

    public function logout()
    {
        // Déconnexion de l'utilisateur
        Auth::logout();

        // Flash message de déconnexion
        Session::flash('message', 'Vous avez été déconnecté avec succès.');

        // Rediriger vers la page de connexion
        return redirect()->route('login.showing');
    }
}
