<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('idEtu')->index();
            $table->unsignedBigInteger('idCours')->index();
            $table->float('noteExam')->nullable()->default(null);
            $table->float('noteTd')->nullable()->default(null);
            $table->float('moy')->nullable()->default(null);
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
        Schema::dropIfExists('notes');
    }
}
