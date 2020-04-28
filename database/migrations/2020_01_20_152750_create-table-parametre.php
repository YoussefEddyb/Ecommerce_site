<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableParametre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametre', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo',255);
            $table->string('adresse',100);
            $table->string('email',60);
            $table->string('telephone',20);
            $table->string('fax',20);
            $table->string('description',150);
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
        Schema::dropIfExists('parametre');
    }
}
