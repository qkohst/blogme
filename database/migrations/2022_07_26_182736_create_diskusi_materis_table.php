<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiskusiMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskusi_materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('materi_silabus_id')->unsigned();
            $table->string('pertanyaan');
            $table->longText('uraian_pertanyaan');
            $table->enum('status', [1, 0]);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('materi_silabus_id')->references('id')->on('materi_silabuses')->onDelete('cascade');
        });

        // Status 
        // 1 = Belum Selesai
        // 0 = Selesai
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diskusi_materis');
    }
}
