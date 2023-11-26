<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 50);
            $table->string('login')->unique();
            $table->string('tel', 11)->nullable()->default(null);
            $table->string('adresse')->nullable()->default(null);
            $table->unsignedBigInteger('numGroupe')->nullable()->default(null)->index();
            $table->unsignedBigInteger('codeDip')->nullable()->default(null)->index();
            $table->timestamps();
            $table->foreign('numGroupe')->references('id')->on('groupes')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('codeDip')->references('id')->on('diplomes')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('login')->references('login')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
