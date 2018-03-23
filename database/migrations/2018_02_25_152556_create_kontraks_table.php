<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontraksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontraks', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nomor_kontrak');
          $table->string('nama_pekerjaan');
          $table->string('nama_pelaksana');
          $table->double('nilai_kerja');
          $table->string('tipe'); //pilihan rutin/non
          $table->integer('tahap_bayar');
          $table->date('tgl_kontrak');
          $table->date('tgl_mulai');
          $table->date('tgl_selesai');
          $table->unsignedInteger('admin_id')->nullable();
          $table->unsignedInteger('user_id')->nullable();
          $table->timestamps();//tampilkan

          $table->foreign('admin_id')->references('id')->on('admins');
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontraks');
    }
}
