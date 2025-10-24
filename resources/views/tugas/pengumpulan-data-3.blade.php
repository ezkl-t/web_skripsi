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
    <title>Pengumpulan Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .materi {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 20px;
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
        .btn-next {
            background-color: #28a745;
            color: white;
            margin-top: 10px;
        }
        .btn-next:hover {
            background-color: #218838;
        }
        .question-number {
            font-weight: bold;
            width: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="card-title mb-4" style="color: #9E2A2B">Pengumpulan Data</h2>
        <p class="materi">Setelah kamu menonton video dan membaca materi sebelumnya, sekarang kerjakan tugas berikut! Cocokkan pernyataan dengan jawaban yang tepat dengan memilih pilihan yang sesuai.</p>

        <p class="materi">Silakan akses bahan baca untuk membantu mengerjakan tugas ini</p>
        <div class="text-center mt-4">
            <button type="button" class="btn btn-info btn-lg" onclick="openPdfModal()">
                <i class="fas fa-book me-2"></i>Buka Bahan Bacaan
            </button>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th>Pernyataan</th>
                    <th width="30%">Pilihan Jawaban</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="question-number">1.</td>
                    <td>Imunitas yang terbentuk setelah terinfeksi cacar air</td>
                    <td>
                        <select class="form-control" id="list-0">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">2.</td>
                    <td>Antibodi yang diperoleh bayi melalui ASI</td>
                    <td>
                        <select class="form-control" id="list-1">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">3.</td>
                    <td>Perlindungan yang diperoleh melalui vaksin COVID-19</td>
                    <td>
                        <select class="form-control" id="list-2">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">4.</td>
                    <td>Kondisi sistem imun menyerang sel-sel tubuh sendiri</td>
                    <td>
                        <select class="form-control" id="list-3">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">5.</td>
                    <td>Respon berlebihan terhadap debu atau serbuk sari</td>
                    <td>
                        <select class="form-control" id="list-4">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">6.</td>
                    <td>Virus yang menyerang limfosit T</td>
                    <td>
                        <select class="form-control" id="list-5">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">7.</td>
                    <td>Penyakit autoimun yang menyerang persendian</td>
                    <td>
                        <select class="form-control" id="list-6">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">8.</td>
                    <td>Pemberian plasma darah dari orang sehat</td>
                    <td>
                        <select class="form-control" id="list-7">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">9.</td>
                    <td>Kolostrum mengandung banyak zat ini</td>
                    <td>
                        <select class="form-control" id="list-8">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="question-number">10.</td>
                    <td>Penyakit autoimun yang merusak sel penghasil insulin</td>
                    <td>
                        <select class="form-control" id="list-9">
                            <option value="0" selected>Pilih Jawaban</option>
                            <option value="a">a. Alergi</option>
                            <option value="b">b. HIV</option>
                            <option value="c">c. Imunitas pasif alami</option>
                            <option value="d">d. Rheumatoid arthritis</option>
                            <option value="e">e. Imunitas aktif buatan</option>
                            <option value="f">f. Antibodi</option>
                            <option value="g">g. Diabetes melitus tipe 1</option>
                            <option value="h">h. Penyakit autoimun</option>
                            <option value="i">i. Imunitas aktif alami</option>
                            <option value="j">j. Imunitas pasif buatan</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <button id="submitBtn" class="btn" style="background-color: #9E2A2B; color: #ffffff" onclick="checkAnswers()">
            <i class="fas fa-check-circle"></i> Cek Jawaban
        </button>
        
        <!-- Tombol Selanjutnya (akan muncul jika semua jawaban benar) -->
        <a id="nextBtn" href="{{ url('/tugas/pengolahan-data-3') }}" class="btn btn-next" style="display: none;">
            <i class="fas fa-arrow-right"></i> Lanjut ke Pengolahan Data 3
        </a>
        
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
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Kunci jawaban yang benar (sesuai dengan instruksi)
        const answerKey = [
            'i',  // 1. Imunitas aktif alami
            'c',  // 2. Imunitas pasif alami
            'e',  // 3. Imunitas aktif buatan
            'h',  // 4. Penyakit autoimun
            'a',  // 5. Alergi
            'b',  // 6. HIV
            'd',  // 7. Rheumatoid arthritis
            'j',  // 8. Imunitas pasif buatan
            'f',  // 9. Antibodi
            'g'   // 10. Diabetes melitus tipe 1
        ];
        
        // Teks jawaban yang benar untuk ditampilkan
        const answerTexts = {
            'a': 'Alergi',
            'b': 'HIV',
            'c': 'Imunitas pasif alami',
            'd': 'Rheumatoid arthritis',
            'e': 'Imunitas aktif buatan',
            'f': 'Antibodi',
            'g': 'Diabetes melitus tipe 1',
            'h': 'Penyakit autoimun',
            'i': 'Imunitas aktif alami',
            'j': 'Imunitas pasif buatan'
        };
        
        function checkAnswers() {
            let correctCount = 0;
            let incorrectCount = 0;
            let unansweredCount = 0;
            let explanations = [];
            let detailJawaban = {};
            
            // Reset warna baris dan sembunyikan tombol selanjutnya
            $('tbody tr').removeClass('correct incorrect');
            $('#nextBtn').hide();
            
            // Periksa setiap jawaban
            for (let i = 0; i < answerKey.length; i++) {
                const selectedValue = $('#list-' + i).val();
                const row = $('#list-' + i).closest('tr');
                const questionText = row.find('td:nth-child(2)').text().trim();
                
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
                    const correctAnswerText = answerTexts[answerKey[i]];
                    explanations.push(`<li>Soal ${i+1}: <span class="text-danger"><i class="fas fa-times"></i> Salah</span> - Jawaban benar: ${correctAnswerText}</li>`);
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
                resultTitle.innerHTML = '<i class="fas fa-trophy"></i> Selamat! Semua Jawaban Benar!';
                resultDetails.innerHTML = `
                    <p>Kamu telah menjawab semua soal dengan benar.</p>
                    <p>Progres kamu sedang disimpan...</p>
                `;
                
                // Tampilkan tombol Selanjutnya
                $('#nextBtn').show();
                
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
                
                // Tetap simpan progres meskipun belum lengkap
                simpanProgres(correctCount, answerKey.length, detailJawaban);
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
            console.log('Memulai simpan progres Pengumpulan Data 3...');
            console.log('Data yang akan dikirim:', {
                skor: skor,
                totalSoal: totalSoal,
                detailJawaban: detailJawaban
            });
            
            // Data yang akan dikirim
            const data = {
                nama_aktivitas: 'pengumpulan-data-3',
                judul_aktivitas: 'Pengumpulan Data 3',
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
                    
                    // Update pesan hasil jika semua benar
                    const resultDetails = document.getElementById('result-details');
                    if (skor === totalSoal) {
                        resultDetails.innerHTML = `
                            <p>Kamu telah berhasil menyelesaikan Pengumpulan Data 3 dengan sempurna!</p>
                            <p><strong>Progres berhasil disimpan!</strong></p>
                            <p>Klik tombol "Lanjut ke Pengolahan Data 3" untuk melanjutkan.</p>
                        `;
                        
                        // Tampilkan notifikasi sukses
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selamat!',
                                text: 'Kamu telah menyelesaikan Pengumpulan Data 3',
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
                    if (resultDetails.innerHTML.includes('Progres berhasil disimpan')) {
                        resultDetails.innerHTML += '<br><small class="text-danger">Progres gagal disimpan, tetapi jawaban kamu tetap tercatat.</small>';
                    }
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
@include('pdf-modal')
@endsection