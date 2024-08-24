@extends('layouts.app')
<title >@yield('title', 'AJOUT F |   GYA BITTI ') </title>
@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="mb-0"><i class="fas fa-user-plus"></i> Ajouter un fournisseur</h1>
            <a href="{{ route('fournisseurs.index') }}" class="btn btn-light">
                <i class="fas fa-arrow-left"></i> Retour
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('fournisseurs.store') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="nom" class="form-label">Nom du fournisseur</label>
                    <input type="text" name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required autofocus>
                    @error('nom')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <small class="form-text text-muted">Entrez le nom complet du fournisseur.</small>
                </div>

                <div class="form-group mb-4">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" value="{{ old('contact') }}" required>
                    @error('contact')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <small class="form-text text-muted">Entrez le numéro de téléphone ou l'email du fournisseur.</small>
                </div>

                <div class="form-group text-center mt-5">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-check-circle"></i> Ajouter
                    </button>
                    <a href="{{ route('fournisseurs.index') }}" class="btn btn-secondary btn-lg ml-3">
                        <i class="fas fa-times-circle"></i> Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
