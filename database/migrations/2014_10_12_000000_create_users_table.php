<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nom_employe',40);
            $table->string('prenom_employe',40);
            $table->string('fonction',60);
            $table->string('titre_courtoisie',60);
            $table->date('date_naissance');
            $table->date('date_embauche');
            $table->string('adresse',150);
            $table->string('ville',40);
            $table->string('region',60);
            $table->string('code_postal',20);
            $table->string('pays',40);
            $table->string('tel_domicile',30);
            $table->string('extension',30);
            $table->string('notes',100);
            $table->integer('rend_compte');
            $table->string('photo',255);
            $table->string('code_bar',100);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('active')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
