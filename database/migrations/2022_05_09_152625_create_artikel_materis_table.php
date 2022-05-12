<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtikelMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_silabuses_id')->unsigned();
            $table->longText('isi_materi');
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
        Schema::dropIfExists('artikel_materis');
    }
}
