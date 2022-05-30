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
            $table->unsignedBigInteger('silabus_academy_id')->unsigned();
            $table->enum('tipe_materi', [1, 2, 3, 4]);
            $table->enum('tipe_pembaca', ['Semua Orang', 'Member']);
            $table->string('judul_materi', 100);
            $table->timestamps();
            
            $table->foreign('silabus_academy_id')->references('id')->on('silabus_academies')->onDelete('cascade');

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
