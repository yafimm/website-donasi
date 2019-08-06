<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisDonasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_donasi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
        });

        Schema::table('donasi', function (Blueprint $table){
          $table->foreign('id_jenis_donasi')
             ->references('id')
             ->on('jenis_donasi')
             ->onDelete('cascade')
             ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donasi', function(Blueprint $table){
          $table->dropForeign('donasi_id_jenis_donasi_foreign');
        });
        Schema::dropIfExists('jenis_donasi');
    }
}
