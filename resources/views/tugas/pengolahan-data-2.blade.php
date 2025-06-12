@extends('layouts.app')

@section('title', 'Pengolahan Data')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Siswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .materi {
            font-size: 1.1em;
            color: #555;
        }
        #explanation {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="card-title mb-4" style="color: #9E2A2B">Pengolahan Data</h2>
        <p class="materi">Setelah kamu mengerjakan tugas dan mencermati materi sebelumnya, selanjutnya kerjakan tugas berikut dengan teliti. Sampaikan apa yang kamu ketahui tentang Sistem Komplemen!</p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Komponen Sistem Komplemen</td>
                    <td>
                        <input type="text" class="form-control" id="input-0" placeholder="Ketik jawaban">
                    </td>
                </tr>
                <tr>
                    <td>Fungsi Sistem Komplemen</td>
                    <td>
                        <input type="text" class="form-control" id="input-1" placeholder="Ketik jawaban">
                    </td>
                </tr>
                <tr>
                    <td>Aktivasi Sistem Komplemen</td>
                    <td>
                        <input type="text" class="form-control" id="input-2" placeholder="Ketik jawaban">
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button id="submitBtn" class="btn btn-success">Submit</button>
        
        <div id="explanation" class="mt-4">
            <h4 class="text-success">Jawaban Anda:</h4>
            <p id="explanationText"></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                // Mengumpulkan jawaban dari text box
                var jawaban = [
                    $('#input-0').val(),
                    $('#input-1').val(),
                    $('#input-2').val(),
                    $('#input-3').val(),
                    $('#input-4').val()
                ];

                // Contoh penjelasan yang akan ditampilkan
                var explanation = `
                    <strong>Komponen Sistem Komplemen:</strong> ${jawaban[0] || "Belum diisi"}<br>
                    <strong>Fungsi Sistem Komplemen:</strong> ${jawaban[1] || "Belum diisi"}<br>
                    <strong>Aktivasi Sistem Komplemen:</strong> ${jawaban[2] || "Belum diisi"}<br>
                    
                `;
                
                $('#explanationText').html(explanation);
                $('#explanation').show();
            });
        });
    </script>
</body>
</html>
@endsection