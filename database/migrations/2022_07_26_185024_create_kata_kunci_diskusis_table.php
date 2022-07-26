<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKataKunciDiskusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kata_kunci_diskusis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diskusi_materi_id')->unsigned();
            $table->unsignedBigInteger('kata_kunci_id')->unsigned();
            $table->timestamps();

            $table->foreign('diskusi_materi_id')->references('id')->on('diskusi_materis')->onDelete('cascade');
            $table->foreign('kata_kunci_id')->references('id')->on('kata_kuncis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kata_kunci_diskusis');
    }
}
