<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::updateOrCreate([
            'name' => 'Adinda Syifa Rahmah',
            'nisn' => '0045892136',
            'password' => '0045892136',
            'password_plain' => '0045892136',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        
        User::create([
            'name' => 'Afra Khazni',
            'nisn' => '0076523489',
            'password' => '0076523489',
            'password_plain' => '0076523489',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        User::create([
            'name' => 'Ahmad dani saputra',
            'nisn' => '0034567821',
            'password' => '0034567821',
            'password_plain' => '0034567821',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        User::create([
            'name' => 'Ainu Syifa',
            'nisn' => '0081239765',
            'password' => '0081239765',
            'password_plain' => '0081239765',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Alya Laili ramadhania',
            'nisn' => '0023456789',
            'password' => '0023456789',
            'password_plain' => '0023456789',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Azzaidin Fawwaz Harahap',
            'nisn' => '0067891234',
            'password' => '0067891234',
            'password_plain' => '0067891234',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        User::create([
            'name' => 'Erza',
            'nisn' => '0054321678',
            'password' => '0054321678',
            'password_plain' => '0054321678',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        User::create([
            'name' => 'Fadhel Muhammad Asyari',
            'nisn' => '0098765432',
            'password' => '0098765432',
            'password_plain' => '0098765432',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        User::create([
            'name' => 'Farah Dwi Anisahi',
            'nisn' => '0012345678',
            'password' => '0012345678',
            'password_plain' => '0012345678',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Firda Hidayati',
            'nisn' => '0087654321',
            'password' => '0087654321',
            'password_plain' => '0087654321',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Hafiz Muhammad',
            'nisn' => '0024681357',
            'password' => '0024681357',
            'password_plain' => '0024681357',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        User::create([
            'name' => 'Havier Rafa Permana',
            'nisn' => '0073546891',
            'password' => '0073546891',
            'password_plain' => '0073546891',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Laki-Laki',
        ]);
        User::create([
            'name' => 'Izzati Abna Azzahra',
            'nisn' => '0091357246',
            'password' => '0091357246',
            'password_plain' => '0091357246',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'kammelia adiesty',
            'nisn' => '0046825793',
            'password' => '0046825793',
            'password_plain' => '0046825793',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Laili Salsabila',
            'nisn' => '0035792468',
            'password' => '0035792468',
            'password_plain' => '0035792468',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Mahlan Maulana',
            'nisn' => '0068247935',
            'password' => '0068247935',
            'password_plain' => '0068247935',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Marsanda Rahmah',
            'nisn' => '0015793284',
            'password' => '0015793284',
            'password_plain' => '0015793284',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
        User::create([
            'name' => 'Mellsya syuhada',
            'nisn' => '0082469135',
            'password' => '0082469135',
            'password_plain' => '0082469135',
            'kelas' => 'X6',
            'jenis_kelamin' => 'Perempuan',
        ]);
    }
}
