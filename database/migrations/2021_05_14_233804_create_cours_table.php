<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('nom',50);
            $table->string('desc')->nullable()->default(null);
            $table->bigInteger('codeDip')->unsigned()->index();
            $table->float('coefExam');
            $table->float('coefTd');
            $table->float('coefDip');
            $table->float('nbHeures');
            $table->timestamps();
            $table->foreign('codeDip')->references('id')->on('diplomes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cours');
    }
}
