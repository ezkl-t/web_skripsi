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
                'pertanyaan' => 'Apa yang dimaksud dengan sistem imun pada tubuh manusia?',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Sistem yang mengatur metabolisme tubuh', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Sistem yang melindungi tubuh dari serangan patogen dan benda asing', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'Sistem yang mengatur peredaran darah', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Sistem yang mengatur pencernaan makanan', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Sistem yang mengatur pernapasan', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sel darah putih yang berperan dalam kekebalan spesifik adalah...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Eritrosit', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Trombosit', 'benar' => false],
                    ['pilihan' => 'C', 'teks' => 'Neutrofil', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Limfosit', 'benar' => true],
                    ['pilihan' => 'E', 'teks' => 'Monosit', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Organ yang berperan sebagai tempat pematangan sel T adalah...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Limpa', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Timus', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'Sumsum tulang', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Kelenjar getah bening', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Hati', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Antibodi yang pertama kali diproduksi saat terjadi infeksi adalah...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'IgA', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'IgG', 'benar' => false],
                    ['pilihan' => 'C', 'teks' => 'IgM', 'benar' => true],
                    ['pilihan' => 'D', 'teks' => 'IgE', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'IgD', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Vaksinasi merupakan contoh dari kekebalan...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Aktif alami', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Aktif buatan', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'Pasif alami', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Pasif buatan', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Non spesifik', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sel yang berperan dalam fagositosis adalah...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Sel B', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Sel T helper', 'benar' => false],
                    ['pilihan' => 'C', 'teks' => 'Makrofag', 'benar' => true],
                    ['pilihan' => 'D', 'teks' => 'Sel plasma', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Sel memori', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Perbedaan utama antara kekebalan spesifik dan non-spesifik adalah...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Kecepatan responnya', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Kemampuan mengenali antigen secara khusus', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'Lokasi terjadinya', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Jenis sel yang terlibat', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Durasi perlindungannya', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Interferón berfungsi untuk...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Melawan infeksi bakteri', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Melawan infeksi virus', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'Melawan infeksi jamur', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Mengatur metabolisme', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Mengatur suhu tubuh', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Reaksi alergi terjadi karena...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Kekurangan antibodi IgG', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Kelebihan produksi antibodi IgE', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'Kerusakan sel T', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Kekurangan sel B', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Kerusakan makrofag', 'benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'HIV menyerang sistem imun dengan cara...',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks' => 'Menginfeksi sel B', 'benar' => false],
                    ['pilihan' => 'B', 'teks' => 'Menginfeksi sel T helper (CD4+)', 'benar' => true],
                    ['pilihan' => 'C', 'teks' => 'Menginfeksi makrofag saja', 'benar' => false],
                    ['pilihan' => 'D', 'teks' => 'Menginfeksi eritrosit', 'benar' => false],
                    ['pilihan' => 'E', 'teks' => 'Menginfeksi trombosit', 'benar' => false],
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