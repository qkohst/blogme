<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanKuisPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_kuis_pesertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_academy_id')->unsigned();
            $table->unsignedBigInteger('kuis_materi_id')->unsigned();
            $table->enum('jawaban', ['A', 'B', 'C', 'D']);
            $table->bigInteger('poin');
            $table->timestamps();
            
            $table->foreign('peserta_academy_id')->references('id')->on('peserta_academies')->onDelete('cascade');
            $table->foreign('kuis_materi_id')->references('id')->on('kuis_materis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_kuis_pesertas');
    }
}
