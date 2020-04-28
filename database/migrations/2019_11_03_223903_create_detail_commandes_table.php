<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('id_commande')->unsigned();
            $table->foreign('id_commande')->references('id')->on('commandes')->onDelete('cascade');

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
        Schema::dropIfExists('detail_commandes');
    }
}
