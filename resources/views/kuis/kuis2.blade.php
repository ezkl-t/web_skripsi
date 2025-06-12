<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kuis 2 - Sistem Pertahanan Tubuh</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        :root {
            --primary-color: #335C67;
            --secondary-color: #E09F3E;
            --accent-color: #9E2A2B;
            --light-color: #FFF3B0;
            --dark-color: #540B0E;
        }

        body {
            background: linear-gradient(135deg, var(--light-color) 0%, #ffffff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .quiz-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .quiz-timer {
            background: var(--accent-color);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            position: sticky;
            top: 20px;
            z-index: 100;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .question-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            border-left: 5px solid var(--secondary-color);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .question-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.15);
        }

        .question-number {
            background: var(--secondary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .question-text {
            font-size: 1.1rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            line-height: 1.6;
            font-weight: 500;
        }

        .answer-option {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .answer-option::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }

        .answer-option:hover {
            border-color: var(--secondary-color);
            background: #fff;
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(224, 159, 62, 0.2);
        }

        .answer-option:hover::before {
            left: 100%;
        }

        .answer-option input[type="radio"] {
            margin-right: 0.8rem;
            transform: scale(1.2);
            accent-color: var(--secondary-color);
        }

        .answer-option.selected {
            border-color: var(--secondary-color);
            background: rgba(224, 159, 62, 0.1);
            color: var(--accent-color);
            font-weight: 500;
        }

        .option-letter {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-weight: bold;
            margin-right: 1rem;
        }

        .selected .option-letter {
            background: var(--secondary-color);
        }

        .quiz-progress {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .progress-bar {
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
            transition: width 0.3s ease;
        }

        .submit-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            margin-top: 2rem;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--accent-color), var(--dark-color));
            border: none;
            color: white;
            padding: 1rem 3rem;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, var(--dark-color), var(--accent-color));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(158, 42, 43, 0.4);
            color: white;
        }

        .btn-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .previous-result {
            background: linear-gradient(135deg, #17a2b8, #007bff);
            color: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .alert {
            border-radius: 10px;
            border: none;
            padding: 1rem 1.5rem;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .loading-spinner {
            color: white;
            font-size: 3rem;
        }

        @media (max-width: 768px) {
            .quiz-timer {
                position: relative;
                top: 0;
                margin-bottom: 1rem;
            }
            
            .question-card {
                padding: 1.5rem;
            }
            
            .btn-submit {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner">
            <i class="fas fa-spinner fa-spin"></i>
        </div>
    </div>

    <!-- Header -->
    <div class="quiz-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-shield-alt"></i> Kuis 2: Sistem Pertahanan Tubuh Lanjutan</h1>
                    <p class="mb-0">Uji pemahaman Anda tentang materi yang telah dipelajari</p>
                </div>
                <div class="col-md-4 text-end">
                    @auth
                        <div class="user-info">
                            <i class="fas fa-user"></i> {{ Auth::user()->name }}<br>
                            <small>{{ Auth::user()->kelas }}</small>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <i class="fas fa-exclamation-triangle"></i>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Previous Result -->
        @if($hasilSebelumnya)
            <div class="previous-result">
                <h5><i class="fas fa-history"></i> Hasil Kuis Terakhir</h5>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Nilai: {{ $hasilSebelumnya->formatted_nilai }}</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>Grade: {{ $hasilSebelumnya->grade }}</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>Status: {{ $hasilSebelumnya->status }}</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>Tanggal: {{ $hasilSebelumnya->tanggal_kuis->format('d/m/Y H:i') }}</strong>
                    </div>
                </div>
                <small><i class="fas fa-info-circle"></i> Anda dapat mengulang kuis untuk meningkatkan nilai</small>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-9">
                <!-- Quiz Progress -->
                <div class="quiz-progress">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span><i class="fas fa-tasks"></i> Progress Kuis</span>
                        <span id="progressText">0 / {{ count($soal) }} soal</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" id="progressBar" style="width: 0%"></div>
                    </div>
                </div>

                <!-- Quiz Form -->
                <form id="quizForm" method="POST" action="{{ route('kuis2.submit') }}">
                    @csrf
                    <input type="hidden" name="waktu_mulai" id="waktuMulai" value="{{ time() }}">

                    @foreach($soal as $index => $s)
                        <div class="question-card" data-question="{{ $index + 1 }}">
                            <div class="question-number">{{ $index + 1 }}</div>
                            <div class="question-text">{{ $s->pertanyaan }}</div>
                            
                            <div class="answers">
                                @foreach($s->jawaban as $jawaban)
                                    <div class="answer-option">
                                        <label class="d-flex align-items-center w-100 cursor-pointer">
                                            <input type="radio" 
                                                   name="jawaban[{{ $s->id }}]" 
                                                   value="{{ $jawaban->pilihan }}"
                                                   class="answer-radio">
                                            <span class="option-letter">{{ $jawaban->pilihan }}</span>
                                            <span class="flex-grow-1">{{ $jawaban->teks_jawaban }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <!-- Submit Section -->
                    <div class="submit-section">
                        <h5><i class="fas fa-flag-checkered"></i> Selesaikan Kuis</h5>
                        <p class="text-muted">Pastikan semua soal sudah dijawab sebelum mengirim</p>
                        <button type="submit" class="btn btn-submit" id="submitBtn" disabled>
                            <i class="fas fa-paper-plane"></i> Kirim Jawaban
                        </button>
                        <div class="mt-3">
                            <small class="text-muted">
                                <i class="fas fa-info-circle"></i> 
                                Setelah mengirim, Anda tidak dapat mengubah jawaban
                            </small>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-3">
                <!-- Timer -->
                <div class="quiz-timer">
                    <h5><i class="fas fa-clock"></i> Waktu</h5>
                    <div id="timer" class="h3 mb-0">00:00</div>
                    <small>Waktu mulai: <span id="startTime"></span></small>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Timer functionality
        let startTime = new Date();
        let timerInterval;

        function updateTimer() {
            const now = new Date();
            const elapsed = Math.floor((now - startTime) / 1000);
            const minutes = Math.floor(elapsed / 60);
            const seconds = elapsed % 60;
            
            document.getElementById('timer').textContent = 
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }

        function startTimer() {
            document.getElementById('startTime').textContent = startTime.toLocaleTimeString();
            timerInterval = setInterval(updateTimer, 1000);
        }

        // Progress tracking
        function updateProgress() {
            const totalQuestions = {{ count($soal) }};
            const answeredQuestions = document.querySelectorAll('input[type="radio"]:checked').length;
            const progressPercent = (answeredQuestions / totalQuestions) * 100;
            
            document.getElementById('progressBar').style.width = progressPercent + '%';
            document.getElementById('progressText').textContent = `${answeredQuestions} / ${totalQuestions} soal`;
            
            // Enable submit button if all questions are answered
            const submitBtn = document.getElementById('submitBtn');
            if (answeredQuestions === totalQuestions) {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Kirim Jawaban';
            } else {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `<i class="fas fa-paper-plane"></i> Jawab ${totalQuestions - answeredQuestions} soal lagi`;
            }
        }

        // Answer selection handling
        function handleAnswerSelection() {
            document.querySelectorAll('input[type="radio"]').forEach(radio => {
                radio.addEventListener('change', function() {
                    // Remove selected class from all options in this question
                    const questionCard = this.closest('.question-card');
                    questionCard.querySelectorAll('.answer-option').forEach(option => {
                        option.classList.remove('selected');
                    });
                    
                    // Add selected class to chosen option
                    this.closest('.answer-option').classList.add('selected');
                    
                    // Update progress
                    updateProgress();
                });
            });
        }

        // Form submission with popup
        function handleFormSubmission() {
            document.getElementById('quizForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                if (!confirm('Apakah Anda yakin ingin mengirim jawaban? Anda tidak dapat mengubah jawaban setelah mengirim.')) {
                    return;
                }
                
                // Show loading
                document.getElementById('loadingOverlay').style.display = 'flex';
                
                // Clear timer
                clearInterval(timerInterval);
                
                // Submit via AJAX untuk popup
                const formData = new FormData(this);
                
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    
                    if (data.success) {
                        // Show success popup with student data
                        Swal.fire({
                            icon: 'success',
                            title: 'Kuis Berhasil Diselesaikan!',
                            html: `
                                <div class="text-start">
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Nama:</strong></div>
                                        <div class="col-8">${data.data.nama}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>NISN:</strong></div>
                                        <div class="col-8">${data.data.nisn}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Kelas:</strong></div>
                                        <div class="col-8">${data.data.kelas}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Waktu:</strong></div>
                                        <div class="col-8">${data.data.waktu_pengerjaan}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Nilai:</strong></div>
                                        <div class="col-8"><span class="badge bg-${data.data.status === 'Lulus' ? 'success' : 'danger'}">${data.data.nilai}</span></div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-4"><strong>Grade:</strong></div>
                                        <div class="col-8"><span class="badge bg-primary">${data.data.grade}</span></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4"><strong>Status:</strong></div>
                                        <div class="col-8"><span class="badge bg-${data.data.status === 'Lulus' ? 'success' : 'danger'}">${data.data.status}</span></div>
                                    </div>
                                </div>
                            `,
                            showCancelButton: true,
                            // confirmButtonText: 'Lihat Detail Hasil',
                            cancelButtonText: 'Kembali ke Home',
                            confirmButtonColor: '#28a745',
                            cancelButtonColor: '#6c757d'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = `/kuis/hasil/${data.data.hasil_id}`;
                            } else {
                                window.location.href = '/home';
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi Kesalahan',
                            text: data.message || 'Gagal menyimpan hasil kuis'
                        });
                    }
                })
                .catch(error => {
                    document.getElementById('loadingOverlay').style.display = 'none';
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: 'Koneksi bermasalah, silakan coba lagi'
                    });
                });
            });
        }

        // Auto-save functionality
        function autoSave() {
            const formData = new FormData(document.getElementById('quizForm'));
            const answers = {};
            
            for (let [key, value] of formData.entries()) {
                if (key.startsWith('jawaban[')) {
                    answers[key] = value;
                }
            }
            
            localStorage.setItem('kuis2_answers', JSON.stringify(answers));
        }

        // Load saved answers
        function loadSavedAnswers() {
            const saved = localStorage.getItem('kuis2_answers');
            if (saved) {
                const answers = JSON.parse(saved);
                
                Object.entries(answers).forEach(([key, value]) => {
                    const radio = document.querySelector(`input[name="${key}"][value="${value}"]`);
                    if (radio) {
                        radio.checked = true;
                        radio.closest('.answer-option').classList.add('selected');
                    }
                });
                
                updateProgress();
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            startTimer();
            handleAnswerSelection();
            handleFormSubmission();
            loadSavedAnswers();
            
            // Auto-save every 30 seconds
            setInterval(autoSave, 30000);
            
            // Save on page unload
            window.addEventListener('beforeunload', autoSave);
            
            // Clear saved data on successful submission
            @if(session('success'))
                localStorage.removeItem('kuis2_answers');
            @endif
        });

        // Prevent accidental page refresh
        window.addEventListener('beforeunload', function(e) {
            const answeredQuestions = document.querySelectorAll('input[type="radio"]:checked').length;
            if (answeredQuestions > 0) {
                e.preventDefault();
                e.returnValue = '';
            }
        });
    </script>
</body>
</html>