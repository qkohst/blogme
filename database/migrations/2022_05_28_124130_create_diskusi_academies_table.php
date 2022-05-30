<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskusiAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskusi_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academy_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->longText('topik_diskusi');
            $table->timestamps();

            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskusi_academies');
    }
}
