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
                'pertanyaan' => 'Jika seseorang terinfeksi virus, sel T pembunuh akan merespons dengan cara ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'menghasilkan antibodi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'menghancurkan sel yang terinfeksi virus', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'melepaskan histamin', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'mengaktifkan sistem komplemen', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'membentuk fagosom', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sel Natural Killer (NK) termasuk dalam kelompok ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'sel darah merah', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'sel epitel', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'limfosit', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'sel mast', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'sel komplemen', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sel eosinofil berperan dalam melindungi tubuh dari ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'virus', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'bakteri', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'parasit besar seperti cacing tambang', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'sel kanker', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'sel tubuh yang rusak', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika terjadi reaksi alergi, sel mast akan melepaskan ....
',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Antibodi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'histamin', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'enzim lisozim', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'protein komplemen', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'sel T pembunuh', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sistem komplemen terdiri dari sekelompok protein yang berperan dalam ....',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'menghasilkan sel darah merah', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'menghancurkan antigen asing', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'menghasilkan sel epitel', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'mengaktifkan sel mast', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'menghasilkan histamin', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika sistem komplemen diaktifkan, reaksi berantai yang terjadi dapat menyebabkan ....
',
                'kuis_type' => 'kuis2',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'pembentukan sel darah merah', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'kerusakan membran sel antigen', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'produksi histamin', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'pembentukan sel epitel', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'aktivasi sel mast', 'is_benar' => false],
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
                'pertanyaan' => 'Kekebalan alami adalah kekebalan yang dihasilkan oleh ....',
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
            [
                'pertanyaan' => 'Autoimunitas adalah gangguan sistem pertahanan tubuh di mana antibodi menyerang ....
',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'virus', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'bakteri', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'sel tubuh sendiri', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'alergen', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'sel kanker', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'HIV menyerang sel T pembantu karena sel tersebut memiliki ....
',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'reseptor CD4', 'is_benar' => true],
                    ['pilihan' => 'B', 'teks_jawaban' => 'antibodi IgE', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'histamin', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'sel mast', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'protein komplemen', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika seseorang terinfeksi HIV, sistem kekebalan tubuh akan melemah karena ....
',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'sel B plasma tidak dapat menghasilkan antibodi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'sel mast melepaskan histamin', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'sistem komplemen tidak aktif', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'sel NK menyerang sel tubuh sendiri', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'sel T pembantu dihancurkan oleh virus', 'is_benar' => true],
                ]
            ],
            [
                'pertanyaan' => 'Kekebalan pasif buatan dapat diperoleh melalui ....
',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'vaksinasi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'infeksi alami', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'plasenta ibu', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'pemberian serum', 'is_benar' => true],
                    ['pilihan' => 'E', 'teks_jawaban' => 'kolostrum', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika seseorang terkena penyakit autoimun seperti lupus, sistem kekebalan tubuh akan ....
',
                'kuis_type' => 'kuis3',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'menyerang sel tubuh sendiri', 'is_benar' => true],
                    ['pilihan' => 'B', 'teks_jawaban' => 'menghasilkan antibodi ige', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'melepaskan histamin', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'menghancurkan virus hiv', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'mengaktifkan sistem komplemen', 'is_benar' => false],
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