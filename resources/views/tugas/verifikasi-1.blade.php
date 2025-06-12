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
    <title>Sistem Pertahanan Tubuh - Tugas Siswa</title>
    <style>
        :root {
            --primary: #335C67;
            --secondary: #E09F3E;
            --accent: #9E2A2B;
            --light: #FFF3B0;
            --dark: #540B0E;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            /* max-width: 800px; */
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        
        .task-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .task-title {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.8rem;
            border-bottom: 2px solid var(--light);
            padding-bottom: 10px;
        }
        
        .task-instruction {
            color: var(--primary);
            background-color: rgba(255, 243, 176, 0.3);
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 1rem;
        }
        
        .question-group {
            margin-bottom: 25px;
        }
        
        .question-text {
            margin-bottom: 10px;
            display: block;
            font-size: 1.05rem;
        }
        
        .answer-input {
            border: 2px solid #ddd;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 1rem;
            transition: all 0.3s;
            margin: 5px 0;
            width: 100%;
            max-width: 400px;
        }
        
        .answer-input:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(224, 159, 62, 0.2);
        }
        
        .submit-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }
        
        .submit-btn:hover {
            background-color: var(--dark);
        }
        
        .inline-input {
            display: inline-block;
            width: auto;
            min-width: 150px;
            margin: 0 5px;
        }
        
        /* Styles untuk hasil */
        .result-message {
            padding: 15px;
            border-radius: 6px;
            margin-top: 20px;
            display: none;
        }
        
        .result-message.success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        
        .result-message.error {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
        
        .result-message.warning {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }
        
        .correct-answer {
            border-color: #28a745 !important;
            background-color: #d4edda !important;
        }
        
        .incorrect-answer {
            border-color: #dc3545 !important;
            background-color: #f8d7da !important;
        }
        
        .answer-feedback {
            font-size: 0.85rem;
            margin-top: 5px;
            display: none;
        }
        
        .answer-feedback.correct {
            color: #155724;
        }
        
        .answer-feedback.incorrect {
            color: #721c24;
        }
        
        @media (max-width: 600px) {
            .inline-input {
                display: block;
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="task-container">
        <h1 class="task-title">Verifikasi</h1>
        
        <div class="task-instruction">
            Isilah kolom yang kosong pada teks berikut ini berdasarkan informasi yang telah kamu dapat dari menonton video dan melaksanakan kegiatan lainnya.
        </div>
        
        <div class="question-group">
            <label class="question-text">Sebuah luka irisan tak lama memerah dan bengkak yang diakibatkan oleh tubuh mengeluarkan</label>
            <input type="text" class="answer-input" id="isian-1" name="isian-1" placeholder="Isi jawaban...">.
            <div class="answer-feedback" id="feedback-1"></div>
            
            <p style="margin-top: 15px;">Tak lama kemudian, luka tersebut mulai bernanah karena sel-sel darah putih melakukan
            <input type="text" class="answer-input inline-input" id="isian-2" name="isian-2" placeholder="Isi jawaban...">
            terhadap mikroba yang menginfeksi tubuh.</p>
            <div class="answer-feedback" id="feedback-2"></div>
            
            <p style="margin-top: 15px;">Beberapa waktu kemudian, mikroba yang sama kembali dan tubuh terpapar patogen yang sama namun tidak menunjukkan gejala infeksi dikarenakan imunitas adaptif yang memproduksi
            <input type="text" class="answer-input inline-input" id="isian-3" name="isian-3" placeholder="Isi jawaban...">.
            </p>
            <div class="answer-feedback" id="feedback-3"></div>
        </div>
        
        <button type="submit" class="submit-btn" onclick="checkAnswers()">Cek Jawaban</button>
        
        <!-- Area untuk menampilkan hasil -->
        <div id="result-message" class="result-message">
            <h4 id="result-title"></h4>
            <div id="result-details"></div>
        </div>
    </div>

    <!-- jQuery (pastikan sudah di-load di layout) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Kunci jawaban
        const answerKey = {
            'isian-1': 'nanah',
            'isian-2': 'fagositosis',
            'isian-3': 'antibodi'
        };
        
        // Fungsi untuk normalize jawaban (lowercase dan trim)
        function normalizeAnswer(answer) {
            return answer.toLowerCase().trim();
        }
        
        // Fungsi untuk memeriksa jawaban
        function checkAnswers() {
            let correctCount = 0;
            let incorrectCount = 0;
            let totalQuestions = 3;
            let detailJawaban = {};
            
            // Reset styles
            document.querySelectorAll('.answer-input').forEach(input => {
                input.classList.remove('correct-answer', 'incorrect-answer');
            });
            document.querySelectorAll('.answer-feedback').forEach(feedback => {
                feedback.style.display = 'none';
            });
            
            // Periksa setiap jawaban
            for (let i = 1; i <= totalQuestions; i++) {
                const inputId = `isian-${i}`;
                const input = document.getElementById(inputId);
                const userAnswer = normalizeAnswer(input.value);
                const correctAnswer = answerKey[inputId];
                const feedback = document.getElementById(`feedback-${i}`);
                
                detailJawaban[inputId] = {
                    jawaban_user: input.value,
                    jawaban_benar: correctAnswer,
                    status: userAnswer === correctAnswer ? 'benar' : 'salah'
                };
                
                if (userAnswer === correctAnswer) {
                    correctCount++;
                    input.classList.add('correct-answer');
                    feedback.textContent = '✓ Benar!';
                    feedback.className = 'answer-feedback correct';
                } else if (userAnswer === '') {
                    input.classList.add('incorrect-answer');
                    feedback.textContent = '✗ Jawaban tidak boleh kosong';
                    feedback.className = 'answer-feedback incorrect';
                } else {
                    incorrectCount++;
                    input.classList.add('incorrect-answer');
                    feedback.textContent = `✗ Salah. Jawaban yang benar: ${correctAnswer}`;
                    feedback.className = 'answer-feedback incorrect';
                }
                feedback.style.display = 'block';
            }
            
            // Tampilkan hasil
            const resultMessage = document.getElementById('result-message');
            const resultTitle = document.getElementById('result-title');
            const resultDetails = document.getElementById('result-details');
            
            resultMessage.style.display = 'block';
            
            if (correctCount === totalQuestions) {
                resultMessage.className = 'result-message success';
                resultTitle.innerHTML = '<i class="fas fa-trophy"></i> Jawaban Benar';
                resultDetails.innerHTML = `
                    <p>Jawaban Benar.</p>
                    
                `;
                
                // Simpan progres
                simpanProgres(correctCount, totalQuestions, detailJawaban);
                
            } else if (correctCount + incorrectCount < totalQuestions) {
                resultMessage.className = 'result-message warning';
                resultTitle.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Belum Lengkap';
                resultDetails.innerHTML = `
                    <p><strong>Jawaban benar:</strong> ${correctCount}</p>
                    <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                    <p><strong>Belum dijawab:</strong> ${totalQuestions - correctCount - incorrectCount}</p>
                    <p class="mb-0"><em>Silakan lengkapi semua jawaban terlebih dahulu!</em></p>
                `;
            } else {
                resultMessage.className = 'result-message error';
                resultTitle.innerHTML = '<i class="fas fa-times-circle"></i> Coba Lagi';
                resultDetails.innerHTML = `
                    <p><strong>Jawaban benar:</strong> ${correctCount}</p>
                    <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                    <p class="mb-0"><em>Perhatikan kembali jawaban yang salah dan coba lagi!</em></p>
                `;
                
                // Tetap simpan progres meskipun belum sempurna
                simpanProgres(correctCount, totalQuestions, detailJawaban);
            }
            
            // Scroll ke hasil
            resultMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
        
        // Fungsi untuk menyimpan progres
        function simpanProgres(skor, totalSoal, detailJawaban) {
            console.log('Memulai simpan progres Verifikasi 1...');
            console.log('Data yang akan dikirim:', {
                skor: skor,
                totalSoal: totalSoal,
                detailJawaban: detailJawaban
            });
            
            // Data yang akan dikirim
            const data = {
                nama_aktivitas: 'verifikasi-1',
                judul_aktivitas: 'Verifikasi 1',
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
                            <p>Jawabanmu Benar.</p>
                        `;
                        
                        // Tampilkan notifikasi sukses jika tersedia
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'success',
                                title: '',
                                text: 'Semua Benar!',
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
        
        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.answer-input');
            
            // Hapus class saat user mulai mengetik lagi
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.classList.remove('correct-answer', 'incorrect-answer');
                    const feedbackId = 'feedback-' + this.id.split('-')[1];
                    const feedback = document.getElementById(feedbackId);
                    if (feedback) {
                        feedback.style.display = 'none';
                    }
                });
                
                // Enter key untuk submit
                input.addEventListener('keypress', function(e) {
                    if (e.key === 'Enter') {
                        checkAnswers();
                    }
                });
            });
        });
    </script>
</body>
</html>
@endsection