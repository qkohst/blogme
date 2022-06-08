<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimoniAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimoni_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academy_id')->unsigned();
            $table->unsignedBigInteger('peserta_academy_id')->unsigned();
            $table->longText('testimoni');
            $table->timestamps();

            $table->foreign('academy_id')->references('id')->on('academies');
            $table->foreign('peserta_academy_id')->references('id')->on('peserta_academies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimoni_academies');
    }
}
