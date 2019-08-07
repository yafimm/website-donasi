<?php

use Illuminate\Database\Seeder;

use App\jenisDonasi;

class JenisDonasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_donasi = new jenisDonasi;
        $jenis_donasi->nama = 'Donasi';
        $jenis_donasi->save();

        $jenis_donasi = new jenisDonasi;
        $jenis_donasi->nama = 'Zakat Fitra';
        $jenis_donasi->save();

        $jenis_donasi = new jenisDonasi;
        $jenis_donasi->nama = 'Zakat Mal';
        $jenis_donasi->save();

    }
}
