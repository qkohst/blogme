<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatPesertaAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikat_peserta_academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_academy_id')->unsigned();
            $table->enum('status', ['waiting', 'approved', 'rejected']);
            $table->string('file_sertifikat')->nullable();
            $table->string('catatan_verifikasi')->nullable();

            $table->timestamps();
            $table->foreign('peserta_academy_id')->references('id')->on('peserta_academies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sertifikat_peserta_academies');
    }
}
