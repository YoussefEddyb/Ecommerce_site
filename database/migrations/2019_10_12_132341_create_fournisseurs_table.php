<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFournisseursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nom_fournisseur',40);
            $table->string('prenom_fournisseur',40);
            $table->string('societe',60);
            $table->string('contact',100);
            $table->string('fonction',60);
            $table->string('adresse',150);
            $table->string('ville',40);
            $table->string('region',60);
            $table->string('code_postal',20);
            $table->string('pays',40);
            $table->string('telephone',30);
            $table->string('fax',30);
            $table->string('email',100);
            $table->string('password',150);
            $table->string('photo',255);
            $table->string('code_bar',255);
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
        Schema::dropIfExists('fournisseurs');
    }
}
