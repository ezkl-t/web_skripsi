@extends('layouts.app')

@section('title', 'Identifikasi Masalah')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

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
        }
        .materi {
            text-align: justify; 
        }
        
    </style>
</head>
<body>

<h2 class="card-title mb-4" style="color:#E09F3E"></h2>
                
                
<p style="text-align: center;">Sebelum melanjutkan lebih lanjut ke dalam materi, perhatikan  video berikut ini untuk membantu pemahamanmu terhadap materi Mekanisme Sistem Pertahan Tubuh</p>
<div  align="center">
<video width="560" controls>
    <source src="{{ asset('vid/vid-3-jenis-kekebalan-dan-gangguan.mp4') }}" type="video/mp4">
    Terjadi masalah dalam menampilan video
</video>
</div>
<p class="materi">Setelah menyimak video di atas, perhatikan identifikasi masalah di bawah ini yang relevan dengan solusi permasalahan pembahasan Mekanisme Sistem Pertahanan Tubuh: </p>

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

<div id="kelanjutan">
    <p>Berdasarkan cara mempertahankan diri dari penyakit, sistem pertahanan tubuh digolongkan menjadi dua, yaitu sistem pertahanan tubuh nonspesifik dan sistem pertahanan tubuh spesifik.</p>

    <img class="gambar-materi" src="../img/lapis_pertahanan.png">

    <h4>1. Pertahanan Non-Spesifik</h4>
    <p class="materi">Imunitas adalah kemampuan tubuh secara alami untuk melawan mikroorganisme atau racun yang masuk ke dalam jaringan dan organ tubuh. Sistem imun memiliki berbagai fungsi, seperti melindungi tubuh dari benda asing, membersihkan sel-sel mati, memperbaiki jaringan yang rusak, serta mencegah pertumbuhan sel kanker dan tumor.</p>
    <h5>a. Pertahanan Fisik</h5>
    <p class="materi">Lapisan pelindung yang menutupi permukaan tubuh berfungsi sebagai pembatas antara tubuh dan lingkungan eksternal.</p>
    <h5>b. Pertahanan Mekanis</h5>
    <p class="materi">Pertahanan tubuh secara mekanis dilakukan oleh rambut hidung dan silia pada trakea. Rambut hidung berfungsi menyaring udara yang dihirup dari partikel-partikel berbahaya maupun mikrobia</p>
    <h5>c. Pertahanan Kimiawi</h5>
    <p class="materi">Pertahanan kimia dilakukan melalui pengeluaran berbagai senyawa kimia oleh kelenjar tubuh untuk mengurangi jumlah patogen yang masuk.</p>
    <h5>d. Pertahanan Biologis</h5>
    <p class="materi">Pertahanan tubuh secara biologis dilakukan oleh populasi bakteri tidak berbahaya yang hidup di kulit dan membran mukosa. </p>
    <h5>e. Respon Peradangan</h5>
    <p class="materi">Pertahanan tubuh secara biologis dilakukan oleh populasi bakteri tidak berbahaya yang hidup di kulit dan membran mukosa. </p>
    
</div>

<script>
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

    function checkAnswer(questionNumber, selectedAnswer) {
        const keteranganElement = document.getElementById(`keterangan${questionNumber}`);
        
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
        } else {
            document.getElementById('kelanjutan').style.display = 'none';
        }
    }
</script>

</body>

@endsection


{{-- @extends('layouts.app')

@section('title', 'Stimulus')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')


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

    .materi-tambahan {
            display: none; /* Sembunyikan materi tambahan secara default */
            margin-top: 20px;
            padding: 15px;
            background-color: #e8f5e9;
            border-left: 5px solid #4CAF50;
        }
        .materi-tambahan h3 {
            margin-top: 0;
        }
        .materi-tambahan p {
            margin: 10px 0;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
</style>
</head>
<body>
    <div  align="center">
        <p style="text-align: center;">Sebelum melanjutkan lebih lanjut ke dalam materi, perhatikan  video berikut ini untuk membantu pemahamanmu terhadap materi Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahan Tubuh!</p>
        <video width="560" controls>
            <source src="vid/vid-2-komponen-pertahanan.mp4" type="video/mp4">
            Terjadi masalah dalam menampilan video
        </video>
    </div>
<p class="materi">
    Dari video tersebut, identifikasi masalah yang relevan untuk ditemukan pada solusi permasalahan pembahasan Imunitas Aktif dan Pasif!
</p>
<table>
<tr>
    <th>Identifikasi Masalah</th>
    <th>Termasuk</th>
    <th>Tidak Termasuk</th>
    <th>Keterangan</th>
</tr>
<tr>
    <td>1. Apa itu kekebalan aktif?</td>
    <td><input type="radio" id="radio1_termasuk" name="radio1" value="termasuk"></td>
    <td><input type="radio" id="radio1_tidak_termasuk" name="radio1" value="tidak_termasuk"></td>
</tr>
<tr>
    <td>2. Bagaimana cara kerja antibodi dalam kekebalan aktif?</td>
    <td><input type="radio" id="radio2_termasuk" name="radio2" value="termasuk"></td>
    <td><input type="radio" id="radio2_tidak_termasuk" name="radio2" value="tidak_termasuk"></td>
</tr>
<tr>
    <td>3. Apa perbedaan kekebalan buatan dan sintetis?</td>
    <td><input type="radio" id="radio3_termasuk" name="radio3" value="tidak-termasuk"></td>
    <td><input type="radio" id="radio3_tidak_termasuk" name="radio3" value="tidak_termasuk"></td>
</tr>
<tr>
    <td>4. Seberapa lama efek kekebalan pasif bertahan?</td>
    <td><input type="radio" id="radio4_termasuk" name="radio4" value="termasuk"></td>
    <td><input type="radio" id="radio4_tidak_termasuk" name="radio4" value="tidak_termasuk"></td>
</tr>
<tr>
    <td>5. Mengapa sel memori penting dalam kekebalan aktif?</td>
    <td><input type="radio" id="radio5_termasuk" name="radio5" value="termasuk"></td>
    <td><input type="radio" id="radio5_tidak_termasuk" name="radio5" value="tidak_termasuk"></td>
</tr>
</table>

<button onclick="tampilkanMateri()">Submit untuk menampilkan penjelasan</button>

<div id="materiTambahan" class="materi-tambahan">
    <h3>Penjelasan Tambahan:</h3>
    
</div>

<script>
    function tampilkanMateri() {
        // Tampilkan materi tambahan
        const materi = document.getElementById("materiTambahan");
        materi.style.display = "block";
    }
</script>
@endsection --}}