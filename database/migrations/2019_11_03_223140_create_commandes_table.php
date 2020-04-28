<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->Increments('id');

            $table->integer('id_client')->unsigned();
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade');

            $table->integer('id_employe')->unsigned();
            $table->foreign('id_employe')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_messager')->unsigned();
            $table->foreign('id_messager')->references('id')->on('messagers')->onDelete('cascade');

            $table->date('date_commande');
            $table->date('livrer_avant');
            $table->date('date_envoi');
            $table->double('port');
            $table->string('destinataire');
            $table->string('adresse_livraison');
            $table->string('ville_livraison',40);
            $table->string('region_livraison',60);
            $table->string('code_postal_livraison',20);
            $table->string('pays_livraison',40);
            $table->boolean('active')->default(0);
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
        Schema::dropIfExists('commandes');
    }
}
