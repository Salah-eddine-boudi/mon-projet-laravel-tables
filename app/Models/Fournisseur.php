<?php

namespace App\Models;    // Le namespace indique que cette classe se trouve dans le répertoire "App\Models".


use Illuminate\Database\Eloquent\Model; 

class Fournisseur extends Model           
{
    
    protected $fillable = [
        'nom', 'contact', 'description', 'email',
    ];
    
    
    public $timestamps = true;


    
    public function produits() // Déclaration d'une relation entre "Fournisseur" et "Produit".
{
    return $this->hasMany(Produit::class); // Indique qu'un fournisseur peut avoir plusieurs produits (relation "one-to-many").
}

}



