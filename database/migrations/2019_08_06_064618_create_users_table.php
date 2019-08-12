<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_role')->unsigned();
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->string('nama', 30);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['Pria', 'Wanita']);
            $table->string('no_telp', 12)->nullable();
            $table->string('no_rekening', 20)->nullable();
            $table->string('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('donasi', function (Blueprint $table){
           $table->foreign('id_penerima')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');
         });

       Schema::table('donasi', function (Blueprint $table){
         $table->foreign('id_pengirim')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });

        Schema::table('detail_pesan', function (Blueprint $table){
         $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
       });

       Schema::table('kehadiran', function (Blueprint $table){
        $table->foreign('id_pegawai')
           ->references('id')
           ->on('users')
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
          $table->dropForeign('donasi_id_penerima_foreign');
        });

        Schema::table('donasi', function(Blueprint $table){
          $table->dropForeign('donasi_id_pengirim_foreign');
        });

        Schema::table('detail_pesan', function(Blueprint $table){
          $table->dropForeign('detail_pesan_id_user_foreign');
        });

        Schema::table('kehadiran', function(Blueprint $table){
          $table->dropForeign('kehadiran_id_pegawai_foreign');
        });

        Schema::dropIfExists('users');
    }
}
