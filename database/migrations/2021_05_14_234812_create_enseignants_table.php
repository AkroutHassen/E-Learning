<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 50);
            $table->string('login', 50)->unique();
            $table->string('tel', 11)->nullable()->default(null);
            $table->enum('grade', ['PR','MCF','CONTRACTUEL']);
            $table->integer('numBureau')->nullable()->default(null);
            $table->timestamps();
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('login')->references('login')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('email')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enseignants');
        
    }
}
