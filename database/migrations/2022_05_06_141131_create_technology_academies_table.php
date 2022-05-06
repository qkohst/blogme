<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologyAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technology_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technologies_id')->unsigned();
            $table->unsignedBigInteger('academies_id')->unsigned();
            $table->timestamps();

            $table->foreign('technologies_id')->references('id')->on('technologies');
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
        Schema::dropIfExists('technology_academies');
    }
}
