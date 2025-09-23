@extends('layouts.app')

@section('title', 'Pengolahan Data 2')
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
        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #9E2A2B;
            margin-bottom: 25px;
        }
        .petunjuk {
            background-color: #f8f9fa;
            border-left: 4px solid #540B0E;
            padding: 15px;
            margin-bottom: 25px;
        }
        .petunjuk h4 {
            color: #540B0E;
            margin-top: 0;
        }
        .soal {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        .opsi-jawaban {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 10px;
            margin: 15px 0;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
        .opsi-item {
            padding: 5px 10px;
            background-color: #e9ecef;
            border-radius: 4px;
            text-align: center;
        }
        input[type="text"] {
            width: 150px;
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        input.benar {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        input.salah {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .btn-cek {
            background-color: #540B0E;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            display: block;
            margin: 30px auto;
        }
        .btn-cek:hover {
            background-color: #9E2A2B;
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
            margin-top: 20px;
        }
        .btn-selanjutnya:hover {
            background-color: #9E2A2B;
            text-decoration: none;
            color: white;
        }
        .btn-selanjutnya:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .feedback {
            margin-top: 10px;
            font-weight: bold;
        }
        .benar-text {
            color: green;
        }
        .salah-text {
            color: red;
        }
        #kelanjutan {
            display: none;
            margin-top: 30px;
            padding: 20px;
            background-color: #e8f5e9;
            border-radius: 5px;
            text-align: center;
        }
        .hasil-pengecekan {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            text-align: center;
            font-weight: bold;
        }
        .jawaban-container {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pengolahan Data</h2>

    <div class="petunjuk">
        <h4>Petunjuk Pengerjaan</h4>
        <p>a. Lengkapi kalimat berikut dengan jawaban yang sesuai!</p>
        <p>b. Perhatikan opsi jawaban untuk membantumu menentukan jawaban yang benar.</p>
    </div>

    <form id="latihanForm">
        <!-- Soal 1 -->
        <div class="soal">
            <p>1. Mekanisme fagositosis dimulai ketika neutrofil 
                <input type="text" id="jawaban1" name="jawaban1" autocomplete="off"> 
                pada patogen, kemudian membran sel membentuk kantung 
                <input type="text" id="jawaban2" name="jawaban2" autocomplete="off"> 
                yang membawa patogen masuk ke dalam sel.
            </p>
            <div class="feedback" id="feedback1"></div>
        </div>

        <!-- Soal 2 -->
        <div class="soal">
            <p>2. Perbedaan utama antara fagosit dan limfosit adalah fagosit memberikan respon 
                <input type="text" id="jawaban3" name="jawaban3" autocomplete="off">, 
                sedangkan limfosit memberikan respon 
                <input type="text" id="jawaban4" name="jawaban4" autocomplete="off"> 
                terhadap patogen.
            </p>
            <div class="feedback" id="feedback2"></div>
        </div>

        <!-- Soal 3 -->
        <div class="soal">
            <p>3. Limfosit B menghasilkan 
                <input type="text" id="jawaban5" name="jawaban5" autocomplete="off"> 
                yang beredar di cairan tubuh sehingga disebut respon imun 
                <input type="text" id="jawaban6" name="jawaban6" autocomplete="off">, 
                sedangkan limfosit T memiliki 
                <input type="text" id="jawaban7" name="jawaban7" autocomplete="off"> 
                di permukaan sel sehingga disebut respon imun 
                <input type="text" id="jawaban8" name="jawaban8" autocomplete="off">.
            </p>
            <div class="feedback" id="feedback3"></div>
        </div>

        <!-- Soal 4 -->
        <div class="soal">
            <p>4. Makrofag berperan sebagai 
                <input type="text" id="jawaban9" name="jawaban9" autocomplete="off"> 
                karena menampilkan sampel antigen di permukaan membran sel untuk dikenali oleh 
                <input type="text" id="jawaban10" name="jawaban10" autocomplete="off">.
            </p>
            <div class="feedback" id="feedback4"></div>
        </div>

        <!-- Soal 5 -->
        <div class="soal">
            <p>5. Respon imun sekunder lebih cepat dibandingkan respon primer karena adanya 
                <input type="text" id="jawaban11" name="jawaban11" autocomplete="off"> 
                yang dapat langsung mengenali antigen yang pernah menginfeksi sebelumnya.
            </p>
            <div class="feedback" id="feedback5"></div>
        </div>

        <!-- Opsi Jawaban -->
        <div class="opsi-jawaban">
            <div class="opsi-item">menempel</div>
            <div class="opsi-item">fagosom</div>
            <div class="opsi-item">nonspesifik</div>
            <div class="opsi-item">spesifik</div>
            <div class="opsi-item">antibodi</div>
            <div class="opsi-item">humoral</div>
            <div class="opsi-item">reseptor sel T</div>
            <div class="opsi-item">seluler</div>
            <div class="opsi-item">sel penyaji antigen</div>
            <div class="opsi-item">limfosit</div>
            <div class="opsi-item">sel memori</div>
        </div>

        <button type="button" class="btn-cek" onclick="cekJawaban()">Cek Jawaban</button>
    </form>

    <!-- Hasil Pengecekan -->
    <div id="hasilPengecekan" class="hasil-pengecekan" style="display: none;">
        <p>Hasil Pengecekan:</p>
        <p>Jumlah Jawaban Benar: <span id="jumlahBenar">0</span></p>
        <p>Jumlah Jawaban Salah: <span id="jumlahSalah">0</span></p>
    </div>

    <div id="kelanjutan">
        <div style="background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px; padding: 15px; margin: 20px 0;">
            <h4 style="color: #155724; margin-top: 0;">🎉 Selamat!</h4>
            <p style="color: #155724; margin-bottom: 0;">Anda telah berhasil menjawab semua pertanyaan dengan benar. Kini Anda dapat melanjutkan ke tahap pembelajaran selanjutnya.</p>
        </div>
        
        <button class="btn-selanjutnya" id="btnSelanjutnya" onclick="lanjutKeVerifikasi2()">
            Selanjutnya
        </button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Setup CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Jawaban yang benar
    const correctAnswers = {
        1: "menempel",
        2: "fagosom",
        3: "nonspesifik",
        4: "spesifik",
        5: "antibodi",
        6: "humoral",
        7: "reseptor sel T",
        8: "seluler",
        9: "sel penyaji antigen",
        10: "limfosit",
        11: "sel memori"
    };

    // Status jawaban benar
    const correctStatus = {
        1: false,
        2: false,
        3: false,
        4: false,
        5: false,
        6: false,
        7: false,
        8: false,
        9: false,
        10: false,
        11: false
    };

    // Fungsi untuk memeriksa jawaban
    function cekJawaban() {
        let allCorrect = true;
        let jumlahBenar = 0;
        let jumlahSalah = 0;
        
        // Reset semua kelas input
        for (let i = 1; i <= 11; i++) {
            const inputElement = document.getElementById(`jawaban${i}`);
            inputElement.classList.remove('benar', 'salah');
        }
        
        // Periksa setiap jawaban
        for (let i = 1; i <= 11; i++) {
            const userAnswer = document.getElementById(`jawaban${i}`).value.trim().toLowerCase();
            const correctAnswer = correctAnswers[i].toLowerCase();
            const inputElement = document.getElementById(`jawaban${i}`);
            const feedbackElement = document.getElementById(`feedback${Math.ceil(i/2)}`);
            
            if (userAnswer === correctAnswer) {
                correctStatus[i] = true;
                jumlahBenar++;
                inputElement.classList.add('benar');
                if (feedbackElement) {
                    feedbackElement.innerHTML = `<span class="benar-text">Jawaban benar!</span>`;
                }
            } else {
                correctStatus[i] = false;
                jumlahSalah++;
                allCorrect = false;
                inputElement.classList.add('salah');
                if (feedbackElement) {
                    feedbackElement.innerHTML = `<span class="salah-text">Jawaban salah. Coba lagi!</span>`;
                }
            }
        }
        
        // Tampilkan hasil pengecekan
        document.getElementById('hasilPengecekan').style.display = 'block';
        document.getElementById('jumlahBenar').textContent = jumlahBenar;
        document.getElementById('jumlahSalah').textContent = jumlahSalah;
        
        // Jika semua jawaban benar, tampilkan tombol selanjutnya
        if (allCorrect) {
            document.getElementById('kelanjutan').style.display = 'block';
        } else {
            document.getElementById('kelanjutan').style.display = 'none';
        }
    }

    // Fungsi untuk melanjutkan ke halaman verifikasi-2
    function lanjutKeVerifikasi2() {
        // Hitung skor
        const correctCount = Object.values(correctStatus).filter(val => val).length;
        const totalQuestions = Object.keys(correctAnswers).length;
        
        // Buat detail jawaban
        const detailJawaban = {};
        for (let i = 1; i <= totalQuestions; i++) {
            const userAnswer = document.getElementById(`jawaban${i}`).value.trim();
            detailJawaban[i] = {
                user_answer: userAnswer,
                correct_answer: correctAnswers[i],
                is_correct: correctStatus[i]
            };
        }

        // Disable tombol untuk prevent double click
        document.getElementById('btnSelanjutnya').disabled = true;
        document.getElementById('btnSelanjutnya').textContent = 'Menyimpan...';
        
        // Simpan progres
        simpanProgres(correctCount, totalQuestions, detailJawaban);
    }

    // Fungsi untuk menyimpan progres
function simpanProgres(skor, totalSoal, detailJawaban) {
    console.log('Memulai simpan progres...');
    console.log('Data yang akan dikirim:', {
        skor: skor,
        totalSoal: totalSoal,
        detailJawaban: detailJawaban
    });

    // Data yang akan dikirim
    const data = {
        nama_aktivitas: 'pengolahan-data-2',
        judul_aktivitas: 'Pengolahan Data 2 - Latihan Isian Sistem Pertahanan Tubuh',
        skor: skor,
        total_soal: totalSoal,
        detail_jawaban: detailJawaban
    };

    // Disable tombol untuk prevent double click
    document.getElementById('btnSelanjutnya').disabled = true;
    document.getElementById('btnSelanjutnya').textContent = 'Menyimpan...';
    
    // Kirim data via AJAX
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
            
            // Tampilkan notifikasi sukses
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Progres telah disimpan. Mengarahkan ke halaman berikutnya...',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
            
            // Redirect setelah delay
            setTimeout(function() {
                window.location.href = "{{ route('verifikasi-2') }}";
            }, 2000);
        },
        error: function(xhr, status, error) {
            console.error('Error menyimpan progres:', error);
            console.error('Status:', status);
            console.error('Response:', xhr.responseText);
            
            // Reset tombol
            document.getElementById('btnSelanjutnya').disabled = false;
            document.getElementById('btnSelanjutnya').textContent = 'Selanjutnya';
            
            // Tampilkan pesan error yang lebih informatif
            let errorMessage = 'Progres gagal disimpan. ';
            
            if (xhr.status === 0) {
                errorMessage += 'Tidak dapat terhubung ke server. Periksa koneksi internet Anda.';
            } else if (xhr.status === 404) {
                errorMessage += 'Endpoint API tidak ditemukan.';
            } else if (xhr.status === 500) {
                errorMessage += 'Terjadi kesalahan server. Silakan coba lagi nanti.';
            } else {
                errorMessage += 'Silakan coba lagi atau hubungi administrator.';
            }
            
            // Tampilkan notifikasi error yang lebih baik
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Menyimpan',
                    html: errorMessage + '<br><br>Apakah Anda ingin tetap melanjutkan ke aktivitas berikutnya?',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Lanjutkan',
                    cancelButtonText: 'Coba Lagi',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('verifikasi-2') }}";
                    }
                });
            } else {
                if (confirm(errorMessage + '\n\nApakah Anda ingin tetap melanjutkan ke aktivitas berikutnya?')) {
                    window.location.href = "{{ route('verifikasi-2') }}";
                }
            }
        }
    });
}

    // Event listener untuk input fields (agar bisa submit dengan Enter)
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    cekJawaban();
                }
            });
        });
    });
</script>

</body>

@endsection