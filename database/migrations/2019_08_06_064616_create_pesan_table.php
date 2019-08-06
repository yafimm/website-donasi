<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesan', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['Selesai', 'Belum Selesai']);
            $table->timestamps();
        });

        Schema::table('detail_pesan', function (Blueprint $table){
             $table->foreign('id_pesan')
                ->references('id')
                ->on('detail_pesan')
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
        Schema::table('detail_pesan', function(Blueprint $table){
         $table->dropForeign('detail_pesan_id_pesan_foreign');
        });

        Schema::dropIfExists('pesan');
    }
}
