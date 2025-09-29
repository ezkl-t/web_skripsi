@extends('layouts.app')

@section('title', 'Pengumpulan Data')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tugas Siswa - Pengumpulan Data 2</title>
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
        #result-message {
            display: none;
            margin-top: 20px;
        }
        .correct {
            background-color: #d4edda !important;
        }
        .incorrect {
            background-color: #f8d7da !important;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="card-title mb-4" style="color: #9E2A2B">Pengumpulan Data</h2>
        <p class="materi">Setelah kamu mengamati video tadi dan mengerjakan tugas sebelumnya, selanjutnya kerjakan tugas berikut dengan cermat. Klasifikasikan beberapa fungsi sistem pertahanan tubuh terhadap penyakit di tabel bagian sebelah kiri  berdasarkan komponen apa yang terlibat!</p>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fungsi</th>
                    <th>Komponen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Menghasilkan antibodi yang beredar di plasma darah</td>
                    <td>
                        <select class="form-control" id="list-0">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="neutrofil">Neutrofil</option>
                            <option value="makrofag">Makrofag</option>
                            <option value="limfosit-b">Limfosit B</option>
                            <option value="sel-t-pembantu">Sel T pembantu</option>
                            <option value="sel-t-sitotoksik">Sel T sitotoksik/pembunuh</option>
                            <option value="sel-memori">Sel memori</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Menghancurkan sel tubuh yang terinfeksi virus</td>
                    <td>
                        <select class="form-control" id="list-1">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="neutrofil">Neutrofil</option>
                            <option value="makrofag">Makrofag</option>
                            <option value="limfosit-b">Limfosit B</option>
                            <option value="sel-t-pembantu">Sel T pembantu</option>
                            <option value="sel-t-sitotoksik">Sel T sitotoksik/pembunuh</option>
                            <option value="sel-memori">Sel memori</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sel fagosit dengan masa hidup singkat, membentuk nanah</td>
                    <td>
                        <select class="form-control" id="list-2">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="neutrofil">Neutrofil</option>
                            <option value="makrofag">Makrofag</option>
                            <option value="limfosit-b">Limfosit B</option>
                            <option value="sel-t-pembantu">Sel T pembantu</option>
                            <option value="sel-t-sitotoksik">Sel T sitotoksik/pembunuh</option>
                            <option value="sel-memori">Sel memori</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Sel penyaji antigen (APC) yang memecah patogen</td>
                    <td>
                        <select class="form-control" id="list-3">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="neutrofil">Neutrofil</option>
                            <option value="makrofag">Makrofag</option>
                            <option value="limfosit-b">Limfosit B</option>
                            <option value="sel-t-pembantu">Sel T pembantu</option>
                            <option value="sel-t-sitotoksik">Sel T sitotoksik/pembunuh</option>
                            <option value="sel-memori">Sel memori</option>
                        </select>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mensekresi sitokin untuk mengaktifkan sel B dan makrofag</td>
                    <td>
                        <select class="form-control" id="list-4">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="neutrofil">Neutrofil</option>
                            <option value="makrofag">Makrofag</option>
                            <option value="limfosit-b">Limfosit B</option>
                            <option value="sel-t-pembantu">Sel T pembantu</option>
                            <option value="sel-t-sitotoksik">Sel T sitotoksik/pembunuh</option>
                            <option value="sel-memori">Sel memori</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Menyimpan "ingatan" tentang antigen untuk respon cepat</td>
                    <td>
                        <select class="form-control" id="list-5">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="neutrofil">Neutrofil</option>
                            <option value="makrofag">Makrofag</option>
                            <option value="limfosit-b">Limfosit B</option>
                            <option value="sel-t-pembantu">Sel T pembantu</option>
                            <option value="sel-t-sitotoksik">Sel T sitotoksik/pembunuh</option>
                            <option value="sel-memori">Sel memori</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button id="submitBtn" class="btn" style="background-color: #9E2A2B; color: #ffffff" onclick="checkAnswers()">
            <i class="fas fa-check-circle"></i> Cek Jawaban
        </button>
        
        <!-- Area untuk menampilkan hasil -->
        <div id="result-message" class="alert mt-4">
            <h5 id="result-title"></h5>
            <div id="result-details"></div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Optional: SweetAlert2 untuk notifikasi yang lebih baik -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Kunci jawaban yang benar
        const answerKey = [
            'neutrofil',
            'makrofag',
            'limfosit-b',
            'sel-t-pembantu',
            'sel-t-sitotoksik',
            'sel-memori'          
        ];
        
        function checkAnswers() {
            let correctCount = 0;
            let incorrectCount = 0;
            let unansweredCount = 0;
            let explanations = [];
            let detailJawaban = {};
            
            // Reset warna baris
            $('tbody tr').removeClass('correct incorrect');
            
            // Periksa setiap jawaban
            for (let i = 0; i < answerKey.length; i++) {
                const selectedValue = $('#list-' + i).val();
                const row = $('#list-' + i).closest('tr');
                const questionText = row.find('td:first').text().trim();
                
                detailJawaban['soal-' + (i+1)] = {
                    pertanyaan: questionText,
                    jawaban_user: selectedValue,
                    jawaban_benar: answerKey[i],
                    status: ''
                };
                
                if (selectedValue === answerKey[i]) {
                    correctCount++;
                    row.addClass('correct');
                    explanations.push(`<li>Soal ${i+1}: <span class="text-success"><i class="fas fa-check"></i> Benar</span></li>`);
                    detailJawaban['soal-' + (i+1)].status = 'benar';
                } else if (selectedValue === '0') {
                    unansweredCount++;
                    explanations.push(`<li>Soal ${i+1}: <span class="text-warning"><i class="fas fa-exclamation-triangle"></i> Belum dijawab</span></li>`);
                    detailJawaban['soal-' + (i+1)].status = 'belum_dijawab';
                } else {
                    incorrectCount++;
                    row.addClass('incorrect');
                    const correctAnswer = $('#list-' + i + ' option[value="' + answerKey[i] + '"]').text();
                    explanations.push(`<li>Soal ${i+1}: <span class="text-danger"><i class="fas fa-times"></i> Salah</span></li>`);
                    detailJawaban['soal-' + (i+1)].status = 'salah';
                }
            }
            
            // Tampilkan hasil
            const resultMessage = document.getElementById('result-message');
            const resultTitle = document.getElementById('result-title');
            const resultDetails = document.getElementById('result-details');
            
            resultMessage.style.display = 'block';
            
            if (correctCount === answerKey.length) {
                resultMessage.className = 'alert alert-success';
                resultTitle.innerHTML = '<i class="fas fa-trophy"></i> Jawaban benar!';
                resultDetails.innerHTML = `
                    <p></p>
                    <p>Progres kamu sedang disimpan...</p>
                `;
                
                // Simpan progres
                simpanProgres(correctCount, answerKey.length, detailJawaban);
                
            } else if (unansweredCount > 0) {
                resultMessage.className = 'alert alert-warning';
                resultTitle.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Belum Lengkap';
                resultDetails.innerHTML = `
                    <p><strong>Jawaban benar:</strong> ${correctCount}</p>
                    <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                    <p><strong>Belum dijawab:</strong> ${unansweredCount}</p>
                    <p class="mb-0"><em>Silakan lengkapi semua jawaban terlebih dahulu!</em></p>
                `;
            } else {
                resultMessage.className = 'alert alert-danger';
                resultTitle.innerHTML = '<i class="fas fa-times-circle"></i> Masih ada yang keliru';
                resultDetails.innerHTML = `
                    <p><strong>Jawaban benar:</strong> ${correctCount} dari ${answerKey.length}</p>
                    <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                    <h6 class="mt-3">Detail Jawaban:</h6>
                    <ul>${explanations.join('')}</ul>
                    <p class="mb-0"><em>Perhatikan kembali jawaban yang salah dan coba lagi!</em></p>
                `;
                
                // Tetap simpan progres meskipun belum sempurna
                simpanProgres(correctCount, answerKey.length, detailJawaban);
            }
            
            // Scroll ke hasil
            resultMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        
        // Fungsi untuk menyimpan progres
        function simpanProgres(skor, totalSoal, detailJawaban) {
            console.log('Memulai simpan progres Pengumpulan Data 2...');
            console.log('Data yang akan dikirim:', {
                skor: skor,
                totalSoal: totalSoal,
                detailJawaban: detailJawaban
            });
            
            // Data yang akan dikirim
            const data = {
                nama_aktivitas: 'pengumpulan-data-2',
                judul_aktivitas: 'Pengumpulan Data 2',
                skor: skor,
                total_soal: totalSoal,
                detail_jawaban: detailJawaban
            };
            
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
                    
                    // Update pesan hasil
                    const resultDetails = document.getElementById('result-details');
                    if (skor === totalSoal) {
                        resultDetails.innerHTML = `
                            <p>Kamu telah berhasil menyelesaikan Pengumpulan Data 2 dengan sempurna!</p>
                            <p><strong>Progres berhasil disimpan!</strong></p>
                        `;
                        
                        // Tampilkan notifikasi sukses
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Jawaban Benar!',
                                text: '',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error menyimpan progres:', error);
                    console.error('Response:', xhr.responseText);
                    
                    // Tampilkan pesan error
                    const resultDetails = document.getElementById('result-details');
                    resultDetails.innerHTML += '<br><small class="text-danger">Progres gagal disimpan, tetapi jawaban kamu tetap tercatat.</small>';
                }
            });
        }
        
        // Reset warna saat user mengubah pilihan
        $(document).ready(function() {
            $('select').on('change', function() {
                $(this).closest('tr').removeClass('correct incorrect');
            });
        });
    </script>
</body>
</html>
@endsection