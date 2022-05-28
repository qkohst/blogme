<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatBelajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_belajars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->unsigned();
            $table->unsignedBigInteger('materi_silabuses_id')->unsigned();
            $table->enum('status', ['on progress', 'complete']);
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('materi_silabuses_id')->references('id')->on('materi_silabuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_belajars');
    }
}
