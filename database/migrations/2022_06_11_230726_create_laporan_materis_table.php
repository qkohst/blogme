<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('materi_silabus_id')->unsigned();
            $table->enum('tipe', [1, 2]);
            $table->longText('deskripsi');
            $table->enum('status', [1, 0]);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('materi_silabus_id')->references('id')->on('materi_silabuses')->onDelete('cascade');
        });

        // Tipe 
        // 1 = Teknis
        // 2 = Perbaikan Konten

        // Status 
        // 1 = Telah dibaca
        // 0 = Belum Dibaca
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_materis');
    }
}
