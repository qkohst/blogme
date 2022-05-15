<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKuisMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuis_materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_silabuses_id')->unsigned();
            $table->longText('soal');
            $table->longText('jawaban_a');
            $table->longText('jawaban_b');
            $table->longText('jawaban_c');
            $table->longText('jawaban_d');
            $table->enum('kunci_jawaban', ['A', 'B', 'C', 'D']);
            $table->bigInteger('poin');
            $table->timestamps();
            
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
        Schema::dropIfExists('kuis_materis');
    }
}
