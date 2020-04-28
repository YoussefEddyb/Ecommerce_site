<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPanierDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panier_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('id_panier')->unsigned();
            $table->foreign('id_panier')->references('id')->on('paniers')->onDelete('cascade');

            $table->integer('id_produit')->unsigned();
            $table->foreign('id_produit')->references('id')->on('produits')->onDelete('cascade');

            $table->double('prix_unitaire');
            $table->integer('quantite');
            $table->double('remise');
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
        Schema::dropIfExists('panier_details');
    }
}
