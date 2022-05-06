<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tools_id')->unsigned();
            $table->unsignedBigInteger('academies_id')->unsigned();
            $table->timestamps();

            $table->foreign('tools_id')->references('id')->on('tools');
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
        Schema::dropIfExists('tools_academies');
    }
}
