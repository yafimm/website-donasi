<?php

use Illuminate\Database\Seeder;
use App\Donasi;

class DonasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $donasi = new Donasi;
          $donasi->id_jenis_donasi = 1; // sumbangan
          $donasi->id_pengirim = 1;
          $donasi->id_penerima = 3; //pantiasuhangunadarma
          $donasi->bukti_pengiriman = 'masih beta';
          $donasi->status = 'Selesai';
          $donasi->gambar = 'Masih beta';
          $donasi->deskripsi = '1kg beras, Uang 2 juta rupiah';
          $donasi->save();

          $donasi = new Donasi;
          $donasi->id_jenis_donasi = 2; // sumbangan
          $donasi->id_pengirim = 1;
          $donasi->id_penerima = 2; //Zakat mal
          $donasi->bukti_pengiriman = 'masih beta';
          $donasi->status = 'Selesai';
          $donasi->gambar = 'Masih beta';
          $donasi->deskripsi = 'Uang 2 juta rupiah';
          $donasi->save();

          $donasi = new Donasi;
          $donasi->id_jenis_donasi = 1; // sumbangan
          $donasi->id_pengirim = 1;
          $donasi->id_penerima = null; //pantiasuhangunadarma
          $donasi->bukti_pengiriman = 'masih beta';
          $donasi->status = 'Belum Selesai';
          $donasi->gambar = 'Masih beta';
          $donasi->deskripsi = 'Uang 500 rb rupiah';
          $donasi->save();

          $donasi = new Donasi;
          $donasi->id_jenis_donasi = 1; // sumbangan
          $donasi->id_pengirim = 1;
          $donasi->id_penerima = 5; //pantiasuhangunadarma
          $donasi->bukti_pengiriman = 'masih beta';
          $donasi->status = 'Belum Selesai';
          $donasi->gambar = 'Masih beta';
          $donasi->deskripsi = '1kg beras kucing, Uang 1 juta rupiah';
          $donasi->save();

          $donasi = new Donasi;
          $donasi->id_jenis_donasi = 1; // sumbangan
          $donasi->id_pengirim = 1;
          $donasi->id_penerima = 6; //pantiasuhangunadarma
          $donasi->bukti_pengiriman = 'masih beta';
          $donasi->status = 'Selesai';
          $donasi->gambar = 'Masih beta';
          $donasi->deskripsi = 'Uang 6 juta rupiah';
          $donasi->save();

          $donasi = new Donasi;
          $donasi->id_jenis_donasi = 3; // zakat satunya lagi
          $donasi->id_pengirim = 1;
          $donasi->id_penerima = null; //pantiasuhangunadarma
          $donasi->bukti_pengiriman = 'masih beta';
          $donasi->status = 'Belum Selesai';
          $donasi->gambar = 'Masih beta';
          $donasi->deskripsi = '1kg beras, Uang 2 juta rupiah';
          $donasi->save();
    }
}
