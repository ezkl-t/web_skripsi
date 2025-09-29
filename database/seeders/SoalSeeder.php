<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Soal;
use App\Models\Jawaban;

class SoalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data soal tentang Sistem Pertahanan Tubuh
        $dataSoal = [
            [
                'pertanyaan' => 'Antigen adalah partikel unik dari patogen yang dapat memicu respons imun. Antigen dapat berupa protein, glikoprotein, lipid, atau zat lain yang dihasilkan oleh patogen. Antigen berfungsi untuk .....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'menghasilkan sel darah putih', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'memicu respons imun', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'menghancurkan sel kanker', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'menyaring partikel asing', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'menghasilkan histamin', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Salah satu contoh pertahanan nonspesifik adalah ....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'antibodi', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'sel t pembunuh', 'benar' => false],
                    ['pilihan' => 'C', 'teks' => 'kulit', 'benar' => true],
                    ['pilihan' => 'D', 'teks' => 'sel b plasma', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'limfosit', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sistem pertahanan nonspesifik disebut sebagai pertahanan pertama tubuh karena ...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'melibatkan pembentukan antibodi', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'bekerja secara spesifik terhadap patogen tertentu', 'benar' => false],
                    ['pilihan' => 'C', 'teks' => 'melibatkan sel t dan sel b', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'melindungi tubuh dari semua jenis patogen tanpa memerlukan identifikasi spesifik', 'benar' => true],
                    ['pilihan' => 'E', 'teks' => 'hanya aktif setelah patogen masuk ke dalam tubuh', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sel T sitotoksik menghancurkan sel yang terinfeksi dengan cara ....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'menghasilkan antibodi yang menetralisir patogen', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'melepaskan protein perforin yang membentuk lubang pada membran sel terinfeksi', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'memakan patogen melalui proses fagositosis', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'menghasilkan histamin yang menyebabkan peradangan', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'mengikat antigen dan mengaktifkan sistem komplemen', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika seseorang terkena infeksi virus, sistem imun spesifik akan berperan dengan cara ....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'kulit menghalangi masuknya virus ke dalam tubuh', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'sel T pembunuh menyerang sel tubuh yang terinfeksi virus', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'asam lambung membunuh virus yang masuk melalui makanan', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'rambut hidung menyaring partikel virus dari udara', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'lisozim dalam air mata menghancurkan dinding sel virus', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Seorang pasien mengalami peradangan pada luka di kulitnya. Mekanisme inflamasi terjadi karena .... ',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'sel B plasma menghasilkan antibodi untuk melawan patogen', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'sel T pembantu mengaktifkan makrofag untuk melakukan fagositosis', 'benar' => false],
                    ['pilihan' => 'C', 'teks' => 'mastosit mengeluarkan histamin yang menyebabkan pelebaran pembuluh darah dan peningkatan permeabilitas', 'benar' => true],
                    ['pilihan' => 'D', 'teks' => 'antibodi mengikat antigen dan mengaktifkan sistem komplemen', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'sel T supresor menghentikan respons imun setelah infeksi selesai', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Fungsi utama antibodi adalah ....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'menghasilkan sel darah putih', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'mengikat antigen dan menetralisir patogen', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'menghasilkan histamin untuk memicu peradangan', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'menghancurkan sel kanker secara langsung', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'menyaring partikel asing di saluran pernapasan', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Perbedaan utama antara kekebalan humoral dan kekebalan seluler adalah ....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'kekebalan humoral melibatkan sel T, sedangkan kekebalan seluler melibatkan sel B', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'kekebalan humoral menghasilkan antibodi, sedangkan kekebalan seluler menghancurkan sel yang terinfeksi', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'kekebalan humoral hanya melindungi dari bakteri, sedangkan kekebalan seluler melindungi dari virus', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'kekebalan humoral bersifat nonspesifik, sedangkan kekebalan seluler bersifat spesifik', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'kekebalan humoral melibatkan sel darah merah, sedangkan kekebalan seluler melibatkan sel darah putih', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Jika seseorang divaksinasi, mekanisme kekebalan yang terjadi adalah ....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'sistem pertahanan nonspesifik langsung menghancurkan patogen', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'sel B pengingat mengingat antigen dan memicu respons imun lebih cepat jika terpapar patogen yang sama di masa depan', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'sel T supresor menghentikan respons imun setelah vaksinasi', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'asam lambung membunuh patogen yang masuk melalui makanan', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'lisozim dalam air liur menghancurkan dinding sel patogen', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Salah satu contoh pertahanan kimiawi pada sistem pertahanan nonspesifik adalah ....',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'rambut hidung', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'lisozim dalam air mata', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'sel B pembunuh', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'antibodi', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'sel B plasma', 'benar' => false],
                ]
            ],
        ];

        try {
            // Disable foreign key checks sementara
            \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            
            // Hapus data lama
            Jawaban::truncate();
            Soal::truncate();
            
            // Enable foreign key checks kembali
            \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $this->command->info('Data lama berhasil dihapus.');

        } catch (\Exception $e) {
            $this->command->warn('Tidak dapat truncate tabel, menggunakan delete...');
            
            // Alternative: gunakan delete jika truncate gagal
            Jawaban::query()->delete();
            Soal::query()->delete();
            
            // Reset auto increment
            \DB::statement('ALTER TABLE jawaban AUTO_INCREMENT = 1;');
            \DB::statement('ALTER TABLE soal AUTO_INCREMENT = 1;');
        }

        // Insert data soal dan jawaban
        foreach ($dataSoal as $index => $data) {
            try {
                $soal = Soal::create([
                    'pertanyaan' => $data['pertanyaan'],
                ]);

                foreach ($data['jawaban'] as $jawaban) {
                    Jawaban::create([
                        'soal_id' => $soal->id,
                        'pilihan' => $jawaban['pilihan'],
                        'teks_jawaban' => $jawaban['teks'],
                        'is_benar' => $jawaban['benar'],
                    ]);
                }
                
                $this->command->info('Soal ' . ($index + 1) . ' berhasil ditambahkan.');
                
            } catch (\Exception $e) {
                $this->command->error('Error pada soal ' . ($index + 1) . ': ' . $e->getMessage());
            }
        }

        $this->command->info('Seeding soal selesai! Total: ' . count($dataSoal) . ' soal');
    }
}