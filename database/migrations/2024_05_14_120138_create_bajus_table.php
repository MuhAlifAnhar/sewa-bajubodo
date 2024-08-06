<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baju', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('deskripsi');
            $table->integer('harga');
            $table->string('image');
            $table->unsignedBigInteger('id_toko');
            $table->foreign('id_toko')->references('id')->on('toko');
            $table->unsignedBigInteger('nama_keterangan')->nullable();
            $table->foreign('nama_keterangan')->references('id')->on('keterangan');
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('users');
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
        Schema::dropIfExists('baju');
    }
}
