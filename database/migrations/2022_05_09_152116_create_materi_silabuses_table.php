<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriSilabusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi_silabuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('silabus_academies_id')->unsigned();
            $table->enum('tipe_materi', [1, 2, 3, 4]);
            $table->enum('tipe_pembaca', ['Semua Orang', 'Member']);
            $table->bigInteger('nomor_urut');
            $table->string('judul_materi', 100);
            $table->timestamps();
            
            $table->foreign('silabus_academies_id')->references('id')->on('silabus_academies')->onDelete('cascade');

            // Tipe Materi 
            // 1 = Artikel 
            // 2 = Vidio 
            // 3 = Kuis 
            // 4 = Submission
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi_silabuses');
    }
}
