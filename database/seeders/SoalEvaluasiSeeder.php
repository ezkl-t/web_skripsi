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
                'pertanyaan' => 'Salah satu contoh pertahanan nonspesifik eksternal yang berfungsi sebagai penghalang fisik adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Produksi antibodi oleh sel B', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Aksi sel T sitotoksik', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Kulit yang melapisi permukaan tubuh', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Sekresi histamin saat peradangan', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Pembentukan sel memori', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Fungsi utama antibodi dalam sistem pertahanan tubuh adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Menghasilkan sel darah merah', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Secara langsung mencerna patogen', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Mengikat dan menetralisir antigen', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Melepaskan histamin untuk memicu demam', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Mengangkut oksigen ke jaringan', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Kekebalan yang diperoleh bayi melalui pemberian Air Susu Ibu (ASI), khususnya kolostrum, merupakan contoh dari...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Imunitas aktif alami', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Imunitas aktif buatan', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Imunitas pasif alami', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Imunitas pasif buatan', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Imunitas seluler', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Sel darah putih yang berperan sebagai "sel pemakan" patogen dalam respons imun nonspesifik adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Limfosit B', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Limfosit T', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Sel mast', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Fagosit', 'is_benar' => true],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Sel plasma', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Reaksi alergi seperti bersin dan gatal-gatal terjadi terutama karena pelepasan...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Antibodi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Insulin', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Histamin', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Lisozim', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Interferon', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Perbedaan utama antara respons imun humoral dan seluler adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Humoral diperantarai sel T, seluler diperantarai sel B', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Humoral menghasilkan antibodi, seluler menghancurkan sel yang terinfeksi', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Humoral bersifat nonspesifik, seluler bersifat spesifik', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Humoral melawan bakteri, seluler melawan virus', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Humoral melibatkan memori, seluler tidak', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Mekanisme pertahanan internal spesifik ditandai dengan...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Pencegahan masuknya patogen oleh kulit dan lendir', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Pengenalan antigen spesifik oleh leukosit dan pembentukan antibodi', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Sekresi asam lambung dan enzim lisozim', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Proses fagositosis yang tidak membedakan jenis patogen', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Pembentukan nanah di lokasi infeksi', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Apabila seseorang divaksinasi COVID-19, jenis kekebalan yang terbentuk adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Imunitas aktif alami', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Imunitas aktif buatan', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Imunitas pasif alami', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Imunitas pasif buatan', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Imunitas nonspesifik', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Peran utama sel T pembantu (helper) dalam sistem imun adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Menghancurkan patogen secara langsung dengan fagositosis', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Memproduksi antibodi dalam jumlah besar', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Mensekresi sitokin untuk mengaktifkan sel imun lain seperti sel B dan makrofag', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Membentuk lubang (perforin) pada sel target', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Menyimpan memori antigen untuk infeksi berikutnya', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Perbedaan antara neutrofil dan makrofag yang tepat adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Neutrofil bersifat spesifik, makrofag nonspesifik', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Neutrofil menghasilkan antibodi, makrofag tidak', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Neutrofil menghancurkan patogen sepenuhnya, makrofag menyajikan antigen', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Neutrofil hidup lebih lama dan menetap di organ, makrofag hidup singkat', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Neutrofil hanya melawan virus, makrofag melawan bakteri', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Penyakit autoimun, seperti Rheumatoid Arthritis, terjadi karena...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Sistem imun melemah dan tidak dapat melawan infeksi', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Sistem imun bereaksi berlebihan terhadap alergen seperti debu', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Sistem imun kehilangan kemampuan membedakan sel self (tubuh sendiri) dan non-self (asing), sehingga menyerang jaringan tubuh sendiri', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Adanya infeksi virus HIV yang menghancurkan sel T', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Produksi antibodi yang tidak cukup untuk melindungi tubuh', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Fungsi sel memori pada sistem imun adaptif adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Melakukan fagositosis terhadap patogen saat infeksi pertama', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Memproduksi histamin untuk memicu respons peradangan', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Mengingat antigen spesifik dan memicu respons yang lebih cepat dan kuat pada paparan berikutnya', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Menghasilkan lendir untuk menjebak partikel asing', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Menghancurkan sel tubuh yang sudah tua atau rusak', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Virus HIV berbahaya karena menyerang sel-sel sistem imun, khususnya...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Sel B plasma', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Sel T sitotoksik', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Sel T pembantu (CD4+)', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Sel Natural Killer (NK)', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Neutrofil', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Proses ketika neutrofil tertarik dan berpindah menuju lokasi infeksi karena rangsangan kimia disebut...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Diapedesis', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Fagositosis', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Kemotaksis', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Aglutinasi', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Apoptosis', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Pasangan yang tepat antara jenis limfosit dan fungsinya adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Sel B: Imunitas seluler; Sel T sitotoksik: Imunitas humoral', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Sel B: Menghasilkan antibodi; Sel T sitotoksik: Menghancurkan sel terinfeksi', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Sel B: Menyajikan antigen; Sel T pembantu: Memfagosit patogen', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Sel B: Mensekresi histamin; Sel T memori: Mengaktifkan sel B', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Sel B: Menghasilkan interferon; Sel T regulator: Menghasilkan antibodi', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Seorang pasien menerima donor plasma dari penyintas COVID-19. Jenis kekebalan yang diperoleh pasien tersebut dan karakteristik utamanya adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Imunitas aktif buatan, bersifat jangka panjang karena adanya sel memori', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Imunitas pasif buatan, bersifat sementara karena antibodi akan terdegradasi', 'is_benar' => true],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Imunitas aktif alami, bersifat permanen seumur hidup', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Imunitas pasif alami, hanya efektif untuk mencegah infeksi virus', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Imunitas nonspesifik, merupakan pertahanan tubuh pertama', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Terdapat hipotesis yang menunjukkan penurunan jumlah sel T CD4+ secara bertahap seiring waktu pada infeksi HIV yang tidak diobati. Berdasarkan itu, pernyataan yang paling tepat adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Jumlah sel T CD4+ meningkat pesat seiring perkembangan AIDS', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Infeksi HIV tidak mempengaruhi populasi sel T dalam tubuh', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Terjadi penurunan bertahap sel T CD4+, yang melemahkan sistem imun', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Pada tahun pertama infeksi, jumlah sel T CD4+ langsung menjadi nol', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Sistem imun mampu memulihkan jumlah sel T CD4+ secara alami', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Mengapa respons imun sekunder terhadap patogen (misalnya saat terpapar virus untuk kedua kalinya) jauh lebih cepat dan efektif dibandingkan respons primer?',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Karena patogen telah bermutasi menjadi lebih lemah', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Karena pertahanan nonspesifik seperti kulit menjadi lebih kuat', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Karena adanya sel memori yang segera mengaktivasi produksi antibodi dan sel T sitotoksik', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Karena tubuh memproduksi lebih banyak histamin pada paparan kedua', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Karena sel fagosit seperti neutrofil bereaksi lebih agresif', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Komponen sistem imun yang paling bertanggung jawab untuk mengenali antigen yang disajikan oleh sel penyaji antigen (APC) asing adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => 'Antibodi yang beredar di darah', 'is_benar' => false],
                    ['pilihan' => 'B', 'teks_jawaban' => 'Sel Natural Killer (NK)', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => 'Sel T dengan reseptor spesifik', 'is_benar' => true],
                    ['pilihan' => 'D', 'teks_jawaban' => 'Enzim lisozim dari air liur', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => 'Sel mast di jaringan ikat', 'is_benar' => false],
                ]
            ],
            [
                'pertanyaan' => 'Analisislah pernyataan berikut: 1. Imunitas aktif selalu melibatkan pembentukan sel memori. 2. Imunitas pasif memberikan perlindungan yang bersifat jangka panjang. 3. Vaksinasi adalah contoh dari imunitas aktif buatan. 4. Pemberian serum antibisa ular adalah contoh dari imunitas aktif alami. Pernyataan yang benar adalah...',
                'kuis_type' => 'evaluasi',
                'jawaban' => [
                    ['pilihan' => 'A', 'teks_jawaban' => '1 dan 3', 'is_benar' => true],
                    ['pilihan' => 'B', 'teks_jawaban' => '1 dan 4', 'is_benar' => false],
                    ['pilihan' => 'C', 'teks_jawaban' => '2 dan 3', 'is_benar' => false],
                    ['pilihan' => 'D', 'teks_jawaban' => '2 dan 4', 'is_benar' => false],
                    ['pilihan' => 'E', 'teks_jawaban' => '3 dan 4', 'is_benar' => false],
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