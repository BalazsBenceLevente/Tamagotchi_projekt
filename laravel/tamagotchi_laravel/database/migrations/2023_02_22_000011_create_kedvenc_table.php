<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained("users","id");
            $table->foreignId('animals_id')->constrained("animals","id");
            $table->string('petname');
            /*$table->dateTime('hungerdate');*/
            $table->integer('hunger');
            $table->integer('thirst');
            $table->integer('mood');
            $table->integer('fatigue');
            $table->date('birth');
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
        Schema::dropIfExists('pets');
    }
};