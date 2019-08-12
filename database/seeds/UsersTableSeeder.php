<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $user = new User;
          $user->id_role = 1;
          $user->username = 'userpengguna';
          $user->password = bcrypt('userpengguna');
          $user->nama = 'Dadang Dangdut';
          $user->email = 'dadang@gmail.com';
          $user->gender = 'Pria';
          $user->no_telp = '0813212323';
          $user->save();

          $user = new User;
          $user->id_role = 4;
          $user->username = 'superadmin';
          $user->password = bcrypt('superadmin');
          $user->nama = 'superadmin';
          $user->email = 'superadmin@gmail.com';
          $user->gender = 'Pria';
          $user->no_telp = '0891823123';
          $user->save();

          $user = new User;
          $user->id_role = 2;
          $user->username = 'pantiasuhangunadarma';
          $user->password = bcrypt('pantiasuhangunadarma');
          $user->nama = 'Panti Asuhan Guna Darma';
          $user->email = 'pantiasuhan@gmail.com';
          $user->gender = 'Wanita';
          $user->no_telp = '0813232323';
          $user->no_rekening = '0uiasd8213';
          $user->foto = 'pantiasuhan.jpg';
          $user->deskripsi = 'Sebuah panti asuhan yang berletak di kota bandung, selain itu selain itu dan ada lagi sebuah itu';
          $user->save();

          $user = new User;
          $user->id_role = 2;
          $user->username = 'kucing222';
          $user->password = bcrypt('kucing222');
          $user->nama = 'Klinik Kucing Sejahtera';
          $user->email = 'klinikkucing@gmail.com';
          $user->gender = 'Pria';
          $user->no_telp = '0813212322';
          $user->no_rekening = '0ui342d8213';
          $user->deskripsi = 'Sebuah klinik kucing tanpa bayaran untuk membantu kucing yang terlantar yang berletak di kota bandung, selain itu selain itu dan ada lagi sebuah itu';
          $user->foto = 'klinikkucing.jpg';
          $user->save();

          $user = new User;
          $user->id_role = 2;
          $user->username = 'nanisemprani';
          $user->password = bcrypt('nanisemprani');
          $user->nama = 'Nanskuy Living';
          $user->email = 'nande@gmail.com';
          $user->gender = 'Wanita';
          $user->no_telp = '0813252323';
          $user->no_rekening = '0ui342d8213';
          $user->foto = 'rumahmakan.jpg';
          $user->deskripsi = 'Rumah makan yang membantu orang orang kerja dalam sebuah ada yang ada didalam itu tersebut yang bisa apa gitu';
          $user->save();

          $user = new User;
          $user->id_role = 1;
          $user->username = 'adamilham';
          $user->password = bcrypt('adamilham');
          $user->nama = 'Adam Ilham';
          $user->email = 'adam@gmail.com';
          $user->gender = 'Pria';
          $user->no_telp = '0313212323';
          $user->save();

          $user = new User;
          $user->id_role = 3;
          $user->username = 'kulikaryawan';
          $user->password = bcrypt('kulikaryawan');
          $user->nama = 'Daduk Telkom';
          $user->email = 'daduk@gmail.com';
          $user->gender = 'Pria';
          $user->no_telp = '0813212323';
          $user->save();
    }
}
