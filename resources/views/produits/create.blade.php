@extends('layouts.app')
<title >@yield('title', 'INSCIPTION |   GYA BITTI ') </title>
@section('content')
<div class="container mt-5">
    <!-- Carte pour encapsuler le formulaire -->
    <div class="card shadow-sm rounded"> <!-- Création d'une carte Bootstrap pour encapsuler le formulaire avec une ombre légère et des coins arrondis -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <!-- En-tête de la carte avec un fond bleu et du texte blanc. L'alignement et l'espacement des éléments sont gérés par Flexbox -->
            <h1 class="mb-0"><i class="fas fa-box">Ajouter un produit</i> </h1> <!-- Titre de la carte avec une icône de boîte représentant l'ajout de produit -->
            <a href="{{ route('produits.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left"> Retour</i> <!-- Bouton de retour avec une icône de flèche à gauche -->
            </a>
        </div>
        <div class="card-body"> <!-- Corps de la carte où se trouve le formulaire -->
            <form action="{{ route('produits.store') }}" method="POST"> <!-- Définition du formulaire avec la méthode POST pour envoyer les données à la route 'produits.store' -->
                @csrf <!-- Directive Blade pour inclure un jeton CSRF, qui protège contre les attaques CSRF -->
                <div class="row"> <!-- Début de la ligne contenant deux colonnes -->
                    <div class="col-md-6 mb-4"> <!-- Première colonne pour le champ "Nom du produit" avec un espacement en bas -->
                        <div class="form-group"> <!-- Création d'un groupe de formulaire pour encapsuler le label et l'input -->
                            <label for="nom"><i class="fas fa-tag">Nom du produit</i> </label> <!-- Label avec une icône de balise pour le champ "Nom du produit" -->
                            <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" 
                                   value="{{ old('nom') }}" placeholder="Entrez le nom du produit" required> <!-- Champ de texte pour entrer le nom du produit, avec validation Laravel et conservation des données précédentes -->
                            @error('nom')
                                <div class="invalid-feedback">
                                    {{ $message }} <!-- Message d'erreur affiché si la validation échoue -->
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 mb-4"> <!-- Deuxième colonne pour le champ "Prix" avec un espacement en bas -->
                        <div class="form-group"> <!-- Création d'un groupe de formulaire pour encapsuler le label et l'input -->
                            <label for="prix"><i class="fas fa-dollar-sign">Prix</i> </label> <!-- Label avec une icône de dollar pour le champ "Prix" -->
                            <input type="number" name="prix" id="prix" class="form-control @error('prix') is-invalid @enderror" 
                                   value="{{ old('prix') }}" placeholder="Entrez le prix du produit" step="0.01" required> <!-- Champ numérique pour entrer le prix du produit, avec validation Laravel et conservation des données précédentes -->
                            @error('prix')
                                <div class="invalid-feedback">
                                    {{ $message }} <!-- Message d'erreur affiché si la validation échoue -->
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mb-4"> <!-- Groupe de formulaire pour le champ de sélection du fournisseur, avec un espacement en bas -->
                    <label for="fournisseur_id"><i class="fas fa-industry">Fournisseur</i> </label> <!-- Label avec une icône d'usine pour le champ "Fournisseur" -->
                    <select name="fournisseur_id" id="fournisseur_id" class="form-control @error('fournisseur_id') is-invalid @enderror" required> <!-- Liste déroulante pour sélectionner un fournisseur, avec validation Laravel -->
                        <option value="" disabled selected>Choisissez un fournisseur</option> <!-- Option par défaut pour inciter l'utilisateur à sélectionner un fournisseur -->
                        @foreach ($fournisseurs as $fournisseur) <!-- Boucle pour remplir la liste déroulante avec les fournisseurs disponibles -->
                            <option value="{{ $fournisseur->id }}" 
                                    {{ old('fournisseur_id') == $fournisseur->id ? 'selected' : '' }}> <!-- Conserve la sélection précédente en cas d'erreur -->
                                {{ $fournisseur->nom }} <!-- Affiche le nom du fournisseur dans l'option -->
                            </option>
                        @endforeach
                    </select>
                    @error('fournisseur_id')
                        <div class="invalid-feedback">
                            {{ $message }} <!-- Message d'erreur affiché si la validation échoue -->
                        </div>
                    @enderror
                </div>
                <div class="form-group text-center mt-4"> <!-- Groupe de formulaire pour les boutons d'action, centré avec un espacement en haut -->
                    <button type="submit" class="btn btn-success btn-lg"><i class="fas fa-plus-circle">Ajouter</i> </button> <!-- Bouton d'envoi du formulaire avec une icône de cercle "+" -->
                    <a href="{{ route('produits.index') }}" class="btn btn-secondary btn-lg ml-3"><i class="fas fa-arrow-left">Retour</i> </a> <!-- Bouton pour annuler et retourner à la liste des produits, avec une icône de flèche à gauche -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
