<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kuis1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //public function run()
    {
        // Soal 1
        $soal1 = DB::table('soal')->insertGetId([
            'pertanyaan' => 'Antigen adalah partikel unik dari patogen yang dapat memicu respons imun. Antigen dapat berupa protein, glikoprotein, lipid, atau zat lain yang dihasilkan oleh patogen. Antigen berfungsi untuk ....',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            [
                'soal_id' => $soal1,
                'pilihan' => 'A',
                'teks_jawaban' => 'memicu respons imun',
                'is_benar' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal1,
                'pilihan' => 'B',
                'teks_jawaban' => 'menghasilkan sel darah putih',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal1,
                'pilihan' => 'C',
                'teks_jawaban' => 'menghancurkan sel kanker',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal1,
                'pilihan' => 'D',
                'teks_jawaban' => "menyaring partikel asing",
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal1,
                'pilihan' => 'E',
                'teks_jawaban' => 'menghasilkan histamin',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);

        // Soal 2
        $soal2 = DB::table('soal')->insertGetId([
            'pertanyaan' => 'Salah satu contoh pertahanan nonspesifik adalah ....',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            [
                'soal_id' => $soal2,
                'pilihan' => 'A',
                'teks_jawaban' => 'antibodi',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal2,
                'pilihan' => 'B',
                'teks_jawaban' => 'sel t pembunuh',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal2,
                'pilihan' => 'C',
                'teks_jawaban' => 'kulit',
                'is_benar' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal2,
                'pilihan' => 'D',
                'teks_jawaban' => 'sel b plasma',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal2,
                'pilihan' => 'E',
                'teks_jawaban' => 'limfosit',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);

        // Soal 1
        $soal3 = DB::table('soal')->insertGetId([
            'pertanyaan' => 'Sistem pertahanan nonspesifik disebut sebagai pertahanan pertama tubuh karena ...',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            [
                'soal_id' => $soal3,
                'pilihan' => 'A',
                'teks_jawaban' => 'melibatkan pembentukan antibodi',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal3,
                'pilihan' => 'B',
                'teks_jawaban' => 'bekerja secara spesifik terhadap patogen tertentu',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal3,
                'pilihan' => 'C',
                'teks_jawaban' => 'melibatkan sel t dan sel b',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal3,
                'pilihan' => 'D',
                'teks_jawaban' => 'melindungi tubuh dari semua jenis patogen tanpa memerlukan identifikasi spesifik',
                'is_benar' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal3,
                'pilihan' => 'E',
                'teks_jawaban' => 'hanya aktif setelah patogen masuk ke dalam tubuh',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);

        // Soal 4
        $soal4 = DB::table('soal')->insertGetId([
            'pertanyaan' => 'Sel T sitotoksik menghancurkan sel yang terinfeksi dengan cara ....',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            [
                'soal_id' => $soal4,
                'pilihan' => 'A',
                'teks_jawaban' => 'menghasilkan antibodi yang menetralisir patogen',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal4,
                'pilihan' => 'B',
                'teks_jawaban' => 'melepaskan protein perforin yang membentuk lubang pada membran sel terinfeksi',
                'is_benar' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal4,
                'pilihan' => 'C',
                'teks_jawaban' => 'memakan patogen melalui proses fagositosis',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal4,
                'pilihan' => 'D',
                'teks_jawaban' => 'menghasilkan histamin yang menyebabkan peradangan',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal4,
                'pilihan' => 'E',
                'teks_jawaban' => 'mengikat antigen dan mengaktifkan sistem komplemen',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);

        // Soal 5
        $soal5 = DB::table('soal')->insertGetId([
            'pertanyaan' => 'Seorang pasien mengalami peradangan pada luka di kulitnya. Mekanisme inflamasi terjadi karena ....',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('jawaban')->insert([
            [
                'soal_id' => $soal5,
                'pilihan' => 'A',
                'teks_jawaban' => 'sel B plasma menghasilkan antibodi untuk melawan patogen',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'soal_id' => $soal5,
                'pilihan' => 'B',
                'teks_jawaban' => 'sel T pembantu mengaktifkan makrofag untuk melakukan fagositosis',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal5,
                'pilihan' => 'C',
                'teks_jawaban' => 'antibodi mengikat antigen dan mengaktifkan sistem komplemen',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal5,
                'pilihan' => 'D',
                'teks_jawaban' => 'sel T supresor menghentikan respons imun setelah infeksi selesai',
                'is_benar' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],[
                'soal_id' => $soal5,
                'pilihan' => 'E',
                'teks_jawaban' => 'mastosit mengeluarkan histamin yang menyebabkan pelebaran pembuluh darah dan peningkatan permeabilitas',
                'is_benar' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            
        ]);
    }
    }
}
