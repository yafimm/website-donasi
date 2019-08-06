<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis_donasi')->unsigned();
            $table->integer('id_pengirim')->unsigned();
            $table->integer('id_penerima')->unsigned();
            $table->string('bukti_pengiriman');
            $table->enum('status', ['Selesai', 'Belum Selesai']);
            $table->string('gambar');
            $table->string('deskripsi');
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
        Schema::dropIfExists('donasi');
    }
}
