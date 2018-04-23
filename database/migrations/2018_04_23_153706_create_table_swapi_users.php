<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSwapiUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swapi_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('height')->nullable();
            $table->string('mass')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('eye_color')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('gender')->nullable();
            $table->string('homeworld')->nullable();
            $table->string('url')->nullable();
            $table->json('films')->nullable();
            $table->json('species')->nullable();
            $table->json('vehicles')->nullable();
            $table->json('starships')->nullable();
            $table->string('created')->nullable();
            $table->string('edited')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('swapi_users');
    }
}
