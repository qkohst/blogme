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
            $table->unsignedBigInteger('technology_id')->unsigned();
            $table->unsignedBigInteger('academy_id')->unsigned();
            $table->timestamps();

            $table->foreign('technology_id')->references('id')->on('technologies');
            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade');
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
