<?php
namespace App\Http\Controllers;


use App\Models\Produit;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::with('fournisseur')->get();
        // Debugging: Log the products
        \Log::info($produits);
        return view('produits.index', compact('produits'));
    }
    

    public function create()
    {
        $fournisseurs = Fournisseur::all();
        return view('produits.create', compact('fournisseurs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }

    public function edit(Produit $produit)
    {
        $fournisseurs = Fournisseur::all();
        return view('produits.edit', compact('produit', 'fournisseurs'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'fournisseur_id' => 'required|exists:fournisseurs,id',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

  

    public function show($id)
{
    // Essayer de trouver le produit avec l'ID fourni
    $produit = Produit::find($id);

    // Si le produit n'existe pas, retourner une erreur 404
    if (!$produit) {
        return abort(404, 'Produit non trouvé');
    }

    // Passer le produit à la vue
    return view('produits.show', compact('produit'));

    
}

public function destroy(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }


}
