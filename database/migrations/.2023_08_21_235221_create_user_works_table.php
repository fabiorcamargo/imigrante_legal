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
        Schema::create('user_works', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('cargo');
            $table->string('empresa');
            $table->string('responsabiliade');
            $table->string('conquista')->nullable();
            $table->string('inicio');
            $table->string('fim')->nullable();
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();

            $table->timestamps();
        });

        Schema::table('user_works', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states');
        });
     
        Schema::table('user_works', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_works');
    }
};
