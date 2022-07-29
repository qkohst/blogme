<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalasDiskusiMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balas_diskusi_materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('diskusi_materi_id')->unsigned();
            $table->longText('komentar');
            $table->enum('status', [0, 1]);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('diskusi_materi_id')->references('id')->on('diskusi_materis')->onDelete('cascade');
        });

        // Status 
        // 0 = Tidak Pilih
        // 1 = Jawaban Terpilih
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('balas_diskusi_materis');
    }
}
