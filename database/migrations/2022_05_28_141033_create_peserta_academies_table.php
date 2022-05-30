<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academy_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('bukti_transfer')->nullable();
            $table->enum('status', ['waiting', 'approved', 'rejected']);
            $table->timestamps();

            $table->foreign('academy_id')->references('id')->on('academies');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta_academies');
    }
}
