<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('idEtu')->index();
            $table->unsignedBigInteger('idCours')->index();
            $table->timestamps();
            $table->primary(['idEtu','idCours']);
            $table->foreign('idEtu')->references('id')->on('etudiants')->onDelete('cascade');
            $table->foreign('idCours')->references('id')->on('cours')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
