<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Soal;
use App\Models\Jawaban;

class SoalEvaluasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $soalEvaluasi = [
            [
                'pertanyaan' => 'Protein komplemen berperan penting dalam sistem pertahanan tubuh. Senyawa ini membunuh bakteri penginfeksi dengan cara . . . .',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'menimbulkan respons peradangan (inflamasi)', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'merangsang limfosit untuk membentuk antibodi', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'membentuk lubang pada membran plasma bakteri', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'menonaktifkan antigen pada permukaan sel bakteri', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'memberikan sinyal pada makrofag untuk memfagosit bakteri', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Perhatikan pernyataan-pernyataan berikut! 
1) Respons kekebalan humoral melibatkan peran sel B pengingat. 
2) Respons kekebalan humoral melibatkan makrofag untuk melawan antigen. 
3) Respons kekebalan seluler menghancurkan antigen dengan melibatkan makrofag. 
4) Respons kekebalan seluler menyerang antigen dengan membentuk antibodi. 
Pernyataan yang tepat mengenai sistem kekebalan tubuh ditunjukkan oleh nomor . . . .',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => '1) dan 2)', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => '1) dan 3)', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => '2) dan 3)', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => '2) dan 4)', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => '3) dan 4)', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Ketika ada patogen dari jenis yang sama menyerang tubuh, sel B pengingat akan menstimulasi sel B pembelah untuk membentuk sel B plasma. Selanjutnya, sel B plasma akan membentuk antibodi untuk melawan patogen tersebut. Peristiwa tersebut menunjukkan mekanisme . . . .',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'respons imun primer', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'respons imun seluler', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'respons imun sekunder', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'respons pertahanan spesifik', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'respons pertahanan nonspesifik', 'is_benar' => false],
                ]
            ],
            // Tambahkan 7 soal berikutnya sesuai kebutuhan
            [
                'pertanyaan' => 'Perhatikan pernyataan-pernyataan berikut! 
1) Enzim lisozim diproduksi untuk menghidrolisis dinding sel bakteri. 
2) Partikel berbahaya diperangkap dalam lendir. 
3) Mastosit mengeluarkan histamin dan prostaglandin. 
4) Sel-sel fagosit memakan patogen. 
5) Interferon mencegah virus bereplikasi. 
Pernyataan yang berhubungan dengan reaksi inflamasi ditunjukkan oleh nomor . . . .',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => '1) dan 2)', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => '1) dan 3)', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => '2) dan 3)', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => '3) dan 4)', 'is_benar' => true],
                    ['pilihan' => 'E', 'teks_jawaban' => '4) dan 5)', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Alergi merupakan respons imun yang berlebihan terhadap senyawa yang masuk ke tubuh. Untuk menghentikan gejala alergi dapat dilakukan dengan pemberian . . . .',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'antihistamin', 'is_benar' => true],
                    ['pilihan' => 'B', 'teks_jawaban' => 'antibiotik', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'vaksin', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'interferon', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'komplemen', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Lupus merupakan penyakit autoimunitas yang terjadi akibat . . . .',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'antibodi menyerang otot lurik', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'serangan virus terhadap sel T', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'antibodi menyerang kelenjar adrenal', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'antibodi menyerang sel-sel penyusun sendi', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'antibodi menyerang berbagai jaringan tubuh sendiri', 'is_benar' => true],
                ]
            ],
            [
                'pertanyaan' => 'Tubuh memproduksi berbagai jenis antibodi karena . . . .',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'antibodi tidak dapat bekerja untuk kedua kalinya', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'antigen pada setiap patogen bersifat spesifik', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'beberapa antibodi ditujukan untuk satu jenis antigen', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'satu jenis antigen dapat mengalahkan beberapa antibodi', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'setelah melawan antigen, antibodi langsung dikeluarkan oleh tubuh', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Perbedaan utama antara kekebalan humoral dan kekebalan seluler adalah ....',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'kekebalan humoral melibatkan sel T, sedangkan kekebalan seluler melibatkan sel B', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'kekebalan humoral menghasilkan antibodi, sedangkan kekebalan seluler menghancurkan sel yang terinfeksi', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'kekebalan humoral hanya melindungi dari bakteri, sedangkan kekebalan seluler melindungi dari virus', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'kekebalan humoral bersifat nonspesifik, sedangkan kekebalan seluler bersifat spesifik', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'kekebalan humoral melibatkan sel darah merah, sedangkan kekebalan seluler melibatkan sel darah putih', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika seseorang divaksinasi, mekanisme kekebalan yang terjadi adalah ....',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'sistem pertahanan nonspesifik langsung menghancurkan patogen', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'sel B pengingat mengingat antigen dan memicu respons imun lebih cepat jika terpapar patogen yang sama di masa depan', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'sel T supresor menghentikan respons imun setelah vaksinasi', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'asam lambung membunuh patogen yang masuk melalui makanan', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'lisozim dalam air liur menghancurkan dinding sel patogen', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Salah satu contoh pertahanan kimiawi pada sistem pertahanan nonspesifik adalah ....',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'rambut hidung', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'lisozim dalam air mata', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'sel B pembunuh', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'antibodi', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'sel B plasma', 'is_benar' => false],
                ]
            ],
        ];

        foreach ($soalEvaluasi as $dataSoal) {
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

        $this->command->info('Seeder Soal Evaluasi berhasil ditambahkan!');
    }
}