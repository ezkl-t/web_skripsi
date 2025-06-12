@extends('layouts.app')

@section('title', 'Verifikasi')
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
        <h2 class="card-title text-primary mb-4">Verifikasi 3</h2>
        <p class="materi">Setelah kamu mengamati video tadi dan mengerjakan tugas sebelumnya, selanjutnya kerjakan tugas berikut dengan cermat. Pilih jawaban yang benar sesuai dengan yang ditunjukkan oleh gambar!</p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Penjelasan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="../img/imun_aktif.jpg" width="30%"></td>
                    <td>
                        <select class="form-control" id="list-0">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="tahapanfagosit">HIV</option>
                            <option value="limfositb">Alergi</option>
                            <option value="limfositt">Imunitas Aktif</option>
                            <option value="limfositt">Imunitas Pasif</option>
                            <option value="limfositt">Autoimun</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="../img/struktur_hiv.png" width="30%"></td>
                    <td>
                        <select class="form-control" id="list-1">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="tahapanfagosit">HIV</option>
                            <option value="limfositb">Alergi</option>
                            <option value="limfositt">Imunitas Aktif</option>
                            <option value="limfositt">Imunitas Pasif</option>
                            <option value="limfositt">Autoimun</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="../img/imun_pasif.jpg" width="30%"></td>
                    <td>
                        <select class="form-control" id="list-1">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="tahapanfagosit">HIV</option>
                            <option value="limfositb">Alergi</option>
                            <option value="limfositt">Imunitas Aktif</option>
                            <option value="limfositt">Imunitas Pasif</option>
                            <option value="limfositt">Autoimun</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><img src="../img/penyakit_autoimun.jpg" width="30%"></td>
                    <td>
                        <select class="form-control" id="list-1">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="tahapanfagosit">HIV</option>
                            <option value="limfositb">Alergi</option>
                            <option value="limfositt">Imunitas Aktif</option>
                            <option value="limfositt">Imunitas Pasif</option>
                            <option value="limfositt">Autoimun</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button id="submitBtn" class="btn btn-primary">Cek Jawaban</button>
        
        <div id="explanation" class="mt-4">
            <h4 class="text-success">Skor:</h4>
            <p id="explanationText"></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {
                // Contoh penjelasan yang akan ditampilkan
                var explanation = `
                    <strong>Benar:</strong> <br>
                    <strong>Salah:</strong> <br>
                    
                `;
                
                $('#explanationText').html(explanation);
                $('#explanation').show();
            });
        });
    </script>
</body>
</html>
@endsection