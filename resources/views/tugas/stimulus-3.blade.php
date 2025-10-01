@extends('layouts.app')

@section('title', 'Stimulus')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')
<style>
    .gambar-materi {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            max-width: 500px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin: 20px auto;
        }
</style>
<p class="materi">
    &nbsp &nbsp &nbsp Setelah membaca mekanisme dan komponen sistem pertahanan tubuh, apakah kamu tahu bahwa kekebalan juga terdapat jenisnya? Apakah kamu tahu bahwa sistem pertahanan tubuh juga dapat mengalami gangguan? Pelajari video berikut untuk mengetahuinya!
    </p>

<div  align="center">
<img src="../img/kelainan-imun.jpg" class="gambar-materi" alt="Leukosit (Sel Darah Putih)">
<div class="image-caption">Gambar 3.1 Alergi Sebagai Salah Satu Contoh Kelainan Imun</div>


@endsection