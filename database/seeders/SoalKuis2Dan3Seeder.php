<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Soal;
use App\Models\Jawaban;

class SoalKuis2Dan3Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // KUIS 2 - Komponen Sistem Pertahanan Tubuh
        $this->createKuis2();
        
        // KUIS 3 - Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh
        $this->createKuis3();
    }

    private function createKuis2()
    {
        $soalKuis2 = [
            [
                'pertanyaan' => 'Sel darah putih yang berperan dalam sistem pertahanan tubuh terutama dibentuk di ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'sumsum tulang', 'is_benar' => true],
                    ['pilihan' => 'B', 'teks_jawaban' => 'hati', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'limpa', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'ginjal', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'paru-paru', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sel epitel merupakan garis pertahanan pertama tubuh dan banyak ditemukan di ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'sumsum tulang', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'kulit, saluran pencernaan, dan paru-paru', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'darah dan cairan limfa', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'hati dan ginjal', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'otak dan sumsum tulang belakang', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Proses fagositosis dilakukan oleh neutrofil dengan cara ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'menghasilkan antibodi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'melepaskan histamin', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'membentuk fagosom dan menghancurkan patogen', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'mengaktifkan sistem komplemen', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'menghasilkan sel memori', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Makrofag berperan sebagai sel penyaji antigen (APCs) dengan cara ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'menghancurkan patogen sepenuhnya', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'menghasilkan antibodi spesifik', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'mengaktifkan sel t pembunuh secara langsung', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'memecah patogen menjadi partikel kecil dan menampilkannya di permukaan sel', 'is_benar' => true],
                    ['pilihan' => 'E', 'teks_jawaban' => 'melepaskan histamin untuk memicu peradangan', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Proses fagositosis dilakukan oleh neutrofil dengan cara ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'menghasilkan antibodi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'melepaskan histamin', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'membentuk fagosom dan menghancurkan patogen', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'mengaktifkan sistem komplemen', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'menghasilkan sel memori', 'is_benar' => true],
                ]
            ],
        ];

        foreach ($soalKuis2 as $dataSoal) {
            $soal = Soal::create([
                'pertanyaan' => $dataSoal['pertanyaan'],
                'kuis_type' => $dataSoal['kuis_type'],
            ]);

            foreach ($dataSoal['jawaban'] as $dataJawaban) {
                Jawaban::create([
                    'soal_id' => $soal->id,
                    'pilihan' => $dataJawaban['pilihan'],
                    'teks_jawaban' => $dataJawaban['teks_jawaban'],
                    'is_benar' => $dataJawaban['is_benar'],
                ]);
            }
        }
    }

    private function createKuis3()
    {
        $soalKuis3 = [
            [
                'pertanyaan' => 'Kekebalan aktif adalah kekebalan yang dihasilkan oleh ....',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'antibodi dari luar tubuh', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'tubuh itu sendiri', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'pemberian serum', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'plasenta ibu', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'kolostrum', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Kekebalan pasif alami dapat diperoleh melalui ....',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'vaksinasi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'pemberian serum', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'plasenta ibu', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'infeksi penyakit', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'imunisasi', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Kekebalan aktif buatan dapat diperoleh melalui ....',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'pemberian kolostrum', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'pemberian serum antibisa ular', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'plasenta ibu', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'vaksinasi', 'is_benar' => true],
                    ['pilihan' => 'E', 'teks_jawaban' => 'infeksi alami', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Alergi terjadi karena respons imun yang berlebihan terhadap ....',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'virus', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'bakteri', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'sel kanker', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'alergen', 'is_benar' => true],
                    ['pilihan' => 'E', 'teks_jawaban' => 'sel tubuh sendiri', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika seseorang mengalami alergi, gejala seperti bersin dan gatal-gatal terjadi karena ....',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'produksi antibodi IgE', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'serangan sel T pembunuh', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'aktivasi sistem komplemen', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'infeksi virus', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'pelepasan histamin oleh mastosit', 'is_benar' => true],
                ]
            ],
        ];

        foreach ($soalKuis3 as $dataSoal) {
            $soal = Soal::create([
                'pertanyaan' => $dataSoal['pertanyaan'],
                'kuis_type' => $dataSoal['kuis_type'],
            ]);

            foreach ($dataSoal['jawaban'] as $dataJawaban) {
                Jawaban::create([
                    'soal_id' => $soal->id,
                    'pilihan' => $dataJawaban['pilihan'],
                    'teks_jawaban' => $dataJawaban['teks_jawaban'],
                    'is_benar' => $dataJawaban['is_benar'],
                ]);
            }
        }
    }
}