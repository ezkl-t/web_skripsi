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
    </style>
</head>
<body>

<h2 class="card-title" style="color: #9E2A2B" mb-4">Identifikasi Masalah 3 - Jenis Kekebalan dan Gangguan Sistem Pertahanan Tubuh</h2>

<!-- Materi Pembelajaran dari Dokumen -->
<div class="materi" style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 30px;">
    
    <div class="materi-section">
        <h4>1. Jenis-Jenis Kekebalan Tubuh</h4>
        
        <!-- Placeholder untuk gambar -->
        <div class="gambar-materi">
            <img src="../img/perbedaan_kekebalan.jpg" width="90%">
            <p>Gambar 3.1 Perbedaan Kekebalan Aktif dan Kekebalan Pasif</p>
        </div>

        <h5>• Kekebalan Aktif</h5>
        <p>Kekebalan aktif merupakan kekebalan yang dihasilkan oleh tubuh itu sendiri. Kekebalan ini dapat diperoleh secara alami dan secara buatan.</p>
        <ul>
            <li><strong>Kekebalan aktif alami</strong> diperoleh setelah seseorang mengalami sakit akibat infeksi suatu kuman penyakit. Setelah sembuh dari sakit, orang tersebut akan menjadi kebal terhadap penyakit tersebut.</li>
            <li><strong>Kekebalan aktif buatan</strong> diperoleh melalui imunisasi misalnya dengan pemberian vaksin (vaksinasi). Vaksin merupakan siapan antigen yang diberikan secara oral (melalui mulut) atau melalui suntikan untuk merangsang mekanisme pertahanan tubuh terhadap patogen.</li>
        </ul>

        <h5>• Kekebalan Pasif</h5>
        <p>Kekebalan pasif merupakan kekebalan yang diperoleh setelah menerima antibodi dari luar. Kekebalan ini dapat diperoleh secara alami dan buatan.</p>
        <ul>
            <li><strong>Kekebalan pasif alami</strong> dapat ditemukan pada bayi setelah menerima antibodi dari ibunya melalui plasenta saat masih berada di dalam kandungan. Jenis kekebalan ini juga dapat diperoleh dengan pemberian air susu pertama (kolostrum) yang mengandung banyak antibodi.</li>
            <li><strong>Kekebalan pasif buatan</strong> diperoleh dengan cara menyuntikkan antibodi yang diekstrak dari satu individu ke tubuh orang lain sebagai serum. Kekebalan pasif ini berlangsung singkat, tetapi berguna untuk penyembuhan secara cepat.</li>
        </ul>
    </div>

    <div class="materi-section">
        <h4>2. Gangguan pada Sistem Pertahanan Tubuh</h4>
        <p>Sistem pertahanan tubuh dapat mengalami gangguan mulai dari yang ringan seperti alergi hingga kasus yang serius seperti penyakit autoimunitas dan penyakit defisiensi kekebalan.</p>

        <h5>• Alergi</h5>
        <p>Alergi atau hipersensitivitas adalah suatu respons imun yang berlebihan terhadap suatu senyawa yang masuk ke tubuh. Senyawa yang dapat menimbulkan alergi disebut alergen.</p>
        <p>Proses terjadinya alergi diawali dengan masuknya alergen ke tubuh. Alergen tersebut akan merangsang sel-sel B plasma untuk menyekresikan antibodi IgE. Ketika alergen masuk ke tubuh untuk kedua kalinya, alergen akan terikat pada IgE yang telah berikatan dengan mastosit, menyebabkan pelepasan histamin yang menimbulkan gejala alergi.</p>

        <h5>• Autoimunitas</h5>
        <p>Autoimunitas merupakan gangguan pada sistem pertahanan tubuh saat antibodi yang diproduksi justru menyerang sel-sel tubuh sendiri karena tidak mampu membedakan sel tubuh sendiri dengan sel asing.</p>
        <p>Autoimunitas dapat disebabkan oleh gagalnya proses pematangan sel T di kelenjar timus. Autoimunitas dapat mengakibatkan beberapa kelainan yaitu diabetes melitus, myasthenia gravis, addison's disease, lupus, dan radang sendi.</p>

        <h5>• HIV - AIDS</h5>
        <p>AIDS (Acquired Immunodeficiency Syndrome) merupakan kumpulan berbagai penyakit yang disebabkan oleh melemahnya sistem kekebalan tubuh. Penyakit ini disebabkan oleh infeksi HIV (Human Immunodeficiency Virus).</p>
        
        <!-- Placeholder untuk gambar -->
        <div class="gambar-materi">
            <img src="../img/struktur_hiv.png" width="60%">
            <p>Gambar 3.2 Struktur Virus HIV</p>
        </div>
        
        <p>Virus tersebut menyerang sel T pembantu yang berfungsi menstimulasi pembentukan jenis sel T lainnya dan sel B plasma. Hal ini mengakibatkan kemampuan tubuh melawan kuman penyakit menjadi berkurang.</p>
        <p>Sel T pembantu menjadi target utama HIV karena pada permukaan selnya terdapat molekul CD4 sebagai reseptor. Infeksi dimulai ketika molekul glikoprotein (gp120) yang terdapat pada permukaan HIV menempel ke reseptor CD4 pada permukaan sel T pembantu.</p>
    </div>
</div>

<p style="text-align: center;">Setelah membaca materi di atas, perhatikan video berikut ini untuk membantu pemahamanmu terhadap materi Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh</p>
<div align="center">
<video width="560" controls>
    <source src="{{ asset('vid/vid-3-jenis-kekebalan-dan-gangguan.mp4') }}" type="video/mp4">
    Terjadi masalah dalam menampilkan video
</video>
</div>

<div style="background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: 30px 0;">
    <h4 style="color: #540B0E; margin-bottom: 15px;">Aktivitas:</h4>
    <p class="materi">Dari materi sebelumnya, identifikasi masalah yang relevan terkait pembahasan Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh. Tentukan apakah identifikasi masalah termasuk atau tidak dalam materi yang diberikan dengan memilih di kolom:</p>

    <table>
        <tr>
            <th>Identifikasi Masalah</th>
            <th>Termasuk</th>
            <th>Tidak Termasuk</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            <td>1. Bagaimana kekebalan aktif dan kekebalan pasif dibentuk oleh tubuh?</td>
            <td><input type="radio" id="radio1_termasuk" name="radio1" value="termasuk" onchange="checkAnswer(1, 'termasuk')"></td>
            <td><input type="radio" id="radio1_tidak_termasuk" name="radio1" value="tidak_termasuk" onchange="checkAnswer(1, 'tidak_termasuk')"></td>
            <td id="keterangan1"></td>
        </tr>
        <tr>
            <td>2. Apa solusi untuk mencegah autoimun?</td>
            <td><input type="radio" id="radio2_termasuk" name="radio2" value="termasuk" onchange="checkAnswer(2, 'termasuk')"></td>
            <td><input type="radio" id="radio2_tidak_termasuk" name="radio2" value="tidak_termasuk" onchange="checkAnswer(2, 'tidak_termasuk')"></td>
            <td id="keterangan2"></td>
        </tr>
        <tr>
            <td>3. Mengapa alergi dapat terjadi?</td>
            <td><input type="radio" id="radio3_termasuk" name="radio3" value="termasuk" onchange="checkAnswer(3, 'termasuk')"></td>
            <td><input type="radio" id="radio3_tidak_termasuk" name="radio3" value="tidak_termasuk" onchange="checkAnswer(3, 'tidak_termasuk')"></td>
            <td id="keterangan3"></td>
        </tr>
        <tr>
            <td>4. Mengapa tubuh rentan sakit jika terinfeksi HIV/AIDS?</td>
            <td><input type="radio" id="radio4_termasuk" name="radio4" value="termasuk" onchange="checkAnswer(4, 'termasuk')"></td>
            <td><input type="radio" id="radio4_tidak_termasuk" name="radio4" value="tidak_termasuk" onchange="checkAnswer(4, 'tidak_termasuk')"></td>
            <td id="keterangan4"></td>
        </tr>
        <tr>
            <td>5. Seberapa lama efek kekebalan pasif bertahan?</td>
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
    <button class="btn-selanjutnya" id="btnSelanjutnya" onclick="lanjutKePengumpulanData3()">
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
        2: 'tidak_termasuk',
        3: 'termasuk',
        4: 'termasuk',
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

    function lanjutKePengumpulanData3() {
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
            nama_aktivitas: 'identifikasi-masalah-3',
            judul_aktivitas: 'Identifikasi Masalah 3 - Jenis Kekebalan dan Gangguan Sistem Pertahanan Tubuh',
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
                        window.location.href = "{{ route('pengumpulan-data-3') }}";
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
                    window.location.href = "{{ route('pengumpulan-data-3') }}";
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