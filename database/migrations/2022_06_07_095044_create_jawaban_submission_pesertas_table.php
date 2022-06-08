<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabanSubmissionPesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_submission_pesertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_academy_id')->unsigned();
            $table->unsignedBigInteger('submission_materi_id')->unsigned();
            $table->string('link_jawaban');
            $table->longText('deskripsi')->nullable();
            $table->enum('status', ['waiting', 'approved', 'rejected']);
            $table->longText('catatan_verifikasi')->nullable();
            $table->bigInteger('poin')->nullable();
            $table->timestamps();

            $table->foreign('peserta_academy_id')->references('id')->on('peserta_academies')->onDelete('cascade');
            $table->foreign('submission_materi_id')->references('id')->on('submission_materis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban_submission_pesertas');
    }
}
