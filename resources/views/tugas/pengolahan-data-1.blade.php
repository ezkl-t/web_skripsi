@extends('layouts.app')

@section('title', 'Pengolahan Data')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        .correct {
            background-color: #d4edda !important;
        }
        .incorrect {
            background-color: #f8d7da !important;
        }
        .progress-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050;
            display: none;
        }
    </style>
</head>
<body>
    <!-- Progress Notification -->
    <div id="progressNotification" class="progress-notification">
        <div class="alert alert-success" role="alert">
            <i class="fas fa-check-circle"></i>
            <strong>Selamat!</strong> Progres Anda telah tersimpan.
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="card-title text-primary mb-4">Pengolahan Data</h2>
        <p class="materi">Setelah kamu mengamati video dan mengerjakan tugas tadi, selanjutnya kerjakan tugas berikut dengan cermat.</p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Komponen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sistem imun spesifik yang berperan jika terkena infeksi virus.</td>
                    <td>
                        <select class="form-control" id="list-0">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="mastosit">Mastosit</option>
                            <option value="selT">Sel T</option>
                            <option value="lisozim">Lisozim</option>
                            <option value="bakteritakberbahaya">Bakteri Tidak Berbahaya</option>
                            <option value="mukosa">Membran Mukosa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sel yang berperan dalam mekanisme inflamasi atau peradangan pada luka.</td>
                    <td>
                        <select class="form-control" id="list-1">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="mastosit">Mastosit</option>
                            <option value="selT">Sel T</option>
                            <option value="lisozim">Lisozim</option>
                            <option value="bakteritakberbahaya">Bakteri Tidak Berbahaya</option>
                            <option value="mukosa">Membran Mukosa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Salah satu enzim pertahanan kimiawi pada sistem pertahanan nonspesifik.</td>
                    <td>
                        <select class="form-control" id="list-2">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="mastosit">Mastosit</option>
                            <option value="selT">Sel T</option>
                            <option value="lisozim">Lisozim</option>
                            <option value="bakteritakberbahaya">Bakteri Tidak Berbahaya</option>
                            <option value="mukosa">Membran Mukosa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Yang berperan dalam pertahanan biologis.</td>
                    <td>
                        <select class="form-control" id="list-3">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="mastosit">Mastosit</option>
                            <option value="selT">Sel T</option>
                            <option value="lisozim">Lisozim</option>
                            <option value="bakteritakberbahaya">Bakteri Tidak Berbahaya</option>
                            <option value="mukosa">Membran Mukosa</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Bagian membran pertahanan biologis.</td>
                    <td>
                        <select class="form-control" id="list-4">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="mastosit">Mastosit</option>
                            <option value="selT">Sel T</option>
                            <option value="lisozim">Lisozim</option>
                            <option value="bakteritakberbahaya">Bakteri Tidak Berbahaya</option>
                            <option value="mukosa">Membran Mukosa</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button id="submitBtn" class="btn btn-primary">Cek Jawaban</button>
        
        <div id="explanation" class="mt-4">
            <h4 class="text-success">Hasil:</h4>
            <p id="scoreText"></p>
            <h4 class="text-success mt-3">Penjelasan:</h4>
            <p id="explanationText"></p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Setup CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#submitBtn').click(function() {
                // Answer key
                const answerKey = [
                    'selT',    // Question 0
                    'mastosit',     // Question 1
                    'lisozim',    // Question 2
                    'bakteritakberbahaya',   // Question 3
                    'mukosa'        // Question 4
                ];
                
                let correctCount = 0;
                let incorrectCount = 0;
                let explanations = [];
                let userAnswers = [];
                
                // Check each answer
                for (let i = 0; i < answerKey.length; i++) {
                    const selectedValue = $('#list-' + i).val();
                    const row = $('#list-' + i).closest('tr');
                    
                    // Store user answer
                    userAnswers.push({
                        question: i + 1,
                        selected: selectedValue,
                        correct: answerKey[i],
                        is_correct: selectedValue === answerKey[i]
                    });
                    
                    if (selectedValue === answerKey[i]) {
                        correctCount++;
                        row.addClass('correct');
                        row.removeClass('incorrect');
                        explanations.push(`<li>Pertanyaan ${i+1}: <span class="text-success">Benar</span>.</li>`);
                    } else if (selectedValue === '0') {
                        incorrectCount++;
                        row.removeClass('correct incorrect');
                        explanations.push(`<li>Pertanyaan ${i+1}: <span class="text-warning">Belum dijawab</span>.</li>`);
                    } else {
                        incorrectCount++;
                        row.addClass('incorrect');
                        row.removeClass('correct');
                        explanations.push(`<li>Pertanyaan ${i+1}: <span class="text-danger">Salah.</span> </li>`);
                    }
                }
                
                // Display score
                $('#scoreText').html(`Anda menjawab <strong>${correctCount} benar</strong> dan <strong>${incorrectCount} salah</strong> dari ${answerKey.length} pertanyaan.`);
                
                // Display explanations
                $('#explanationText').html('<ul>' + explanations.join('') + '</ul>');
                
                // Show the explanation div
                $('#explanation').show();
                
                // Scroll to explanation
                $('html, body').animate({
                    scrollTop: $('#explanation').offset().top
                }, 500);

                // Simpan progres ke database via AJAX
                simpanProgres(correctCount, answerKey.length, userAnswers);
            });

            function simpanProgres(skor, totalSoal, detailJawaban) {
                const dataProgres = {
                    nama_aktivitas: 'pengolahan-data-1',
                    judul_aktivitas: 'Pengolahan Data 1',
                    skor: skor,
                    total_soal: totalSoal,
                    detail_jawaban: detailJawaban
                };

                console.log('Mengirim data progres:', dataProgres);

                $.ajax({
                    url: '{{ route("progres.simpan") }}',
                    method: 'POST',
                    data: dataProgres,
                    dataType: 'json',
                    beforeSend: function(xhr) {
                        console.log('Mengirim request ke:', '{{ route("progres.simpan") }}');
                    },
                    success: function(response) {
                        console.log('Response diterima:', response);
                        // if (response.success) {
                        //     console.log('Progres berhasil disimpan:', response.data);
                            
                        //     // Show success notification if completed
                        //     if (response.data.status === 'completed') {
                        //         showProgressNotification();
                        //     }
                            
                        //     // Show alert for confirmation
                        //     alert('Progres berhasil disimpan! Status: ' + response.data.status);
                        // } else {
                        //     console.error('Gagal menyimpan progres:', response.message);
                        //     alert('Gagal menyimpan progres: ' + response.message);
                        // }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error menyimpan progres:', {
                            status: status,
                            error: error,
                            responseText: xhr.responseText,
                            statusCode: xhr.status
                        });
                        
                        try {
                            const errorResponse = JSON.parse(xhr.responseText);
                            alert('Error: ' + errorResponse.message);
                        } catch(e) {
                            alert('Terjadi kesalahan saat menyimpan progres. Status: ' + xhr.status);
                        }
                    }
                });
            }

            function showProgressNotification() {
                $('#progressNotification').fadeIn().delay(3000).fadeOut();
            }
        });
    </script>
</body>
</html>

@endsection