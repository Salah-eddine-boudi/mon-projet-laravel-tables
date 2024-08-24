<!-- resources/views/produits/show.blade.php -->
@extends('layouts.app')
<title >@yield('title', 'DETAILS P |   GYA BITTI ') </title>
@section('content')
<div class="container mt-5">
    <h1>{{ $produit->nom }}</h1>
    <p>Prix : {{ $produit->prix }}</p>
    <p>Fournisseur : {{ $produit->fournisseur->nom }}</p>
    <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour à la liste des produits</a>
</div>
@endsection
