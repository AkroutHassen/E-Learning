<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntervenirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervenirs', function (Blueprint $table) {
            $table->unsignedBigInteger('idEns')->index();
            $table->unsignedBigInteger('idCours')->index();
            $table->integer('resp')->nullable()->zerofill()->default('0');
            $table->timestamps();
            $table->primary(['idEns','idCours','resp']);
            $table->foreign('idEns')->references('id')->on('enseignants')->onDelete('cascade');
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
        Schema::dropIfExists('intervenirs');
    }
}
