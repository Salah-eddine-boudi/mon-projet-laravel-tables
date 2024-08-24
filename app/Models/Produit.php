<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'prix', 'fournisseur_id'];

    public function fournisseur()

     // La méthode belongsTo indique que chaque produit appartient à un fournisseur unique.
    {
        return $this->belongsTo(Fournisseur::class);
    }

    
    
}
