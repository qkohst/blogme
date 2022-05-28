<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategories_id')->unsigned();
            $table->string('nama_kelas', 100);
            $table->string('gambar');
            $table->enum('level', ['Dasar', 'Pemula', 'Menengah', 'Mahir', 'Profesional']);
            $table->longText('deskripsi');
            $table->string('minimum_ram', 100);
            $table->string('minimum_layar', 100);
            $table->string('minimum_sistem_operasi', 100);
            $table->string('minimum_processor', 100);
            $table->enum('status', ['on', 'off']);
            $table->enum('jenis_kelas', ['Gratis', 'Berbayar']);
            $table->bigInteger('biaya')->nullable();
            $table->timestamps();

            $table->foreign('kategories_id')->references('id')->on('kategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academies');
    }
}
