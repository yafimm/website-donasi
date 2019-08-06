<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $akses = new Role;
         $akses->nama_role = 'Donatur';
         $akses->save();

         $akses = new Role;
         $akses->nama_role = 'Yayasan';
         $akses->save();

         $akses = new Role;
         $akses->nama_role = 'Helpdesk';
         $akses->save();

         $akses = new Role;
         $akses->nama_role = 'Admin';
         $akses->save();
    }
}
