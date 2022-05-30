<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSilabusAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('silabus_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academy_id')->unsigned();
            $table->string('judul_silabus', 100);
            $table->bigInteger('waktu_belajar');
            $table->string('deskripsi');
            $table->timestamps();

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
        Schema::dropIfExists('silabus_academies');
    }
}
