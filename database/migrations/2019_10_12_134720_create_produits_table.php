<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nom_produit',60);

            $table->integer('id_fournisseur')->unsigned();
            $table->foreign('id_fournisseur')->references('id')->on('fournisseurs')->onDelete('cascade');

            $table->integer('id_categorie')->unsigned();
            $table->foreign('id_categorie')->references('id')->on('categories')->onDelete('cascade');

            $table->integer('quantite_unite');
            $table->double('prix_unitaire');
            $table->integer('unites_stock');
            $table->integer('unites_commandees');
            $table->integer('niveau_reapprovisionnement');
            $table->string('image',255);
            $table->string('code_bar',255);
            $table->boolean('indisponsable')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
