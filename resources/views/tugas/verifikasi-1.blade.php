@extends('layouts.app')

@section('title', 'Verifikasi')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            color: var(--accent);
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
        
        .question-container {
            background-color: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }
        
        .question-number {
            color: var(--dark);
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        
        .question-text {
            font-size: 1rem;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        
        .option-container {
            margin: 10px 0;
        }
        
        .option-item {
            display: flex;
            align-items: flex-start;
            padding: 12px;
            margin: 8px 0;
            border: 2px solid #dee2e6;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: white;
        }
        
        .option-item:hover {
            border-color: var(--secondary);
            background-color: rgba(224, 159, 62, 0.1);
        }
        
        .option-letter {
            font-weight: bold;
            margin-right: 10px;
            min-width: 20px;
            color: var(--dark);
        }
        
        .option-text {
            flex: 1;
            line-height: 1.5;
        }
        
        .option-item.selected {
            border-color: var(--accent);
            background-color: rgba(158, 42, 43, 0.1);
        }
        
        .option-item.correct {
            border-color: #28a745;
            background-color: #d4edda;
            color: #155724;
        }
        
        .option-item.incorrect {
            border-color: #dc3545;
            background-color: #f8d7da;
            color: #721c24;
            text-decoration: line-through;
            opacity: 0.7;
        }
        
        .option-item.correct::after {
            content: ' ✓';
            color: #28a745;
            font-weight: bold;
            margin-left: 10px;
        }
        
        .option-item.incorrect::after {
            content: ' ✗';
            color: #dc3545;
            font-weight: bold;
            margin-left: 10px;
        }
        
        .submit-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 15px;
        }
        
        .submit-btn:hover {
            background-color: var(--dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .btn-selanjutnya {
            display: inline-block;
            background-color: var(--dark);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .btn-selanjutnya:hover {
            background-color: var(--accent);
            text-decoration: none;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
        }
        
        .result-message {
            padding: 20px;
            border-radius: 8px;
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
        
        .question-status {
            font-size: 0.9rem;
            margin-top: 10px;
            padding: 8px;
            border-radius: 4px;
            display: none;
        }
        
        .question-status.correct {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .question-status.incorrect {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        @media (max-width: 768px) {
            .task-container {
                padding: 15px;
            }
            
            .option-item {
                padding: 10px;
            }
            
            .option-text {
                font-size: 0.95rem;
            }
        }
    </style>
</head>

<body>
    <div class="task-container">
        <h1 class="task-title">Verifikasi</h1>
        
        <div class="task-instruction">
            <strong>Petunjuk Pengerjaan:</strong><br>
            Pilih dari beberapa opsi jawaban yang tepat setelah kamu membaca materi dan mengerjakan tugas sebelumnya. Klik pada pilihan yang menurutmu benar untuk setiap pertanyaan.
        </div>
        
        <!-- Pertanyaan 1 -->
        <div class="question-container">
            <div class="question-number">1.</div>
            <div class="question-text">
                Tujuan tubuh memerlukan sistem pengenalan antigen-antibodi dalam pertahanan internal.
            </div>
            <div class="option-container">
                <div class="option-item" data-question="1" data-option="a">
                    <span class="option-letter">a.</span>
                    <span class="option-text">Karena pertahanan eksternal seperti kulit dan sekresi kimia tidak selalu dapat mencegah semua patogen masuk ke dalam tubuh, sehingga diperlukan mekanisme pertahanan lanjutan yang dapat mengenali dan merespon patogen spesifik yang berhasil menembus pertahanan pertama</span>
                </div>
                <div class="option-item" data-question="1" data-option="b">
                    <span class="option-letter">b.</span>
                    <span class="option-text">Karena sistem antigen-antibodi hanya berfungsi untuk membedakan golongan darah saat transfusi dan tidak memiliki peran lain dalam melawan infeksi</span>
                </div>
                <div class="option-item" data-question="1" data-option="c">
                    <span class="option-letter">c.</span>
                    <span class="option-text">Karena antibodi dapat menggantikan fungsi sel darah putih dalam melakukan fagositosis terhadap semua jenis mikroorganisme tanpa perlu mengenali jenisnya</span>
                </div>
                <div class="option-item" data-question="1" data-option="d">
                    <span class="option-letter">d.</span>
                    <span class="option-text">Karena pertahanan eksternal hanya efektif melawan virus, sedangkan bakteri dan jamur harus dilawan dengan antibodi yang diproduksi secara terus-menerus</span>
                </div>
                <div class="option-item" data-question="1" data-option="e">
                    <span class="option-letter">e.</span>
                    <span class="option-text">Karena sistem antigen-antibodi bekerja lebih cepat daripada pertahanan eksternal dalam mencegah patogen masuk ke dalam sel-sel tubuh</span>
                </div>
            </div>
            <div class="question-status" id="status-1"></div>
        </div>
        
        <!-- Pertanyaan 2 -->
        <div class="question-container">
            <div class="question-number">2.</div>
            <div class="question-text">
                Cara kerja antibodi paling tepat dalam sistem pertahanan internal tubuh.
            </div>
            <div class="option-container">
                <div class="option-item" data-question="2" data-option="a">
                    <span class="option-letter">a.</span>
                    <span class="option-text">Antibodi hanya bekerja dengan satu cara yaitu langsung menghancurkan patogen dengan melepaskan enzim pencernaan seperti yang dilakukan oleh sel fagosit</span>
                </div>
                <div class="option-item" data-question="2" data-option="b">
                    <span class="option-letter">b.</span>
                    <span class="option-text">Antibodi bekerja melalui berbagai mekanisme seperti menetralisir toksin, menghambat pergerakan bakteri, memfasilitasi fagositosis, dan menyebabkan penggumpalan patogen untuk mencegah penyebarannya</span>
                </div>
                <div class="option-item" data-question="2" data-option="c">
                    <span class="option-letter">c.</span>
                    <span class="option-text">Antibodi selalu diproduksi dalam jumlah yang sama untuk semua jenis antigen dan tidak memiliki variasi struktur situs pengikatan</span>
                </div>
                <div class="option-item" data-question="2" data-option="d">
                    <span class="option-letter">d.</span>
                    <span class="option-text">Antibodi hanya efektif melawan patogen yang berada di luar sel dan tidak dapat mengenali sel tubuh yang telah terinfeksi virus</span>
                </div>
                <div class="option-item" data-question="2" data-option="e">
                    <span class="option-letter">e.</span>
                    <span class="option-text">Antibodi bekerja secara independen tanpa memerlukan bantuan komponen sistem imun lainnya seperti sel fagosit atau sel T</span>
                </div>
            </div>
            <div class="question-status" id="status-2"></div>
        </div>
        
        <!-- Pertanyaan 3 -->
        <div class="question-container">
            <div class="question-number">3.</div>
            <div class="question-text">
                Fungsi utama sel memori dalam sistem imun.
            </div>
            <div class="option-container">
                <div class="option-item" data-question="3" data-option="a">
                    <span class="option-letter">a.</span>
                    <span class="option-text">Memproduksi hormon pertumbuhan</span>
                </div>
                <div class="option-item" data-question="3" data-option="b">
                    <span class="option-letter">b.</span>
                    <span class="option-text">Mengatur tekanan darah</span>
                </div>
                <div class="option-item" data-question="3" data-option="c">
                    <span class="option-letter">c.</span>
                    <span class="option-text">Memberikan respons yang lebih cepat pada infeksi kedua dari patogen yang sama</span>
                </div>
                <div class="option-item" data-question="3" data-option="d">
                    <span class="option-letter">d.</span>
                    <span class="option-text">Mencerna makanan dalam usus</span>
                </div>
                <div class="option-item" data-question="3" data-option="e">
                    <span class="option-letter">e.</span>
                    <span class="option-text">Mengangkut oksigen ke seluruh tubuh</span>
                </div>
            </div>
            <div class="question-status" id="status-3"></div>
        </div>
        
        <div style="text-align: center;">
            <button type="submit" class="submit-btn" onclick="checkAnswers()">
                <i class="fas fa-check-circle"></i> Cek Jawaban
            </button>
        </div>
        
        <!-- Area untuk menampilkan hasil -->
        <div id="result-message" class="result-message">
            <h4 id="result-title"></h4>
            <div id="result-details"></div>
        </div>

        <!-- Tombol Selanjutnya -->
        <div id="tombolSelanjutnya" style="display: none; text-align: center; margin-top: 20px;">
            <a href="{{ route('kesimpulan-1') }}" class="btn-selanjutnya">
                <i class="fas fa-arrow-right"></i> Selanjutnya
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Variabel global untuk menyimpan jawaban user
        let userAnswers = {};
        
        // Kunci jawaban
        const answerKey = {
            1: 'a',
            2: 'b', 
            3: 'c'
        };

        $(document).ready(function() {
            // Setup CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Event handler untuk pilihan
            $('.option-item').click(function() {
                const question = $(this).data('question');
                const option = $(this).data('option');
                
                // Reset semua pilihan untuk pertanyaan ini
                $(`.option-item[data-question="${question}"]`).removeClass('selected');
                
                // Tandai pilihan yang dipilih
                $(this).addClass('selected');
                
                // Simpan jawaban user
                userAnswers[question] = option;
                
                console.log('User answers:', userAnswers);
            });
        });

        function checkAnswers() {
            const totalQuestions = 3;
            let correctCount = 0;
            let detailJawaban = {};

            // Reset semua styling
            $('.option-item').removeClass('correct incorrect');
            $('.question-status').hide();

            // Periksa setiap pertanyaan
            for (let i = 1; i <= totalQuestions; i++) {
                const userAnswer = userAnswers[i];
                const correctAnswer = answerKey[i];
                const questionContainer = $(`.option-item[data-question="${i}"]`);
                const statusElement = $(`#status-${i}`);
                
                detailJawaban[i] = {
                    user_answer: userAnswer || '',
                    correct_answer: correctAnswer,
                    is_correct: userAnswer === correctAnswer
                };

                if (userAnswer === correctAnswer) {
                    correctCount++;
                    // Tandai jawaban benar
                    $(`.option-item[data-question="${i}"][data-option="${correctAnswer}"]`).addClass('correct');
                    
                    statusElement.removeClass('incorrect').addClass('correct question-status');
                    statusElement.text('✓ Jawaban benar!');
                    statusElement.show();
                } else {
                    // Tandai jawaban yang dipilih user sebagai salah (jika ada)
                    if (userAnswer) {
                        $(`.option-item[data-question="${i}"][data-option="${userAnswer}"]`).addClass('incorrect');
                    }
                    
                    // Tandai jawaban yang benar
                    $(`.option-item[data-question="${i}"][data-option="${correctAnswer}"]`).addClass('correct');
                    
                    statusElement.removeClass('correct').addClass('incorrect question-status');
                    if (!userAnswer) {
                        statusElement.text('✗ Belum dijawab. Jawaban yang benar: ' + correctAnswer.toUpperCase());
                    } else {
                        statusElement.text('✗ Salah. Jawaban yang benar: ' + correctAnswer.toUpperCase());
                    }
                    statusElement.show();
                }
            }

            // Tampilkan hasil
            const resultMessage = $('#result-message');
            const resultTitle = $('#result-title');
            const resultDetails = $('#result-details');
            
            resultMessage.show();

            const answeredCount = Object.keys(userAnswers).length;
            const unansweredCount = totalQuestions - answeredCount;
            
            if (correctCount === totalQuestions) {
                resultMessage.removeClass('error warning').addClass('success');
                resultTitle.html('<i class="fas fa-trophy"></i> Selamat! Jawaban Anda benar semua!');
                resultDetails.html('Kerja Bagus! Anda telah berhasil menjawab semua pertanyaan dengan tepat.');
                
                // Tampilkan tombol selanjutnya
                $('#tombolSelanjutnya').show();
                
            } else if (unansweredCount > 0) {
                resultMessage.removeClass('success error').addClass('warning');
                resultTitle.html('<i class="fas fa-exclamation-triangle"></i> Belum Lengkap');
                resultDetails.html(`
                    <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalQuestions}</p>
                    <p><strong>Belum dijawab:</strong> ${unansweredCount}</p>
                    <p class="mb-0"><em>Silakan jawab semua pertanyaan terlebih dahulu!</em></p>
                `);
                
                $('#tombolSelanjutnya').hide();
            } else {
                resultMessage.removeClass('success warning').addClass('error');
                resultTitle.html('<i class="fas fa-times-circle"></i> Masih ada yang keliru');
                resultDetails.html(`
                    <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalQuestions}</p>
                    <p><strong>Jawaban salah:</strong> ${totalQuestions - correctCount}</p>
                    <p class="mb-0"><em>Perhatikan jawaban yang benar dan coba lagi!</em></p>
                `);
                
                $('#tombolSelanjutnya').hide();
            }

            // Scroll ke hasil
            resultMessage[0].scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Simpan progres
            simpanProgres(correctCount, totalQuestions, detailJawaban);
        }

        function simpanProgres(skor, totalSoal, detailJawaban) {
            const data = {
                nama_aktivitas: 'verifikasi-1',
                judul_aktivitas: 'Verifikasi 1 - Pilihan Ganda Sistem Pertahanan Tubuh',
                skor: skor,
                total_soal: totalSoal,
                detail_jawaban: detailJawaban
            };

            $.ajax({
                url: '/api/progres/simpan',
                method: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    console.log('Progres berhasil disimpan:', response);
                    
                    if (skor === totalSoal) {
                        // Tampilkan notifikasi sukses jika sempurna
                        if (typeof Swal !== 'undefined') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Selamat!',
                                text: 'Anda telah menyelesaikan verifikasi dengan sempurna!',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error menyimpan progres:', error);
                    
                    // Tampilkan pesan error
                    const resultDetails = $('#result-details');
                    resultDetails.append('<br><small class="text-warning">Progres gagal disimpan, tetapi jawaban Anda tetap tercatat.</small>');
                }
            });
        }
    </script>
</body>

@endsection