@extends('layouts.app')
<title>@yield('title', 'FOURNISSEURS | GYA BITTI')</title>

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Liste des Fournisseurs</h1>

    
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    
                    <th>Contact</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fournisseurs as $index => $fournisseur)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $fournisseur->nom }}</td>
                        
            
                        <td>{{ $fournisseur->contact }}</td>
                        <td class="text-center">
                           
                            <a href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye">Voir</i> 
                            </a>

                            
                            <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"> Éditer</i>
                            </a>

                            
                            <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')">
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
        <a href="{{ route('fournisseurs.create') }}" class="btn btn-secondary mx-2">
            <i class="fas fa-plus-circle"></i> Ajouter un Fournisseur
        </a>
        <a href="{{ route('produits.create') }}" class="btn btn-secondary mx-2">
            <i class="fas fa-plus-square"></i> Ajouter un Produit
        </a>
    </div>
</div>
@endsection
