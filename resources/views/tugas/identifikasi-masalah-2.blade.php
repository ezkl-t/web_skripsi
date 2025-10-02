@extends('layouts.app')

@section('title', 'Identifikasi Masalah')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            background-color: #540B0E;
            color: white;
        }
        tr:hover {
            background-color: #FFF3B0;
        }
        input[type="radio"] {
            margin: 0 auto;
            display: block;
        }
        
        .benar {
            color: green;
            font-weight: bold;
        }
        .salah {
            color: red;
            font-weight: bold;
        }
        #kelanjutan {
            display: none;
            margin-top: 30px;
            padding: 20px;
            background-color: #e8f5e9;
            border-radius: 5px;
        }

        .gambar-materi {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 20px auto;
    padding: 10px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    width: fit-content;
    max-width: 500px;
}

.gambar-materi img {
    display: block;
    max-width: 100%;
    height: auto;
    border-radius: 4px;
}
        .image-caption {
            text-align: center;
            font-style: italic;
            color: #666;
            margin-top: 10px;
            font-size: 0.95rem;
        }
        .materi {
            text-align: justify; 
            line-height: 1.6;
            margin-bottom: 15px;
        }
        .materi-section {
            margin-bottom: 25px;
        }
        .materi h4 {
            color: #540B0E;
            margin-top: 25px;
            margin-bottom: 15px;
            border-bottom: 2px solid #540B0E;
            padding-bottom: 5px;
        }
        .materi h5 {
            color: #9E2A2B;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .materi ul {
            margin-left: 20px;
            margin-bottom: 15px;
        }
        .materi ul li {
            margin-bottom: 8px;
            text-align: justify;
        }
        .highlight-box {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 5px;
            padding: 15px;
            margin: 15px 0;
        }

        .btn-selanjutnya {
            display: inline-block;
            background-color: #540B0E;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-selanjutnya:hover {
            background-color: #9E2A2B;
            text-decoration: none;
            color: white;
        }

        .btn-selanjutnya:focus {
            outline: 2px solid #FFF3B0;
            outline-offset: 2px;
        }

        .btn-selanjutnya:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
            opacity: 0.6;
        }
        
        #tombolSelanjutnya {
            display: none;
            text-align: center;
            margin-top: 20px;
        }
        
        .image-placeholder {
            background-color: #f0f0f0;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px 0;
            border: 1px dashed #ccc;
        }
    </style>
</head>
<body>

<h2 class="card-title" style="color: #9E2A2B" mb-4">Identifikasi Masalah 2 - Komponen Sistem Pertahanan Tubuh</h2>

<!-- Materi Pembelajaran dari Dokumen -->
<div class="materi" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 30px;">
    
    <div class="materi-section">
        <h4>1. Fagosit</h4>
        <p>Fagosit, yang secara harfiah berarti "sel pemakan," merupakan jenis sel yang berperan penting dalam pertahanan tubuh dengan cara menghancurkan patogen yang masuk. Fagosit berkembang dari sumsum tulang dan beredar dalam darah serta cairan limfa menuju seluruh tubuh. Sel-sel fagosit yang paling umum adalah neutrofil dan makrofag.</p>

        <h5>• Neutrofil</h5>
        <p>Neutrofil merupakan jenis fagosit yang paling banyak ditemukan, mencapai 60% komposisi leukosit dalam darah. Sel ini memiliki kemampuan unik untuk berpindah tempat ke seluruh bagian tubuh melalui pembuluh darah dan bahkan dapat meninggalkan pembuluh darah dengan cara menyusup melalui dinding kapiler untuk berpatroli di jaringan ikat, kemampuan yang disebut diapedesis.</p>
        <p>Mekanisme fagositosis dimulai ketika neutrofil menempel pada patogen, kemudian membran permukaan sel neutrofil membentuk kantung vesikula yang membawa patogen masuk ke dalam sel secara endositosis yang disebut fagosom. Selanjutnya, enzim pencernaan disekresikan oleh Badan Golgi ke dalam lisosom yang kemudian bergabung dengan fagosom membentuk struktur vakuola fagositik untuk menghancurkan patogen.</p>
        <p>Meskipun dihasilkan dalam jumlah yang banyak, neutrofil memiliki masa hidup yang singkat dan akan mati setelah melawan patogen. Neutrofil yang telah mati biasanya dikumpulkan pada lokasi infeksi untuk membentuk nanah.</p>
        
        <!-- Placeholder untuk gambar neutrofil -->
        <div class="gambar-materi">
            <img src="../img/neutrofil.png" width="40%">
            <div class="image-caption">Gambar 2.2 Neutrofil</div>
        </div>

        <h5>• Makrofag</h5>
        <p>Makrofag memiliki ukuran lebih besar dibanding neutrofil dan masa hidup yang lebih panjang. Berbeda dengan neutrofil yang beredar di pembuluh darah, makrofag lebih sering menetap pada organ-organ tertentu seperti paru-paru, hati, limpa, ginjal, dan nodus limfa.</p>
        <p>Makrofag berkembang dari monosit yang beredar dalam darah dan menjadi makrofag ketika meninggalkan darah dan menetap dalam organ. Fungsi makrofag berbeda dengan neutrofil karena tidak menghancurkan patogen sepenuhnya, melainkan memecahnya menjadi partikel kecil yang dijadikan sampel antigen. Kemampuan menampilkan antigen di bagian permukaan sel ini menjadikan makrofag disebut sebagai sel penyaji antigen atau Antigen-Presenting Cells.</p>
        
        <!-- Placeholder untuk gambar makrofag -->
        <div class="gambar-materi">
            <img src="../img/makrofag_vektor.png" width="40%">
            <div class="image-caption">Gambar 2.2 Makrofag</div>
        </div>
    </div>

    <div class="materi-section">
        <h4>2. Limfosit dan Respon Imun Spesifik</h4>
        <p>Limfosit merupakan tipe sel darah putih kedua yang berperan penting dalam sistem pertahanan tubuh, khususnya dalam respon imun spesifik adaptif. Terdapat dua jenis limfosit yang keduanya telah dibentuk sejak sebelum kelahiran di dalam sumsum tulang janin.</p>
        <p>Limfosit B tetap berada dalam sumsum tulang hingga cukup matang kemudian menyebar ke seluruh tubuh terutama di nodus limfa dan limpa, sedangkan limfosit T meninggalkan sumsum tulang dan berkumpul serta menjadi matang di timus, sebuah kelenjar yang terdapat di rongga dada tepat di bawah tulang dada dengan ukuran yang menjadi dua kali lebih besar antara kelahiran dan masa pubertas namun mengalami reduksi setelah pubertas.</p>
        
        <!-- Placeholder untuk gambar limfosit -->
        <div class="gambar-materi">
            <img src="../img/limfosit.png" width="40%">
            <div class="image-caption">Gambar 2.3 Limfosit</div>
        </div>

        <h5>• Limfosit B (sel B) dan respon imun spesifik humoral</h5>
        <p>Limfosit B berperan dalam respons imun humoral dengan menghasilkan antibodi. Ketika limfosit B teraktivasi oleh antigen, mereka membentuk klon yang terdiri dari sel plasma yang memproduksi antibodi untuk melawan patogen. Selain itu, sel B juga membentuk sel memori yang akan mengingat antigen tersebut untuk melawan infeksi di masa depan. Proses ini dikenal sebagai respon imun spesifik humoral.</p>

        <h5>• Limfosit T (sel T) dan respon imun spesifik seluler</h5>
        <p>Limfosit T berperan dalam respons imun seluler, di mana mereka mengenali dan menghancurkan sel tubuh yang terinfeksi. Limfosit T dapat dibagi menjadi dua jenis: sel T pembantu yang mengaktifkan limfosit B dan makrofag, serta sel T sitotoksik yang membunuh sel yang terinfeksi. Sel T juga membentuk sel memori yang berfungsi jika patogen yang sama masuk ke dalam tubuh di masa mendatang.</p>
    </div>
</div>

<p style="text-align: center;">Setelah membaca materi di atas, perhatikan video berikut ini untuk membantu pemahamanmu terhadap materi Komponen Sistem Pertahanan Tubuh</p>
<div align="center">
<video width="560" controls>
    <source src="{{ asset('vid/vid-2-komponen-pertahanan.mp4') }}" type="video/mp4">
    Terjadi masalah dalam menampilkan video
</video>
</div>

<div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: 30px 0;">
    <h4 style="color: #540B0E; margin-bottom: 15px;">Aktivitas:</h4>
    <p class="materi">Dari materi sebelumnya, identifikasi masalah yang relevan terkait pembahasan Komponen Sistem Pertahanan. Tentukan apakah identifikasi masalah termasuk atau tidak dalam materi yang diberikan dengan memilih di kolom:</p>

    <table>
        <tr>
            <th>Identifikasi Masalah</th>
            <th>Termasuk</th>
            <th>Tidak Termasuk</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            <td>1. Bagaimana tubuh merespon infeksi patogen?</td>
            <td><input type="radio" id="radio1_termasuk" name="radio1" value="termasuk" onchange="checkAnswer(1, 'termasuk')"></td>
            <td><input type="radio" id="radio1_tidak_termasuk" name="radio1" value="tidak_termasuk" onchange="checkAnswer(1, 'tidak_termasuk')"></td>
            <td id="keterangan1"></td>
        </tr>
        <tr>
            <td>2. Apa perbedaan antara fagosit dan limfosit dalam sistem pertahanan tubuh terhadap infeksi patogen?</td>
            <td><input type="radio" id="radio2_termasuk" name="radio2" value="termasuk" onchange="checkAnswer(2, 'termasuk')"></td>
            <td><input type="radio" id="radio2_tidak_termasuk" name="radio2" value="tidak_termasuk" onchange="checkAnswer(2, 'tidak_termasuk')"></td>
            <td id="keterangan2"></td>
        </tr>
        <tr>
            <td>3. Bagaimana limfosit B dan limfosit T berperan dalam respon imun tubuh terhadap infeksi?</td>
            <td><input type="radio" id="radio3_termasuk" name="radio3" value="termasuk" onchange="checkAnswer(3, 'termasuk')"></td>
            <td><input type="radio" id="radio3_tidak_termasuk" name="radio3" value="tidak_termasuk" onchange="checkAnswer(3, 'tidak_termasuk')"></td>
            <td id="keterangan3"></td>
        </tr>
        <tr>
            <td>4. Bagaimana cara mempercepat kerja mekanisme sistem pertahanan tubuh?</td>
            <td><input type="radio" id="radio4_termasuk" name="radio4" value="termasuk" onchange="checkAnswer(4, 'termasuk')"></td>
            <td><input type="radio" id="radio4_tidak_termasuk" name="radio4" value="tidak_termasuk" onchange="checkAnswer(4, 'tidak_termasuk')"></td>
            <td id="keterangan4"></td>
        </tr>
        <tr>
            <td>5. Apa yang menyebabkan kekurangan sel darah putih?</td>
            <td><input type="radio" id="radio5_termasuk" name="radio5" value="termasuk" onchange="checkAnswer(5, 'termasuk')"></td>
            <td><input type="radio" id="radio5_tidak_termasuk" name="radio5" value="tidak_termasuk" onchange="checkAnswer(5, 'tidak_termasuk')"></td>
            <td id="keterangan5"></td>
        </tr>
    </table>
</div>

<div id="kelanjutan" class="materi">
    <div style="background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; padding: 15px; margin: 20px 0;">
        <h4 style="color: #155724; margin-top: 0;">🎉 Selamat!</h4>
        <p style="color: #155724; margin-bottom: 0;">Anda telah berhasil menjawab semua pertanyaan dengan benar. Kini Anda dapat melanjutkan ke tahap pembelajaran selanjutnya.</p>
    </div>
</div>

<!-- Tombol Selanjutnya -->
<div id="tombolSelanjutnya" style="text-align: center; margin-top: 20px;">
    <button class="btn-selanjutnya" id="btnSelanjutnya" onclick="lanjutKePengumpulanData2()">
        Selanjutnya
    </button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Setup CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Jawaban yang benar untuk setiap soal
    const correctAnswers = {
        1: 'termasuk',
        2: 'termasuk',
        3: 'termasuk',
        4: 'tidak_termasuk',
        5: 'tidak_termasuk'
    };

    // Menyimpan status jawaban benar
    const correctAnswered = {
        1: false,
        2: false,
        3: false,
        4: false,
        5: false
    };

    // Menyimpan detail jawaban user
    let userAnswers = {};

    function checkAnswer(questionNumber, selectedAnswer) {
        const keteranganElement = document.getElementById(`keterangan${questionNumber}`);
        
        // Simpan jawaban user
        userAnswers[questionNumber] = selectedAnswer;
        
        if (selectedAnswer === correctAnswers[questionNumber]) {
            keteranganElement.textContent = 'Benar';
            keteranganElement.className = 'benar';
            correctAnswered[questionNumber] = true;
        } else {
            keteranganElement.textContent = 'Salah';
            keteranganElement.className = 'salah';
            correctAnswered[questionNumber] = false;
        }
        
        // Cek apakah semua jawaban benar
        checkAllCorrect();
    }
    
    function checkAllCorrect() {
        const allCorrect = Object.values(correctAnswered).every(val => val);
        if (allCorrect) {
            document.getElementById('kelanjutan').style.display = 'block';
            showNextButton(); // Tampilkan tombol selanjutnya
        } else {
            document.getElementById('kelanjutan').style.display = 'none';
            document.getElementById('tombolSelanjutnya').style.display = 'none'; // Sembunyikan tombol
        }
    }
        
    function showNextButton() {
        document.getElementById('tombolSelanjutnya').style.display = 'block';
    }

    function lanjutKePengumpulanData2() {
        // Hitung skor
        const correctCount = Object.values(correctAnswered).filter(val => val).length;
        const totalQuestions = Object.keys(correctAnswers).length;
        
        // Buat detail jawaban
        const detailJawaban = {};
        for (let i = 1; i <= totalQuestions; i++) {
            detailJawaban[i] = {
                user_answer: userAnswers[i] || '',
                correct_answer: correctAnswers[i],
                is_correct: correctAnswered[i]
            };
        }

        // Disable tombol untuk prevent double click
        document.getElementById('btnSelanjutnya').disabled = true;
        document.getElementById('btnSelanjutnya').textContent = 'Menyimpan...';
        
        // Simpan progres
        simpanProgres(correctCount, totalQuestions, detailJawaban);
    }

    function simpanProgres(skor, totalSoal, detailJawaban) {
        console.log('Memulai simpan progres...');
        console.log('Data yang akan dikirim:', {
            skor: skor,
            totalSoal: totalSoal,
            detailJawaban: detailJawaban
        });

        // Data yang akan dikirim
        const data = {
            nama_aktivitas: 'identifikasi-masalah-2',
            judul_aktivitas: 'Identifikasi Masalah 2 - Komponen Sistem Pertahanan Tubuh',
            skor: skor,
            total_soal: totalSoal,
            detail_jawaban: detailJawaban
        };

        // Kirim data via AJAX menggunakan jQuery (karena sudah tersedia di layout)
        $.ajax({
            url: '/api/progres/simpan',
            method: 'POST',
            data: JSON.stringify(data),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log('Progres berhasil disimpan:', response);
                
                // Update pesan hasil jika sempurna
                if (skor === totalSoal) {
                    // Tampilkan notifikasi sukses
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Selamat!',
                            text: 'Anda telah menyelesaikan aktivitas ini dengan sempurna!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                    
                    // Redirect setelah delay
                    setTimeout(function() {
                        window.location.href = "{{ route('pengumpulan-data-2') }}";
                    }, 3000);
                } else {
                    // Reset tombol jika ada error
                    document.getElementById('btnSelanjutnya').disabled = false;
                    document.getElementById('btnSelanjutnya').textContent = 'Selanjutnya';
                    alert('Ada kesalahan dalam menyimpan progres.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error menyimpan progres:', error);
                console.error('Response:', xhr.responseText);
                
                // Reset tombol
                document.getElementById('btnSelanjutnya').disabled = false;
                document.getElementById('btnSelanjutnya').textContent = 'Selanjutnya';
                
                // Tampilkan pesan error yang user-friendly
                alert('Progres gagal disimpan. Silakan coba lagi atau lanjutkan ke aktivitas berikutnya.');
                
                // Optional: tetap lanjut ke halaman berikutnya
                if (confirm('Apakah Anda ingin tetap melanjutkan ke aktivitas berikutnya?')) {
                    window.location.href = "{{ route('pengumpulan-data-2') }}";
                }
            }
        });
    }

    // Sembunyikan tombol selanjutnya saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('tombolSelanjutnya').style.display = 'none';
    });
</script>

</body>

@endsection