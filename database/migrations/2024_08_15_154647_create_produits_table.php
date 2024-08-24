<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');  // Assurez-vous que cette ligne est présente
            $table->decimal('prix', 8, 2);
            $table->unsignedBigInteger('fournisseur_id');
            $table->timestamps();
// Définition de la clé étrangère 'fournisseur_id' qui référence la colonne 'id' de la table 'fournisseurs'
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
        });
    }

    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
