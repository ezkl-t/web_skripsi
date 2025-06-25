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
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            margin-bottom: 20px;
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
    </style>
</head>
<body>

<h2 class="card-title" style="color: #9E2A2B" mb-4">Identifikasi Masalah</h2>

<!-- Materi Pembelajaran dari Dokumen -->
<div class="materi" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 30px;">
    
    <div class="materi-section">
        <h4>1. Pertahanan Eksternal Nonspesifik</h4>
        <p>Pertahanan eksternal mencegah patogen masuk ke dalam jaringan tubuh sehingga dapat mengurangi risiko terjadinya gangguan kesehatan lebih jauh. Tubuh memiliki tiga lapis pertahanan eksternal:</p>

        <h5>• Pertahanan Fisik</h5>
        <p>Berupa lapisan pelindung permukaan tubuh yang membatasi dengan lingkungan luar. Jaringan epitel yang melapisi saluran pernapasan, pencernaan dan organ lainnya adalah penghalang fisik yang efektif untuk mencegah atau meminimalisasi masuknya patogen.</p>

        <h5>• Pertahanan Kimiawi</h5>
        <p>Berupa sekresi sejumlah senyawa kimia oleh kelenjar tubuh untuk meminimalisir jumlah patogen yang masuk ke dalam tubuh, seperti:</p>
        <ul>
            <li>Sekresi Hidrogen Klorida (HCl) di lambung untuk mengatasi patogen yang terbawa makanan</li>
            <li>Sekresi lendir di saluran pernapasan untuk menangkap debu dan patogen</li>
            <li>Sekresi lisozim (enzim perusak dinding sel bakteri) pada komposisi air mata, air liur, dan keringat</li>
        </ul>

        <h5>• Pertahanan di Tingkat Sel</h5>
        <p>Peran sejumlah sel khusus dalam menurunkan risiko pemaparan patogen seperti mekanisme penutupan luka oleh trombosit (keping darah) yang dapat mencegah masuknya patogen melalui jaringan yang terbuka pada area luka.</p>

        <div class="highlight-box">
            <p><strong>Kesimpulan:</strong> Pertahanan eksternal adalah mekanisme pertahanan umum yang tidak secara khusus membedakan jenis patogen (tidak spesifik). Efektivitas pertahanan eksternal terbatas karena kurangnya pengenalan patogen spesifik.</p>
        </div>
    </div>

    <div class="materi-section">
        <h4>2. Pertahanan Internal Spesifik (Antigen-Antibodi)</h4>
        <p>Sistem pertahanan internal spesifik ditandai dengan pengenalan terhadap patogen spesifik oleh sejumlah tipe sel darah putih (leukosit). Leukosit akan mengenali partikel khas dari patogen yang disebut antigen. Antigen dapat berupa protein, glikoprotein, lipid, polisakarida, dan berbagai zat yang dihasilkan oleh patogen. Saat antigen terdeteksi, tubuh akan menciptakan respon imun.</p>

        <h5>Respon imun terdiri dari:</h5>
        <ul>
            <li><strong>Respon imun bawaan (innate):</strong> Berlaku umum untuk semua tipe antigen, misal respon demam dan peradangan</li>
            <li><strong>Respon imun adaptif:</strong> Memberikan respon yang lebih spesifik dengan pembentukan antibodi untuk setiap antigen yang dikenali</li>
        </ul>

        <p>Antibodi adalah molekul glikoprotein yang berfungsi menandai dan melawan antigen spesifik. Berbagai reaksi antibodi terhadap antigen meliputi:</p>
        <ul>
            <li>Bergabung dengan virus dan racun bakteri untuk mencegahnya memasuki sel</li>
            <li>Menempel pada flagela bakteri membuatnya kurang aktif</li>
            <li>Melapisi bakteri untuk memudahkan fagositosis</li>
            <li>Menyebabkan aglutinasi (penggumpalan) bakteri</li>
        </ul>
    </div>

    <div class="materi-section">
        <h4>3. Respon Imun dan Pengenalan Tubuh</h4>
        <p>Setiap sel manusia memiliki molekul pengenal di permukaan membrannya yang disebut antigen permukaan sel. Respon imun tidak terjadi jika tubuh mengenali antigen permukaan selnya sendiri, tetapi akan muncul dengan hadirnya sel dengan antigen permukaan yang asing. Mekanisme ini dapat dijelaskan pada proses transfusi darah serta donor organ antar manusia.</p>

        <h5>Pada sistem golongan darah ABO:</h5>
        <ul>
            <li>Antigen permukaan sel berupa glikolipid pada membran sel darah merah (eritrosit) disebut aglutinogen</li>
            <li>Antibodi di plasma darah disebut aglutinin</li>
            <li>Pengenalan antibodi terhadap antigen eritrosit yang tidak cocok menyebabkan penggumpalan darah (aglutinasi) yang berbahaya bagi sistem sirkulasi tubuh</li>
        </ul>

        <div class="highlight-box">
            <p><strong>Catatan Penting:</strong> Selain sistem ABO, terdapat sistem rhesus yang juga berisiko menyebabkan penggumpalan saat tidak cocok. Darah memiliki tipe rhesus positif jika terdapat antigen rhesus pada membran sel eritrositnya, sedangkan rhesus negatif tidak memiliki antigen pada membrannya namun dapat memproduksi antibodi rhesus jika terjadi paparan antigen.</p>
        </div>
    </div>
</div>

<p style="text-align: center;">Setelah membaca materi di atas, perhatikan video berikut ini untuk membantu pemahamanmu terhadap materi  Sistem Pertahan Tubuh Eksternal dan Internal</p>
<div align="center">
<video width="560" controls>
    <source src="{{ asset('vid/vid-1-mekanisme-pertahanan.mp4') }}" type="video/mp4">
    Terjadi masalah dalam menampilan video
</video>
</div>

<div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: 30px 0;">
    <h4 style="color: #540B0E; margin-bottom: 15px;">Aktivitas:</h4>
    <p class="materi">Dari materi sebelumnya, identifikasi masalah yang relevan terkait pembahasan Sistem Pertahanan Tubuh Eksternal dan Internal. Tentukan apakah identifikasi masalah termasuk atau tidak dalam materi yang diberikan dengan memilih di kolom:</p>

    <table>
        <tr>
            <th>Identifikasi Masalah</th>
            <th>Termasuk</th>
            <th>Tidak Termasuk</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            <td>1. Apa saja komponen yang termasuk pertahanan non spesifik dan spesifik tubuh?</td>
            <td><input type="radio" id="radio1_termasuk" name="radio1" value="termasuk" onchange="checkAnswer(1, 'termasuk')"></td>
            <td><input type="radio" id="radio1_tidak_termasuk" name="radio1" value="tidak_termasuk" onchange="checkAnswer(1, 'tidak_termasuk')"></td>
            <td id="keterangan1"></td>
        </tr>
        <tr>
            <td>2. Bagaimana pertahanan nonspesifik dan spesifik bekerja melindungi tubuh dari penyakit?</td>
            <td><input type="radio" id="radio2_termasuk" name="radio2" value="termasuk" onchange="checkAnswer(2, 'termasuk')"></td>
            <td><input type="radio" id="radio2_tidak_termasuk" name="radio2" value="tidak_termasuk" onchange="checkAnswer(2, 'tidak_termasuk')"></td>
            <td id="keterangan2"></td>
        </tr>
        <tr>
            <td>3. Mengapa terjadi kemerahan dan bengkak saat luka?</td>
            <td><input type="radio" id="radio3_termasuk" name="radio3" value="termasuk" onchange="checkAnswer(3, 'termasuk')"></td>
            <td><input type="radio" id="radio3_tidak_termasuk" name="radio3" value="tidak_termasuk" onchange="checkAnswer(3, 'tidak_termasuk')"></td>
            <td id="keterangan3"></td>
        </tr>
        <tr>
            <td>4. Apakah terdapat perbedaan antara imunitas humoral dan seluler dalam kecepatan menghentikan patogen?</td>
            <td><input type="radio" id="radio4_termasuk" name="radio4" value="termasuk" onchange="checkAnswer(4, 'termasuk')"></td>
            <td><input type="radio" id="radio4_tidak_termasuk" name="radio4" value="tidak_termasuk" onchange="checkAnswer(4, 'tidak_termasuk')"></td>
            <td id="keterangan4"></td>
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
<div id="tombolSelanjutnya" style="display: none; text-align: center; margin-top: 20px;">
    <button class="btn-selanjutnya" id="btnSelanjutnya" onclick="lanjutKeAktivitasBerikutnya()">
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
    };

    // Menyimpan status jawaban benar
    const correctAnswered = {
        1: false,
        2: false,
        3: false,
        4: false
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

    function lanjutKeAktivitasBerikutnya() {
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
            nama_aktivitas: 'identifikasi-masalah-1',
            judul_aktivitas: 'Identifikasi Masalah 1 - Sistem Pertahanan Tubuh Nonspesifik dan Spesifik',
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
                        window.location.href = "{{ route('pengumpulan-data-1') }}";
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
                    window.location.href = "{{ route('pengumpulan-data-1') }}";
                }
            }
        });
    }
</script>

</body>

@endsection