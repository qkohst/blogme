<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionMaterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submission_materis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('materi_silabus_id')->unsigned();
            $table->longText('isi_materi');
            $table->timestamps();
            
            $table->foreign('materi_silabus_id')->references('id')->on('materi_silabuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submission_materis');
    }
}
