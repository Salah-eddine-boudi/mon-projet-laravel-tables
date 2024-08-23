<?php



namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public function index()
    {
        // Récupérer tous les fournisseurs
        $fournisseurs = Fournisseur::all();

        // Passer les fournisseurs à la vue
        return view('fournisseurs.index', compact('fournisseurs'));
    }

    public function create()
    {
        return view('fournisseurs.create');
    }

    

    public function edit(Fournisseur $fournisseur)
    {
        return view('fournisseurs.edit', compact('fournisseur'));
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'description' => 'nullable|string',
            'email' => 'required|email|max:255',
        ]);
    
        // Mise à jour des informations du fournisseur
        $fournisseur->update([
            'nom' => $request->input('nom'),
            'contact' => $request->input('contact'),
            'description' => $request->input('description'),
            'email' => $request->input('email'),
        ]);
    
        // Redirection avec message de succès
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur mis à jour avec succès');
    }
    
    public function destroy(Fournisseur $fournisseur)
    {
        if ($fournisseur->produits()->count() > 0) {
            return redirect()->route('fournisseurs.index')->with('error', 'Vous ne pouvez pas supprimer ce fournisseur car il est lié à des produits.');
        }
    
        $fournisseur->delete();
    
        return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur supprimé avec succès');
    }
    


    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'contact' => 'required|string|max:255',
       
    ]);

    $fournisseur = Fournisseur::create($request->all());

    return redirect()->route('fournisseurs.index')->with('success', 'Fournisseur ajouté avec succès');
}

public function show(Fournisseur $fournisseur)
    {
        return view('fournisseurs.show', compact('fournisseur'));
    }

}