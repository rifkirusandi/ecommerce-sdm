<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('id_pegawai');
          $table->foreign('id_pegawai')->references('id')->on('pegawais');
          $table->integer('jam_masuk');
          $table->integer('jam_keluar');
          $table->integer('jam_lembur');
          $table->string('keterangan');
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
        Schema::dropIfExists('absensi');
    }
}
