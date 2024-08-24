<!-- resources/views/fournisseurs/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Détails du Fournisseur</h1>

    <div class="card">
        <div class="card-header">
            {{ $fournisseur->nom }}
        </div>
        <div class="card-body">
            <p><strong>Contact:</strong> {{ $fournisseur->contact }}</p>
            <p><strong>Email:</strong> {{ $fournisseur->email }}</p>
            <p><strong>Description:</strong> {{ $fournisseur->description }}</p>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('fournisseurs.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
</div>
@endsection
