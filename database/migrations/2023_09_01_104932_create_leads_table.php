<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('telefone');
            $table->string('email');
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('pais_interesse');
            $table->timestamps();
        });

        Schema::table('leads', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states');
        });
        Schema::table('leads', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
