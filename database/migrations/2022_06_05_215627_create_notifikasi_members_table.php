<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasiMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasi_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id')->unsigned()->nullable();
            $table->unsignedBigInteger('to_user_id')->unsigned();
            $table->string('judul');
            $table->string('url');
            $table->enum('status', [1, 0]);
            $table->timestamps();

            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
        });

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
        Schema::dropIfExists('notifikasi_members');
    }
}
