<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 50);
            $table->string('email', 50);
            $table->string('posisi', 50);
            $table->date('mulai_bekerja');
            $table->string('deskripsi');
            $table->string('foto_profil');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
