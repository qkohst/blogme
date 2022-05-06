<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasilitasAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fasilitas_id')->unsigned();
            $table->unsignedBigInteger('academies_id')->unsigned();
            $table->timestamps();

            $table->foreign('fasilitas_id')->references('id')->on('fasilitas');
            $table->foreign('academies_id')->references('id')->on('academies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasilitas_academies');
    }
}
