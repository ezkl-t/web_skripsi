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
    <title>Pengolahan Data 3 - Latihan Benar/Salah</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .petunjuk-box {
            background-color: #e7f3fe;
            border-left: 4px solid #2196F3;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .submit-btn {
            background-color: var(--accent, #9E2A2B);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        
        .submit-btn:hover {
            background-color: var(--dark, #540B0E);
        }
        .btn-reset {
            padding: 8px 15px;
            border-radius: 4px;
            background-color: #6c757d;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-reset:hover {
            background-color: #5a6268;
        }
        .result-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 4px;
            display: none;
        }
        .result-box.correct {
            background-color: #d4edda;
            border-left: 4px solid #28a745;
            color: #155724;
        }
        .result-box.incorrect {
            background-color: #f8d7da;
            border-left: 4px solid #dc3545;
            color: #721c24;
        }
        
        .next-btn {
            background-color: var(--dark, #540B0E);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
            display: none;
        }
        
        .next-btn:hover {
            background-color: var(--accent, #9E2A2B);
        }
        .radio-container {
            display: flex;
            justify-content: center;
        }
        .radio-option {
            margin: 0 15px;
            cursor: pointer;
        }
        .radio-option input[type="radio"] {
            margin-right: 5px;
        }
        .number-label {
            display: inline-block;
            background-color: #540B0E;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            line-height: 24px;
            font-size: 14px;
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="card-title mb-4" style="color: #9E2A2B">Pengolahan Data</h2>
        
        <!-- Petunjuk Pengerjaan -->
        <div class="petunjuk-box">
            <h5 style="color: #0c5460; margin-bottom: 15px;"><i class="fas fa-info-circle"></i> Petunjuk Pengerjaan:</h5>
            <p class="mb-0">Setelah kamu menonton video, membaca materi, dan mengerjakan tugas sebelumnya, sekarang selesaikan tugas berikut!</p>
            <ol>
                <li>Beri ceklis (✓) pada kolom Benar atau Salah dari pernyataan pada soal.</li>
            </ol>
        </div>

        <form id="truefalseForm">
            <table class="table">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="65%">Pernyataan</th>
                        <th width="30%" class="text-center">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>Imunitas aktif berlangsung lebih lama dibandingkan imunitas pasif karena adanya sel memori.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer1" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer1" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Vaksin bekerja dengan memberikan antibodi langsung ke dalam tubuh.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer2" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer2" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>ASI memberikan perlindungan kepada bayi melalui imunitas pasif alami.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer3" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer3" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Alergi terjadi karena sistem imun tidak dapat mengenali zat berbahaya.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer4" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer4" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>HIV menyerang limfosit B sehingga produksi antibodi terganggu.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer5" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer5" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Edward Jenner menemukan vaksin pertama untuk virus cacar pada abad ke-19.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer6" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer6" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Penyakit autoimun terjadi karena sistem imun terlalu lemah.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer7" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer7" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Donor plasma merupakan contoh imunitas pasif buatan.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer8" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer8" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Multiple sclerosis adalah penyakit autoimun yang menyerang sistem saraf pusat.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer9" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer9" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Imunitas yang diperoleh dari vaksinasi bersifat permanen seumur hidup.</td>
                        <td>
                            <div class="radio-container">
                                <label class="radio-option">
                                    <input type="radio" name="answer10" value="benar"> Benar
                                </label>
                                <label class="radio-option">
                                    <input type="radio" name="answer10" value="salah"> Salah
                                </label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" id="checkAnswers" class="submit-btn"><i class="fas fa-check-circle"></i> Cek Jawaban</button>
                <button type="button" id="resetForm" class="btn-reset"><i class="fas fa-redo"></i> Reset</button>
            </div>
        </form>

        <div id="resultBox" class="result-box">
            <h5 id="resultTitle"></h5>
            <p id="resultMessage"></p>
            <div id="resultDetails"></div>
            <div class="text-center mt-3">
                <a href="{{ route('verifikasi-3') }}" id="nextButton" class="next-btn"><i class="fas fa-arrow-right"></i> Selanjutnya</a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            console.log('Document ready!');
            
            // Debug untuk memastikan tombol ada
            console.log('Check button:', $('#checkAnswers').length);
            console.log('Reset button:', $('#resetForm').length);
            // Kunci jawaban
            const answerKey = {
                answer1: 'benar',  // 1-B
                answer2: 'salah',  // 2-S
                answer3: 'benar',  // 3-B
                answer4: 'salah',  // 4-S
                answer5: 'salah',  // 5-S
                answer6: 'benar',  // 6-B
                answer7: 'salah',  // 7-S
                answer8: 'benar',  // 8-B
                answer9: 'benar',  // 9-B
                answer10: 'salah'   // 10-S
            };

            // Cek apakah sudah pernah mengerjakan dan mendapat nilai sempurna
            let hasCompletedPerfectly = false;

            // Fungsi untuk memeriksa jawaban
            $(document).on('click', '#checkAnswers', function(e) {
                e.preventDefault();
                let correctCount = 0;
                let totalQuestions = Object.keys(answerKey).length;
                let allAnswered = true;
                let resultDetails = '';

                // Periksa setiap jawaban
                for (let i = 1; i <= totalQuestions; i++) {
                    let selectedAnswer = $(`input[name=answer${i}]:checked`).val();
                    
                    if (!selectedAnswer) {
                        allAnswered = false;
                        break;
                    }

                    if (selectedAnswer === answerKey[`answer${i}`]) {
                        correctCount++;
                        resultDetails += `<p><span class="number-label">${i}</span> Jawaban Anda <strong class="text-success">Tepat</strong></p>`;
                    } else {
                        resultDetails += `<p><span class="number-label">${i}</span> Jawaban Anda <strong class="text-danger">Kurang Tepat</strong>. Jawaban yang benar: <strong>${answerKey[`answer${i}`] === 'benar' ? 'Benar' : 'Salah'}</strong></p>`;
                    }
                }

                // Tampilkan hasil
                if (!allAnswered) {
                    $('#resultBox').removeClass('correct incorrect').addClass('incorrect').show();
                    $('#resultTitle').text('Belum Lengkap!');
                    $('#resultMessage').text('Silakan jawab semua pertanyaan terlebih dahulu.');
                    $('#resultDetails').html('');
                    return;
                }

                // Hitung persentase jawaban benar
                let percentage = (correctCount / totalQuestions) * 100;

                // Tentukan apakah semua jawaban benar
                let allCorrect = correctCount === totalQuestions;

                // Jika semua jawaban benar atau sudah pernah mendapat nilai sempurna sebelumnya
                if (allCorrect || hasCompletedPerfectly) {
                    // Tandai sebagai telah mendapat nilai sempurna
                    hasCompletedPerfectly = true;
                    
                    // Simpan progres sebagai selesai
                    saveProgress('pengolahan-data-3', true);
                } else {
                    // Jika belum pernah mendapat nilai sempurna dan tidak semua jawaban benar
                    saveProgress('pengolahan-data-3', false);
                }

                // Tampilkan hasil
                if (allCorrect) {
                    $('#resultBox').removeClass('incorrect').addClass('correct').show();
                    $('#resultTitle').text('Selamat!');
                    $('#resultMessage').text(`Anda menjawab semua pertanyaan dengan benar! Skor Anda: ${percentage}%`);
                    $('#nextButton').show(); // Tampilkan tombol Selanjutnya
                } else {
                    $('#resultBox').removeClass('correct').addClass('incorrect').show();
                    $('#resultTitle').text('Belum Sempurna');
                    $('#resultMessage').text(`Anda menjawab ${correctCount} dari ${totalQuestions} pertanyaan dengan benar. Skor Anda: ${percentage}%`);
                    $('#nextButton').hide(); // Sembunyikan tombol Selanjutnya
                }
                
                $('#resultDetails').html(resultDetails);
            });

            // Reset form
            $(document).on('click', '#resetForm', function(e) {
                e.preventDefault();
                $('#truefalseForm')[0].reset();
                $('#resultBox').hide();
            });

            // Fungsi untuk menyimpan progres
            function saveProgress(activityName, isCompleted) {
                $.ajax({
                    url: '{{ route("progres.simpan") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        nama_aktivitas: activityName,
                        is_completed: isCompleted
                    },
                    success: function(response) {
                        console.log('Progres berhasil disimpan:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Gagal menyimpan progres:', error);
                    }
                });
            }
        });
    </script>
</body>
</html>
@endsection