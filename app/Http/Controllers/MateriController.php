<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MateriController extends Controller
{
    //
    public function showMateri()
    {
        // Data konten yang akan dikirim ke view
        $contentMap = [
            'home' => [
                'title' => 'Beranda',
                'content' => '<p class="materi">Pada akhir fase F, peserta didik memiliki kemampuan mendeskripsikan struktur sel serta bioproses yang terjadi, seperti transpor membran dan pembelahan sel; menganalisis keterkaitan struktur organ pada sistem organ dengan fungsinya, serta kelainan atau gangguan yang muncul pada sistem organ tersebut; memahami fungsi enzim dan mengenal proses metabolisme yang terjadi dalam tubuh; serta memiliki kemampuan menerapkan konsep pewarisan sifat, pertumbuhan dan perkembangan, mengevaluasi gagasan baru mengenai evolusi, dan inovasi teknologi biologi.</p>
                
                '
            ],
            'subbab-1' => [
                'title' => 'Mekanisme Sistem Pertahanan',
                'content' => '
                <div class="card border-1 ">
                    <div class="card-header text-center" style="background: #540B0E;color: #ffffff">
                        <b>Tujuan Pembelajaran</b>
                    </div>
                </div>
                <ol>
                    <li>Mendeskripsikan komponen sel, jaringan, dan organ yang menyusun sistem pertahanan tubuh</li>
                </ol>

                <br>
                <br>
                <br>
                <p class="materi"> 
                </p>
                '
            ],
            'stimulus-1' => [
                'title' => 'Stimulus 1',
                'content' => '
                <h2 class="card-title text-primary mb-4">Stimulus 1</h2>
                
                <p class="materi">Apakah kamu tahu bahwa tubuh kita dilengkapi berbagai sistem pertahanan yang melindungi diri dari serangan penyakit? Bagaimana tubuh kita bisa melindungi diri dari patogen penyebab penyakit? Apa saja yang ada pada sistem pertahanan tubuh kita?</p>

                <p class="materi">
                Fungsi sistem pertahanan tubuh sebagai berikut. 
                <br>
                a. Melindungi tubuh dari serangan benda asing atau bibit penyakit yang masuk ke tubuh. Benda asing tersebut dapat berupa mikrobia penyebab penyakit (patogen), misal virus, bakteri, Protozoa, dan jamur. <br>
                b. Menghilangkan jaringan atau sel yang mati atau rusak (debris sel) untuk perbaikan jaringan. <br>
                c. Mengenali dan menghilangkan sel abnormal. Itulah beberapa fungsi sistem pertahanan tubuh. Pertahanan tubuh terhadap suatu penyakit melibatkan antigen dan peran antibodi. Sebelum mempelajari lebih lanjut mengenai jenis-jenis pertahanan tubuh, lakukan terlebih dahulu kegiatan berikut untuk mendefinisikan antigen dan antibodi.
                </p>
                

                '
            ],
            'identifikasi-masalah-1' => [
                'title' => 'Identifikasi Masalah 1',
                'content' => '<p class="materi"></p>

                <h2 class="card-title text-primary mb-4">Identifikasi Masalah 1</h2>
                
                
                <p style="text-align: center;">Sebelum melanjutkan lebih lanjut ke dalam materi, perhatikan  video berikut ini untuk membantu pemahamanmu terhadap materi Mekanisme Sistem Pertahan Tubuh</p>
                <div  align="center">
                <video width="560" controls>
                    <source src="vid-1-mekanisme-pertahanan.mp4" type="video/mp4">
                    Terjadi masalah dalam menampilan video
                </video>
                </div>
                <p class="materi">Setelah menyimak video di atas, perhatikan identifikasi masalah di bawah ini yang relevan dengan solusi permasalahan pembahasan Mekanisme Sistem Pertahanan Tubuh: </p>
               <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Sistem Pertahanan Tubuh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        input[type="radio"] {
            margin: 0 auto;
            display: block;
        }
        
        .termasuk {
            color: green;
        }
        .tidak-termasuk {
            color: red;
        }
    </style>
</head>
<body>

<h2>Tugas Sistem Pertahanan Tubuh</h2>

<table>
    <tr>
        <th>Identifikasi Masalah</th>
        <th>Termasuk</th>
        <th>Tidak Termasuk</th>
        <th>Keterangan</th>
    </tr>
    <tr>
        <td>1. Apa saja komponen yang termasuk pertahanan non spesifik dan spesifik tubuh?</td>
        <td><input type="radio" id="radio1_termasuk" name="radio1" value="termasuk"></td>
        <td><input type="radio" id="radio1_tidak_termasuk" name="radio1" value="tidak_termasuk"></td>
    </tr>
    <tr>
        <td>2. Bagaimana pertahanan nonspesifik bekerja melindungi kita terhadap patogen?</td>
        <td><input type="radio" id="radio2_termasuk" name="radio2" value="termasuk"></td>
        <td><input type="radio" id="radio2_tidak_termasuk" name="radio2" value="tidak_termasuk"></td>
    </tr>
    <tr>
        <td>3. Bagaimana sistem pertahanan spesifik menghentikan patogen?</td>
        <td><input type="radio" id="radio3_termasuk" name="radio3" value="termasuk"></td>
        <td><input type="radio" id="radio3_tidak_termasuk" name="radio3" value="tidak_termasuk"></td>
    </tr>
    <tr>
        <td>4. Mengapa terjadi kemerahan dan bengkak saat luka?</td>
        <td><input type="radio" id="radio4_termasuk" name="radio4" value="termasuk"></td>
        <td><input type="radio" id="radio4_tidak_termasuk" name="radio4" value="tidak_termasuk"></td>
    </tr>
    <tr>
        <td>5. Apakah terdapat perbedaan antara imunitas humoral dan seluler dalam kecepatan menghentikan patogen?[Tidak Termasuk]</td>
        <td><input type="radio" id="radio5_termasuk" name="radio5" value="termasuk"></td>
        <td><input type="radio" id="radio5_tidak_termasuk" name="radio5" value="tidak_termasuk"></td>
    </tr>
</table>

</body>
                
                
                '
            ],'pengumpulan-data-1' => [
                'title' => 'Pengumpulan Data',
                'content' => '
                <style>
                textarea {
                    width: 1000px;
                    height: 150px;
                }
                </style>
                <h2 class="card-title text-primary mb-4">Pengumpulan Data</h2>
                <p class"materi">Setelah mengamati video tersebut, jelaskan dengan pemahamanmu bagaimana berbagai macam komponen saling membantu dalam melindungi tubuh dari patogen! Apakah hanya dengan satu komponen sistem pertahanan saja sudah cukup untuk melindungi tubuh dari penyakit?</p>
                                
                                <form action="#">
                                    <p><label for="pengumpulan-data-1">Ayo kemukakan pendapatmu.</label></p>
                                    <textarea id="pengumpulan-data-1" name="pengumpulan-data-1" rows="4" cols="50"></textarea>
                                    <br>
                                    <input type="submit" value="Submit">
                                </form>
                '
            ],
            'pengolahan-data-1' => [
                'title' => 'Pengolahan Data',
                'content' => '
                
                <table style="width:50%">
                <tr>
                    <th>Kategori</th>
                    <th>Komponen</th>
                    <th>Fungsi</th>
                </tr>
                <tr>
                    <td>Pertahanan Nonspesifik</td>
                    <td>
                    <select id="list-0">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Kulit</option>
                        <option value="selb">Sel B</option>
                        <option value="histamin">Histamin</option>
                        <option value="selt">Sel T Sitotoksik</option>
                        <option value="netralisasi">Netralisasi</option>
                    </select>
                    </td>
                    <td>
                    <select id="list-0-1">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Menghalangi masuknya patogen</option>
                        <option value="selb">Memproduksi antibodi</option>
                        <option value="histamin">Memicu pelebaran pembuluh darah</option>
                        <option value="selt">Menghancurkan sel terinfeksi</option>
                        <option value="netralisasi">Menonaktifkan antigen</option>
                    </select>
                    </td>
                    
                </tr>
                <tr>
                    <td>Pertahanan Spesifik</td>
                    <td>
                    <select id="list-1">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Kulit</option>
                        <option value="selb">Sel B</option>
                        <option value="histamin">Histamin</option>
                        <option value="selt">Sel T Sitotoksik</option>
                        <option value="netralisasi">Netralisasi</option>
                    </select>
                    </td>
                    <td>
                    <select id="list-1-1">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Menghalangi masuknya patogen</option>
                        <option value="selb">Memproduksi antibodi</option>
                        <option value="histamin">Memicu pelebaran pembuluh darah</option>
                        <option value="selt">Menghancurkan sel terinfeksi</option>
                        <option value="netralisasi">Menonaktifkan antigen</option>
                    </select>
                    </td>
                    
                </tr>
                <tr>
                    <td>Proses Inflamasi</td>
                   <td><select id="list-2">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Kulit</option>
                        <option value="selb">Sel B</option>
                        <option value="histamin">Histamin</option>
                        <option value="selt">Sel T Sitotoksik</option>
                        <option value="netralisasi">Netralisasi</option>
                    </select></td>
                    <td><select id="list-2-2">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Menghalangi masuknya patogen</option>
                        <option value="selb">Memproduksi antibodi</option>
                        <option value="histamin">Memicu pelebaran pembuluh darah</option>
                        <option value="selt">Menghancurkan sel terinfeksi</option>
                        <option value="netralisasi">Menonaktifkan antigen</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Jenis Limfosit</td>
                   <td><select id="list-3">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Kulit</option>
                        <option value="selb">Sel B</option>
                        <option value="histamin">Histamin</option>
                        <option value="selt">Sel T Sitotoksik</option>
                        <option value="netralisasi">Netralisasi</option>
                    </select></td>
                    <td><select id="list-3-3">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Menghalangi masuknya patogen</option>
                        <option value="selb">Memproduksi antibodi</option>
                        <option value="histamin">Memicu pelebaran pembuluh darah</option>
                        <option value="selt">Menghancurkan sel terinfeksi</option>
                        <option value="netralisasi">Menonaktifkan antigen</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Mekanisme Antibodi</td>
                   <td><select id="list-4">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Kulit</option>
                        <option value="selb">Sel B</option>
                        <option value="histamin">Histamin</option>
                        <option value="selt">Sel T Sitotoksik</option>
                        <option value="netralisasi">Netralisasi</option>
                    </select></td>
                    <td><select id="list-4-4">
                        <option value="0" selected>Pilih Jawaban</option>
                        <option value="kulit">Menghalangi masuknya patogen</option>
                        <option value="selb">Memproduksi antibodi</option>
                        <option value="histamin">Memicu pelebaran pembuluh darah</option>
                        <option value="selt">Menghancurkan sel terinfeksi</option>
                        <option value="netralisasi">Menonaktifkan antigen</option>
                    </select></td>
                </tr>
                </table>
                <input type="submit" value="Submit">
                '
            ],'verifikasi-1' => [
                'title' => 'Verifikasi',
                'content' => '
                <h2 class="card-title text-primary mb-4">Verifikasi</h2>
                <p class="materi">Isilah kolom yang kosong pada teks berikut ini berdasarkan informasi yang telah kamu dapat dari menonton video dan melaksanakan kegiatan lainnya.</p>

                <label for="isian-1">Sebuah luka irisan tak lama memerah dan bengkak yang diakibatkan oleh tubuh mengeluarkan </label>
                <input type="text" id="isian-1" name="isian-1"><br>
                <label for="pwd">Tak lama kemudian, luka tersebut mulai bernanah karena sel-sel darah putih melakukan</label>
                <input type="text" id="isian-1" name="isian-1">terhadap mikroba yang menginfeksi tubuh. Beberapa waktu kemudian, mikroba yang sama kembali dan tubuh terpapar patogen yang sama namun tidak menunjukkan gejala infeksi dikarenakan imunitas adaptif yang memproduksi
                <input type="text" id="isian-1" name="isian-1">
                <br><input type="submit" value="Submit">               
                '
            ],'kesimpulan-1' => [
                'title' => 'Kesimpulan',
                'content' => '
                <style>
                textarea {
                    width: 1000px;
                    height: 150px;
                }
                </style>
                <h2 class="card-title text-primary mb-4">Kesimpulan</h2>
                <p class="materi">Kamu telah selesai mempelajari materi Mekanisme Sistem Pertahanan Tubuh. Sekarang waktunya kamu memberikan kesimpulan terkait pembelajaran yang baru saja kamu lakukan.</p>
                <form action="#">
                    <textarea id="pengumpulan-data-1" name="pengumpulan-data-1" rows="4" cols="50"></textarea>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                '
            ],'subbab-2' => [
                'title' => 'Jenis-Jenis Sel Darah Putih',
                'content' => '

                <div class="card border-1 ">
                    <div class="card-header text-center" style="background: #540B0E;color: #ffffff">
                        <b>Tujuan Pembelajaran</b>
                    </div>
                </div>
                <ol>
                    <li>Mendeskripsikan komponen sel, jaringan, dan organ yang menyusun sistem pertahanan tubuh</li>
                </ol>                '
            ],'stimulus-2' => [
                'title' => 'Stimulus',
                'content' => '

                <div class="card border-1 ">
                    <div class="card-header text-center" style="background: #540B0E;color: #ffffff">
                        <b>Stimulus 2</b>
                    </div>
                    <p class="materi">
                    &nbsp &nbsp &nbsp Setelah membaca materi sebelumnya, tentu kamu sudah mengetahui bukan bahwa sel darah putih adalah salah satu komponen terpenting dalam sistem pertahanan tubuh terhadap penyakit? Kamu tentu tertarik bukan untuk mengetahui apa saja jenis sel-sel darah putih tersebut? 
                    </p>

                    <b>Sel Darah Putih</b>
                    <p class="materi">
                    &nbsp &nbsp &nbsp Sistem pertahanan tubuh organisme tingkat tinggi terutama mamalia bertumpu pada sel-sel darah putih (leukosit). Leukosit dibentuk di dalam sumsum tulang oleh sebuah jaringan meristematik yang disebut stem cells (sel induk darah). Leukosit secara umum dapat dibedakan menjadi dua sesuai fungsi dan tujuannya yaitu <b>fagosit</b> dan <b>limfosit</b>.
                    </p>
                    <div  align="center">
                    <img src="img/diferensiasi_sel_induk_darah.png" width="550" height="400">
                </div>
                '
            ],'kesimpulan-2' => [
                'title' => 'Kesimpulan',
                'content' => '
                <style>
                textarea {
                    width: 1000px;
                    height: 150px;
                }
                </style>
                <h2 class="card-title text-primary mb-4">Kesimpulan 2</h2>
                <p class="materi">Kamu telah selesai mempelajari materi Komponen Sistem Pertahanan Tubuh. Sekarang waktunya kamu memberikan kesimpulan terkait pembelajaran yang baru saja kamu lakukan.</p>
                <form action="#">
                    <textarea id="pengumpulan-data-1" name="pengumpulan-data-1" rows="4" cols="50"></textarea>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                '              
            ],'subbab-3' => [
                'title' => 'Macam-Macam Kekebalan dan Gangguan Sistem Pertahanan',
                'content' => '
                <div class="card border-1 ">
                <div class="card-header text-center" style="background: #540B0E;color: #ffffff">
                    <b>Tujuan Pembelajaran</b>
                </div>
                </div>
                <ol>
                    <li>Mendeskripsikan gangguan sistem pertahanan tubuh dan interaksi antara antigen dan antibodi, serta berbagai jenis imunitas</li>
                </ol>
                
                '
            ],'kesimpulan-3' => [
                'title' => 'Kesimpulan',
                'content' => '
                <style>
                textarea {
                    width: 1000px;
                    height: 150px;
                }
                </style>
                <h2 class="card-title text-primary mb-4">Kesimpulan 3</h2>
                <p class="materi">Kamu telah selesai mempelajari materi Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh. Sekarang waktunya kamu memberikan kesimpulan terkait pembelajaran yang baru saja kamu lakukan.</p>
                <form action="#">
                    <textarea id="pengumpulan-data-1" name="pengumpulan-data-1" rows="4" cols="50"></textarea>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                '
            ],'pengumpulan-data-3' => [
                'title' => 'Pengumpulan Data',
                'content' => '
                <style>
                textarea {
                    width: 1000px;
                    height: 150px;
                }
                </style>
                <h2 class="card-title text-primary mb-4">Pengumpulan Data 3</h2>
                <h3 class="card-title text-primary mb-4">Instruksi</h3>
                <p class="materi">Isilah kolom yang kosong pada teks berikut ini berdasarkan informasi yang telah kamu dapat dari menonton video dan membaca materi sebelumnya.</p>
                
                <label for="isian-1">Kekebalan aktif merupakan kekebalan yang dihasilkan oleh </label>
                <input type="text" id="isian-1" name="isian-1"> itu sendiri.<br>
                <label for="isian-1">Kekebalan ini dapat diperoleh secara alami dan secara </label>
                <input type="text" id="isian-1" name="isian-1">. Kekebalan aktif alami diperoleh setelah seseorang mengalami sakit akibat infeksi suatu kuman penyakit. Setelah sembuh dari sakit, orang tersebut akan menjadi 
                <input type="text" id="isian-1" name="isian-1">  terhadap penyakit tersebut.
                Sedangkan kekebalan pasif merupakan kekebalan yang diperoleh setelah menerima antibodi dari 
                <input type="text" id="isian-1" name="isian-1"> . Kekebalan pasif alami dapat ditemukan pada bayi setelah menerima antibodi dari ibunya melalui plasenta saat  berada di dalam
                <br><input type="submit" value="Submit">               
                '
            ],'pengolahan-data-3' => [
                'title' => 'Pengolahan Data',
                'content' => '
                <style>
                textarea {
                    width: 1000px;
                    height: 150px;
                }
                </style>
                <h2 class="card-title text-primary mb-4">Pengolahan Data 3</h2>
                <p class="materi">Menurut kamu, bagaimana cara yang baik untuk menjaga kekebalan tubuh?</p>
                <form action="#">
                    <textarea id="pengumpulan-data-1" name="pengumpulan-data-1" rows="4" cols="50"></textarea>
                    <br>
                    <input type="submit" value="Submit">
                </form>
                '
            ],
            // Tambahkan data konten lainnya sesuai kebutuhan
        ];

        // Kirim data ke view
        // return view('home', compact('contentMap'));
        return view('home', compact('contentMap'));
        
    }
}
