@extends('layouts.app')
<title >@yield('title', 'LISTE DES PRODUITS |   GYA BITTI ') </title>
@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Liste des Produits</h1>

    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom du Produit</th>
                    <th>Fournisseur</th>
                    <th>Prix</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produits as $produit)
                    <tr>
                        <td>{{ $loop->iteration }}</td> 
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->fournisseur->nom }}</td>
                        <td>{{ $produit->prix }}</td>
                        <td class="text-center">
                            
                            <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit">Éditer</i> 
                            </a>

                            
                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                                    <i class="fas fa-trash-alt">Supprimer</i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

   
    <div class="d-flex justify-content-center mt-4">
        <a href="{{ route('produits.create') }}" class="btn btn-secondary mx-2">
            <i class="fas fa-plus-square">Ajouter un Produit</i> 
        </a>
    </div>
</div>
@endsection
