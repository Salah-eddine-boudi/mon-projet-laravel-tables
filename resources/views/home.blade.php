@extends('layouts.app')

@section('content')
<div class="container mt-5">
   
    <h1 class="mb-4 text-center">Bienvenue sur la page d'accueil | <span class="bolder">GYA BITTI </span></h1>

    
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">À propos de ce projet</h2>
            <p class="card-text">
                Ce projet est une application web de gestion de produits et de fournisseurs, développée en utilisant le framework Laravel.
                Il permet aux utilisateurs de gérer facilement les informations sur les produits et leurs fournisseurs associés. 
                Les fonctionnalités principales incluent la création, la mise à jour, la suppression, et la visualisation des enregistrements des produits et des fournisseurs.
            </p>
        </div>
    </div>

    <!-- Fonctionnalités du projet -->
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Gestion des Produits</h3>
                    <p class="card-text">
                        Ajoutez, modifiez et supprimez des produits. Chaque produit est associé à un fournisseur spécifique, ce qui permet une gestion efficace des stocks.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Gestion des Fournisseurs</h3>
                    <p class="card-text">
                        Gérez les informations des fournisseurs. Chaque fournisseur peut avoir plusieurs produits associés, facilitant ainsi la gestion des relations avec les fournisseurs.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Interface Utilisateur Moderne</h3>
                    <p class="card-text">
                        L'interface utilisateur est conçue avec Bootstrap pour offrir une expérience utilisateur fluide et responsive, adaptée à tous les appareils.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Technologies utilisées -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">Technologies Utilisées</h2>
            <p class="card-text">
                Ce projet utilise les technologies suivantes :
            </p>
            <ul>
                <li><strong>Laravel:</strong> Pour la structure et le développement backend.</li>
                <li><strong>Bootstrap:</strong> Pour la création d'une interface utilisateur responsive et moderne.</li>
                <li><strong>MySQL:</strong> Comme système de gestion de base de données pour stocker les informations sur les produits et les fournisseurs.</li>
                <li><strong>JavaScript & jQuery:</strong> Pour améliorer l'interactivité de l'application.</li>
            </ul>
        </div>
    </div>

    <!-- Appel à l'action pour explorer l'application -->
    <div class="text-center mt-4">
        <a href="{{ route('produits.index') }}" class="btn btn-primary mx-2">
            <i class="fas fa-box">Explorer les Produits</i> 
        </a>
        <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary mx-2">
            <i class="fas fa-truck">Voir les Fournisseurs </i> 
        </a>
    </div>
</div>
@endsection
