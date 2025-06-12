<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PengaturanKKM;

class PengaturanKKMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kkmData = [
            [
                'nama_kuis' => 'kuis1',
                'judul_kuis' => 'Mekanisme Sistem Pertahanan Tubuh',
                'nilai_kkm' => 75.00,
                'is_active' => true,
                'deskripsi' => 'Kuis tentang mekanisme sistem pertahanan tubuh manusia'
            ],
            [
                'nama_kuis' => 'kuis2',
                'judul_kuis' => 'Komponen Sistem Pertahanan Tubuh',
                'nilai_kkm' => 72.00,
                'is_active' => true,
                'deskripsi' => 'Kuis tentang komponen-komponen sistem pertahanan tubuh'
            ],
            [
                'nama_kuis' => 'kuis3',
                'judul_kuis' => 'Jenis-jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh',
                'nilai_kkm' => 70.00,
                'is_active' => true,
                'deskripsi' => 'Kuis tentang jenis kekebalan dan gangguan sistem pertahanan tubuh'
            ],
            [
                'nama_kuis' => 'evaluasi',
                'judul_kuis' => 'Evaluasi Akhir',
                'nilai_kkm' => 78.00,
                'is_active' => true,
                'deskripsi' => 'Evaluasi akhir untuk semua materi sistem pertahanan tubuh'
            ]
        ];

        foreach ($kkmData as $data) {
            PengaturanKKM::updateOrCreate(
                ['nama_kuis' => $data['nama_kuis']],
                $data
            );
        }
    }
}