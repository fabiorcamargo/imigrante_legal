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
        Schema::create('user_resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('viagem');
            $table->boolean('mudanca');
            $table->string('username')->nullable()->unique();
            $table->string('nome');
            $table->longText('objetivo');
            $table->json('skills');
            $table->date('nascimento');
            $table->string('telefone');
            $table->string('email');
            $table->integer('state_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->string('photo');
            $table->string('cursos_complementares')->nullable();
            $table->string('experiencia')->nullable();
            $table->timestamps();
        });
        Schema::table('user_resumes', function (Blueprint $table) {
            $table->foreign('state_id')->references('id')->on('states');
        });
        Schema::table('user_resumes', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_resumes');
    }
};
