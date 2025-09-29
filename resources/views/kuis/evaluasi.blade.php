<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Evaluasi - Sistem Pertahanan Tubuh</title>
    
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

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--light-color) 0%, #ffffff 100%);
            color: var(--dark-color);
            line-height: 1.6;
            min-height: 100vh;
        }

        .page-container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            gap: 1.5rem;
        }

        .header-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 1rem 0 1rem;
        }

        .quiz-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .home-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            transition: background-color 0.2s ease;
        }

        .home-btn:hover {
            background-color: #2a4a54;
            color: white;
        }

        .quiz-main {
            flex: 1;
        }

        .quiz-container {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .quiz-sidebar {
            width: 250px;
            position: sticky;
            top: 1rem;
            align-self: flex-start;
        }

        .question-nav {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .question-nav-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .question-numbers {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 0.5rem;
        }

        .question-number {
            width: 100%;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f9fafb;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .question-number:hover {
            background-color: #e0e7ff;
        }

        .question-number.active {
            background-color: var(--primary-color);
            color: white;
        }

        .question-number.answered {
            background-color: #d1fae5;
            color: var(--dark-color);
        }

        .quiz-header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .quiz-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .quiz-progress {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .progress-bar {
            width: 200px;
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--primary-color);
            width: 0%;
            transition: width 0.3s ease;
        }

        .question-container {
            margin-bottom: 2rem;
        }

        .question-text {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            line-height: 1.6;
        }

        .options-container {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .option {
            padding: 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .option:hover {
            background-color: #f9fafb;
        }

        .option.selected {
            border-color: var(--primary-color);
            background-color: rgba(51, 92, 103, 0.05);
        }

        .option input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .option-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .option-marker {
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .option.selected .option-marker {
            border-color: var(--primary-color);
        }

        .option.selected .option-marker::after {
            content: '';
            width: 0.75rem;
            height: 0.75rem;
            background-color: var(--primary-color);
            border-radius: 50%;
        }

        .option-text {
            flex-grow: 1;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #2a4a54;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #e5e7eb;
            color: var(--dark-color);
        }

        .btn-outline:hover {
            background-color: #f9fafb;
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .quiz-timer {
            background: var(--accent-color);
            color: white;
            padding: 1rem;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .question-nav-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
            font-size: 0.9rem;
        }
        
        .answered-count {
            color: #10b981;
            font-weight: 500;
        }
        
        .unanswered-count {
            color: #ef4444;
            font-weight: 500;
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

        /* Styling untuk modal petunjuk */
        .student-info-card .card {
            border: 2px solid #e3f2fd;
            border-radius: 10px;
        }
        
        .student-info-card .card-header {
            border-bottom: 2px solid #e3f2fd;
            font-weight: 600;
        }
        
        .instructions .list-group-item {
            border: 1px solid #e9ecef;
            margin-bottom: 0.5rem;
            border-radius: 5px;
            padding: 0.75rem 1rem;
        }
        
        .instructions .list-group-item strong {
            color: var(--primary-color);
        }

        /* Styling untuk modal hasil */
        .stat-card {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            border: 2px solid #e9ecef;
            transition: transform 0.2s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .stat-icon {
            margin-bottom: 1rem;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #6c757d;
            font-weight: 500;
        }
        
        .score-summary h4 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }
        
        .score-summary p {
            font-size: 1.2rem;
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

        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
                padding: 0;
            }

            .header-container {
                padding: 1rem 1rem 0 1rem;
            }

            .quiz-sidebar {
                width: 100%;
                position: static;
                order: -1;
                margin-bottom: 1rem;
            }

            .quiz-container {
                margin: 0 1rem 2rem 1rem;
                padding: 1.5rem;
            }

            .quiz-header-inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .progress-bar {
                width: 100%;
            }

            .navigation-buttons {
                flex-direction: column-reverse;
                gap: 0.75rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner">
            <i class="fas fa-spinner fa-spin"></i>
            <div class="mt-2 text-white">Mengirim jawaban...</div>
        </div>
    </div>

    <!-- Header -->
    <div class="quiz-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-brain"></i> Evaluasi Sistem Pertahanan Tubuh</h1>
                    <p class="mb-0">Uji pemahaman Anda tentang materi yang telah dipelajari</p>
                </div>
                <div class="col-md-4 text-end">
                    @auth
                        <div class="user-info">
                            <i class="fas fa-user"></i> {{ Auth::user()->name }}<br>
                            <small>{{ Auth::user()->kelas ?? 'Kelas tidak tersedia' }}</small>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Previous Result -->
        @php
            // Ambil hasil sebelumnya dari database jika ada
            $hasilSebelumnya = null;
            if(auth()->check()) {
                $hasilSebelumnya = \App\Models\HasilKuis::where('user_id', auth()->id())
                    ->where('nama_kuis', 'evaluasi')
                    ->latest()
                    ->first();
            }
        @endphp

        @if($hasilSebelumnya)
            <div class="previous-result">
                <h5><i class="fas fa-history"></i> Hasil Evaluasi Terakhir</h5>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Nilai: {{ $hasilSebelumnya->formatted_nilai ?? $hasilSebelumnya->nilai }}</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>Grade: {{ $hasilSebelumnya->grade ?? 'N/A' }}</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>Status: {{ $hasilSebelumnya->status ?? 'N/A' }}</strong>
                    </div>
                    <div class="col-md-3">
                        <strong>Tanggal: {{ $hasilSebelumnya->created_at->format('d/m/Y H:i') }}</strong>
                    </div>
                </div>
                <small><i class="fas fa-info-circle"></i> Anda dapat mengulang evaluasi untuk meningkatkan nilai</small>
            </div>
        @endif
    </div>

    <!-- Popup Sambutan -->
    <div class="modal fade" id="petunjukModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-info-circle me-2"></i>Petunjuk Evaluasi
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="student-info-card mb-4">
                        <div class="card">
                            <div class="card-header bg-light">
                                <i class="fas fa-user-graduate me-2"></i>Informasi Peserta
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Nama:</strong> {{ Auth::user()->name ?? 'Guest' }}
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Kelas:</strong> {{ Auth::user()->kelas ?? 'Tidak tersedia' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="instructions">
                        <h6 class="mb-3"><i class="fas fa-list-alt me-2"></i>Petunjuk Pengerjaan:</h6>
                        <div class="list-group">
                            <div class="list-group-item">
                                <strong>1. Waktu Pengerjaan:</strong> Evaluasi ini memiliki batas waktu 30 menit.
                            </div>
                            <div class="list-group-item">
                                <strong>2. Jumlah Soal:</strong> Terdapat <span id="total-soal-petunjuk">0</span> soal pilihan ganda.
                            </div>
                            <div class="list-group-item">
                                <strong>3. Navigasi Soal:</strong> Gunakan tombol navigasi atau klik langsung nomor soal di sidebar.
                            </div>
                            <div class="list-group-item">
                                <strong>4. Jawaban:</strong> Pilih satu jawaban yang paling tepat untuk setiap soal.
                            </div>
                            <div class="list-group-item">
                                <strong>5. Pengumpulan:</strong> Jawaban akan otomatis terkumpul saat waktu habis, atau klik "Kirim Jawaban".
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        <i class="fas fa-play me-2"></i>Mulai Evaluasi
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-container">
        <!-- Konten utama evaluasi -->
        <div class="quiz-main">
            <div class="quiz-container">
                <!-- Header Evaluasi -->
                <div class="quiz-header-inner">
                    <div class="quiz-title">Evaluasi Sistem Pertahanan Tubuh</div>
                    <div class="quiz-progress">
                        <span id="current-question">1</span>/<span id="total-questions">0</span>
                        <div class="progress-bar">
                            <div class="progress-fill" id="progress-fill"></div>
                        </div>
                    </div>
                </div>

                <!-- Kontainer Pertanyaan -->
                <div id="question-container">
                    <div class="question-container">
                        <div class="question-text" id="question-text">Memuat soal...</div>
                        <div class="options-container" id="options-container">
                            <!-- Opsi akan dimasukkan di sini oleh JavaScript -->
                        </div>
                    </div>

                    <!-- Tombol Navigasi -->
                    <div class="navigation-buttons">
                        <button class="btn btn-outline" id="prev-btn" disabled>
                            <i class="fas fa-arrow-left me-1"></i>Sebelumnya
                        </button>
                        <button class="btn btn-primary" id="next-btn">
                            Berikutnya <i class="fas fa-arrow-right ms-1"></i>
                        </button>
                        <button class="btn btn-success" id="submit-btn" style="display: none;">
                            <i class="fas fa-paper-plane me-1"></i>Kirim Jawaban
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar navigasi soal -->
        <div class="quiz-sidebar">
            <!-- Timer -->
            <div class="quiz-timer">
                <h5><i class="fas fa-clock"></i> Waktu Tersisa</h5>
                <div id="timer" class="h3 mb-0">30:00</div>
                <small>Waktu mulai: <span id="startTime"></span></small>
            </div>
            
            <div class="question-nav">
                <div class="question-nav-title">Navigasi Soal</div>
                
                <div class="question-nav-stats">
                    <div>Terjawab: <span class="answered-count" id="answered-count">0</span></div>
                    <div>Belum: <span class="unanswered-count" id="unanswered-count">0</span></div>
                </div>
                
                <div class="question-numbers" id="question-numbers">
                    <!-- Nomor soal akan dimasukkan di sini oleh JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <!-- Form tersembunyi untuk submit -->
    <form id="quizForm" method="POST" action="/kuis/submit" style="display: none;">
        @csrf
        <input type="hidden" name="nama_kuis" value="evaluasi">
        <input type="hidden" name="waktu_mulai" id="waktuMulai" value="{{ time() }}">
        <input type="hidden" name="waktu_selesai" id="waktuSelesai" value="">
        <!-- Input jawaban akan ditambahkan oleh JavaScript -->
    </form>

    <!-- Modal Hasil Evaluasi -->
    <div class="modal fade" id="hasilModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-trophy me-2"></i>Hasil Evaluasi
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Konten modal hasil -->
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-primary me-3" id="retry-btn">
                        <i class="fas fa-redo me-2"></i>Ulangi Evaluasi
                    </button>
                    <button type="button" class="btn btn-primary" id="home-btn">
                        <i class="fas fa-home me-2"></i>Kembali ke Beranda
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    class QuizManager {
        constructor(quizData, quizId) {
            this.quizData = quizData;
            this.quizId = quizId;
            this.currentQuestionIndex = 0;
            this.userAnswers = Array(quizData.length).fill(null);
            this.timeLeft = 30 * 60; // 30 menit untuk evaluasi
            this.timerInterval = null;
            this.startTime = new Date();
            
            this.initializeElements();
            this.bindEvents();
        }

        initializeElements() {
            this.elements = {
                questionText: document.getElementById('question-text'),
                optionsContainer: document.getElementById('options-container'),
                currentQuestion: document.getElementById('current-question'),
                totalQuestions: document.getElementById('total-questions'),
                progressFill: document.getElementById('progress-fill'),
                prevBtn: document.getElementById('prev-btn'),
                nextBtn: document.getElementById('next-btn'),
                submitBtn: document.getElementById('submit-btn'),
                quizForm: document.getElementById('quizForm'),
                questionNumbers: document.getElementById('question-numbers'),
                answeredCount: document.getElementById('answered-count'),
                unansweredCount: document.getElementById('unanswered-count'),
                timer: document.getElementById('timer'),
                startTime: document.getElementById('startTime'),
                loadingOverlay: document.getElementById('loadingOverlay'),
                waktuMulai: document.getElementById('waktuMulai')
            };

            // Validasi elemen penting
            if (!this.elements.questionText || !this.elements.optionsContainer) {
                console.error('Elemen kuis penting tidak ditemukan');
                throw new Error('Elemen kuis tidak ditemukan');
            }
        }

        bindEvents() {
            this.elements.prevBtn.addEventListener('click', () => this.prevQuestion());
            this.elements.nextBtn.addEventListener('click', () => this.nextQuestion());
            this.elements.submitBtn.addEventListener('click', () => this.submitQuiz());
            
            const retryBtn = document.getElementById('retry-btn');
            const homeBtn = document.getElementById('home-btn');
            
            if (retryBtn) {
                retryBtn.addEventListener('click', () => window.location.reload());
            }
            if (homeBtn) {
                homeBtn.addEventListener('click', () => window.location.href = '/home');
            }
        }

        init() {
            this.elements.waktuMulai.value = Math.floor(this.startTime.getTime() / 1000);
            this.elements.startTime.textContent = this.startTime.toLocaleTimeString();
            this.elements.totalQuestions.textContent = this.quizData.length;
            
            // Update petunjuk modal
            const totalSoalPetunjuk = document.getElementById('total-soal-petunjuk');
            if (totalSoalPetunjuk) {
                totalSoalPetunjuk.textContent = this.quizData.length;
            }
            
            this.createQuestionNumbers();
            this.showQuestion();
            this.startTimer();
            this.updateProgress();
            this.updateAnswerStats();
            
            // Tampilkan modal petunjuk
            const petunjukModal = new bootstrap.Modal(document.getElementById('petunjukModal'));
            petunjukModal.show();
        }

        startTimer() {
            this.timerInterval = setInterval(() => {
                this.timeLeft--;
                
                if (this.timeLeft <= 0) {
                    this.autoSubmit();
                    return;
                }
                
                this.updateTimerDisplay();
            }, 1000);
        }

        updateTimerDisplay() {
            const minutes = Math.floor(this.timeLeft / 60);
            const seconds = this.timeLeft % 60;
            this.elements.timer.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            if (this.timeLeft < 60) {
                this.elements.timer.style.color = '#ff4444';
            }
        }

        autoSubmit() {
            clearInterval(this.timerInterval);
            Swal.fire({
                title: 'Waktu Habis!',
                text: 'Jawaban Anda akan dikirim secara otomatis.',
                icon: 'warning',
                confirmButtonText: 'OK'
            }).then(() => {
                this.processSubmit();
            });
        }

        createQuestionNumbers() {
            this.elements.questionNumbers.innerHTML = '';
            
            this.quizData.forEach((_, index) => {
                const numberEl = document.createElement('div');
                numberEl.className = 'question-number';
                numberEl.textContent = index + 1;
                numberEl.addEventListener('click', () => this.navigateToQuestion(index));
                this.elements.questionNumbers.appendChild(numberEl);
            });
        }

        navigateToQuestion(index) {
            this.currentQuestionIndex = index;
            this.showQuestion();
            this.updateProgress();
        }

        showQuestion() {
            // Cek jika quizData kosong
            if (!this.quizData || this.quizData.length === 0) {
                console.error('Tidak ada data soal');
                this.elements.questionText.textContent = 'Tidak ada soal yang tersedia.';
                this.elements.optionsContainer.innerHTML = '<p>Silakan hubungi administrator.</p>';
                return;
            }

            const question = this.quizData[this.currentQuestionIndex];
            this.elements.questionText.textContent = question.question;
            this.elements.optionsContainer.innerHTML = '';
            
            if (question.options && question.options.length > 0) {
                question.options.forEach((option, index) => {
                    const optionEl = this.createOptionElement(option, index);
                    this.elements.optionsContainer.appendChild(optionEl);
                });
            } else {
                this.elements.optionsContainer.innerHTML = '<p>Tidak ada pilihan jawaban.</p>';
            }
            
            this.updateNavigationButtons();
            this.elements.currentQuestion.textContent = this.currentQuestionIndex + 1;
            this.updateQuestionNumbers();
        }

        createOptionElement(option, index) {
            const optionEl = document.createElement('label');
            optionEl.className = 'option';
            if (this.userAnswers[this.currentQuestionIndex] === index) {
                optionEl.classList.add('selected');
            }
            
            optionEl.innerHTML = `
                <input type="radio" name="option" value="${index}">
                <div class="option-label">
                    <div class="option-marker"></div>
                    <div class="option-text">${option}</div>
                </div>
            `;
            
            optionEl.addEventListener('click', () => this.selectOption(index));
            return optionEl;
        }

        updateNavigationButtons() {
            this.elements.prevBtn.disabled = this.currentQuestionIndex === 0;
            
            if (this.currentQuestionIndex === this.quizData.length - 1) {
                this.elements.nextBtn.style.display = 'none';
                this.elements.submitBtn.style.display = 'block';
            } else {
                this.elements.nextBtn.style.display = 'block';
                this.elements.submitBtn.style.display = 'none';
            }
        }

        updateQuestionNumbers() {
            const numberElements = this.elements.questionNumbers.querySelectorAll('.question-number');
            
            numberElements.forEach((el, index) => {
                el.classList.remove('active', 'answered');
                
                if (index === this.currentQuestionIndex) {
                    el.classList.add('active');
                }
                
                if (this.userAnswers[index] !== null) {
                    el.classList.add('answered');
                }
            });
        }

        selectOption(optionValue) {
            this.userAnswers[this.currentQuestionIndex] = optionValue;
            this.showQuestion();
            this.updateAnswerStats();
            this.saveProgress();
        }

        nextQuestion() {
            if (this.currentQuestionIndex < this.quizData.length - 1) {
                this.currentQuestionIndex++;
                this.showQuestion();
                this.updateProgress();
            }
        }

        prevQuestion() {
            if (this.currentQuestionIndex > 0) {
                this.currentQuestionIndex--;
                this.showQuestion();
                this.updateProgress();
            }
        }

        updateAnswerStats() {
            const answered = this.userAnswers.filter(answer => answer !== null).length;
            const unanswered = this.quizData.length - answered;
            
            this.elements.answeredCount.textContent = answered;
            this.elements.unansweredCount.textContent = unanswered;
        }

        updateProgress() {
            const progress = ((this.currentQuestionIndex + 1) / this.quizData.length) * 100;
            this.elements.progressFill.style.width = `${progress}%`;
        }

        submitQuiz() {
            const unanswered = this.userAnswers.filter(answer => answer === null).length;
            if (unanswered > 0 && this.timeLeft > 0) {
                Swal.fire({
                    title: 'Perhatian!',
                    text: `Anda masih memiliki ${unanswered} soal yang belum dijawab.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Kirim',
                    cancelButtonText: 'Tidak, Lanjutkan Mengerjakan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.processSubmit();
                    }
                });
            } else {
                this.processSubmit();
            }
        }

        processSubmit() {
            clearInterval(this.timerInterval);
            
            const waktuSelesai = Math.floor(new Date().getTime() / 1000);
            
            // Clear and rebuild form
            this.elements.quizForm.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="nama_kuis" value="evaluasi">
                <input type="hidden" name="waktu_mulai" value="${this.elements.waktuMulai.value}">
                <input type="hidden" name="waktu_selesai" value="${waktuSelesai}">
            `;
            
            // Add answers to form
            this.quizData.forEach((question, index) => {
                const answer = this.userAnswers[index] !== null ? this.userAnswers[index] : '';
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = `jawaban[${question.id}]`;
                input.value = answer;
                this.elements.quizForm.appendChild(input);
            });
            
            this.showLoading();
            localStorage.removeItem('kuis_answers');
            this.elements.quizForm.submit();
        }

        showLoading() {
            if (this.elements.loadingOverlay) {
                this.elements.loadingOverlay.style.display = 'flex';
            }
        }

        saveProgress() {
            const answers = {};
            this.quizData.forEach((question, index) => {
                if (this.userAnswers[index] !== null) {
                    answers[question.id] = this.userAnswers[index];
                }
            });
            
            localStorage.setItem('kuis_answers', JSON.stringify({
                quizId: this.quizId,
                answers: answers,
                timestamp: new Date().getTime()
            }));
        }
    }

    // Inisialisasi evaluasi saat DOM ready
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Ambil data soal dari database via AJAX
            fetch('/api/soal/evaluasi')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(quizData => {
                    console.log('Evaluasi Data:', quizData);
                    
                    if (!quizData || quizData.length === 0) {
                        console.error('Tidak ada data soal yang diterima');
                        document.getElementById('question-container').innerHTML = `
                            <div class="alert alert-danger">
                                <h4>Error</h4>
                                <p>Tidak ada soal evaluasi yang tersedia atau terjadi kesalahan dalam memuat soal.</p>
                                <a href="/home" class="btn btn-primary">Kembali ke Beranda</a>
                            </div>
                        `;
                        return;
                    }
                    
                    const quizManager = new QuizManager(quizData, 'evaluasi');
                    quizManager.init();
                    
                })
                .catch(error => {
                    console.error('Error fetching soal:', error);
                    document.getElementById('question-container').innerHTML = `
                        <div class="alert alert-danger">
                            <h4>Error</h4>
                            <p>Terjadi kesalahan dalam memuat soal evaluasi: ${error.message}</p>
                            <a href="/home" class="btn btn-primary">Kembali ke Beranda</a>
                        </div>
                    `;
                });
            
        } catch (error) {
            console.error('Error initializing evaluasi:', error);
            if (document.getElementById('question-container')) {
                document.getElementById('question-container').innerHTML = `
                    <div class="alert alert-danger">
                        <h4>Error</h4>
                        <p>Terjadi kesalahan dalam memuat evaluasi: ${error.message}</p>
                        <a href="/home" class="btn btn-primary">Kembali ke Beranda</a>
                    </div>
                `;
            }
        }
    });
    </script>
</body>
</html>

{{-- <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis - Media Pembelajaran</title>
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #f9fafb;
            --text-color: #1f2937;
            --correct-color: #10b981;
            --incorrect-color: #ef4444;
            --border-color: #e5e7eb;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: var(--text-color);
            line-height: 1.6;
        }

        .page-container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            gap: 1.5rem;
        }

        .header-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 1rem 0 1rem;
        }

        .home-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            transition: background-color 0.2s ease;
        }

        .home-btn:hover {
            background-color: #4338ca;
        }

        .quiz-main {
            flex: 1;
        }

        .quiz-container {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .quiz-sidebar {
            width: 250px;
            position: sticky;
            top: 1rem;
            align-self: flex-start;
        }

        .question-nav {
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
        }

        .question-nav-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }

        .question-numbers {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 0.5rem;
        }

        .question-number {
            width: 100%;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: var(--secondary-color);
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
        }

        .question-number:hover {
            background-color: #e0e7ff;
        }

        .question-number.active {
            background-color: var(--primary-color);
            color: white;
        }

        .question-number.answered {
            background-color: #d1fae5;
            color: var(--text-color);
        }

        .quiz-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .quiz-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
        }

        .quiz-progress {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .progress-bar {
            width: 200px;
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background-color: var(--primary-color);
            width: 0%;
            transition: width 0.3s ease;
        }

        .question-container {
            margin-bottom: 2rem;
        }

        .question-text {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .options-container {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .option {
            padding: 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .option:hover {
            background-color: var(--secondary-color);
        }

        .option.selected {
            border-color: var(--primary-color);
            background-color: rgba(79, 70, 229, 0.05);
        }

        .option.correct {
            border-color: var(--correct-color);
            background-color: rgba(16, 185, 129, 0.05);
        }

        .option.incorrect {
            border-color: var(--incorrect-color);
            background-color: rgba(239, 68, 68, 0.05);
        }

        .option input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .option-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .option-marker {
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid var(--border-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .option.selected .option-marker {
            border-color: var(--primary-color);
        }

        .option.selected .option-marker::after {
            content: '';
            width: 0.75rem;
            height: 0.75rem;
            background-color: var(--primary-color);
            border-radius: 50%;
        }

        .option-text {
            flex-grow: 1;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #4338ca;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--border-color);
            color: var(--text-color);
        }

        .btn-outline:hover {
            background-color: var(--secondary-color);
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .quiz-result {
            text-align: center;
            padding: 2rem;
            display: none;
        }

        .result-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .result-score {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .result-message {
            margin-bottom: 2rem;
            color: #6b7280;
        }

        .feedback-container {
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 0.375rem;
            display: none;
        }

        .feedback-correct {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--correct-color);
        }

        .feedback-incorrect {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--incorrect-color);
        }
        .question-nav-stats {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
        }
        
        .answered-count {
            color: var(--correct-color);
            font-weight: 500;
        }
        
        .unanswered-count {
            color: var(--incorrect-color);
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .page-container {
                flex-direction: column;
                padding: 0;
            }

            .header-container {
                padding: 1rem 1rem 0 1rem;
            }

            .quiz-sidebar {
                width: 100%;
                position: static;
                order: -1;
                margin-bottom: 1rem;
            }

            .quiz-container {
                margin: 0 1rem 2rem 1rem;
                padding: 1.5rem;
            }

            .quiz-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .progress-bar {
                width: 100%;
            }

            .navigation-buttons {
                flex-direction: column-reverse;
                gap: 0.75rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Header dengan tombol home -->
    <div class="header-container">
        <a href="/home" class="home-btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="page-container">
        <!-- Konten utama kuis -->
        <div class="quiz-main">
            <div class="quiz-container">
                <!-- Header Kuis -->
                <div class="quiz-header">
                    <div class="quiz-title">EVALUASI</div>
                    <div class="quiz-progress">
                        <span id="current-question">1</span>/<span id="total-questions">5</span>
                        <div class="progress-bar">
                            <div class="progress-fill" id="progress-fill"></div>
                        </div>
                    </div>
                </div>

                <!-- Kontainer Pertanyaan -->
                <div id="question-container">
                    <div class="question-container">
                        <div class="question-text" id="question-text">Apa itu sistem pertahanan tubuh</div>
                        <div class="options-container" id="options-container">
                            <!-- Opsi akan dimasukkan di sini oleh JavaScript -->
                        </div>
                        <div class="feedback-container" id="feedback-container">
                            <!-- Umpan balik akan dimasukkan di sini -->
                        </div>
                    </div>

                    <!-- Tombol Navigasi -->
                    <div class="navigation-buttons">
                        <button class="btn btn-outline" id="prev-btn" disabled>Sebelumnya</button>
                        <button class="btn btn-primary" id="next-btn">Berikutnya</button>
                        <button class="btn btn-primary" id="submit-btn" style="display: none;">Kirim Kuis</button>
                    </div>
                </div>

                <!-- Hasil Kuis -->
                <div class="quiz-result" id="quiz-result">
                    <div class="result-icon">🎉</div>
                    <div class="result-score">Skor Anda <span id="score">0</span>/<span id="total">5</span></div>
                    <div class="result-message" id="result-message">Terus berlatih untuk meningkatkan kemampuan Anda!</div>
                    <button class="btn btn-primary" id="retry-btn">Coba Lagi</button>
                </div>
            </div>
        </div>

        <!-- Sidebar navigasi soal -->
        <div class="quiz-sidebar">
            <div class="question-nav">
                <div class="question-nav-title">Navigasi Soal</div>
                
                <!-- Tambahkan statistik jawaban -->
                <div class="question-nav-stats">
                    <div>Terjawab: <span class="answered-count" id="answered-count">0</span></div>
                    <div>Belum terjawab: <span class="unanswered-count" id="unanswered-count">0</span></div>
                </div>
                
                <div class="question-numbers" id="question-numbers">
                    <!-- Nomor soal akan dimasukkan di sini oleh JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data kuis - di aplikasi nyata, ini akan berasal dari backend Laravel Anda
        const quizData = [
            {
                question: "Protein komplemen berperan penting dalam sistem pertahanan tubuh. Senyawa ini membunuh bakteri penginfeksi dengan cara . . . .",
                options: [
                "menimbulkan respons peradangan (inflamasi)",
                "merangsang limfosit untuk membentuk antibodi",
                "membentuk lubang pada membran plasma bakteri",
                "menonaktifkan antigen pada permukaan sel bakteri",
                "memberikan sinyal pada makrofag untuk memfagosit bakteri",
                ],
                correctAnswer: 2,
                feedback: ""
            },{
                question: "Perhatikan pernyataan-pernyataan berikut! 1) Respons kekebalan humoral melibatkan peran sel B pengingat. 2) Respons kekebalan humoral melibatkan makrofag untuk melawan antigen. 3) Respons kekebalan seluler menghancurkan antigen dengan melibatkan makrofag. 4) Respons kekebalan seluler menyerang antigen dengan membentuk antibodi. Pernyataan yang tepat mengenai sistem kekebalan tubuh ditunjukkan oleh nomor . . . . ",
                options: [
                "1) dan 2) ",
                "1) dan 3) ",
                "2) dan 3)",
                "2) dan 4) ",
                "3) dan 4) ",

                ],
                correctAnswer: 1,
                feedback: ""
            },
            
            {
                question: "Ketika ada patogen dari jenis yang sama menyerang tubuh, sel B pengingat akan menstimulasi sel B pembelah untuk membentuk sel B plasma. Selanjutnya, sel B plasma akan membentuk antibodi untuk melawan patogen tersebut. Peristiwa tersebut menunjukkan mekanisme . . . .",
                options: [
                    "respons imun primer",
                    "respons imun seluler",
                    "respons imun sekunder",
                    "respons pertahanan spesifik",
                    "respons pertahanan nonspesifik",
                ],
                correctAnswer: 3,
                feedback: "."
            },
            {
                question: "7.	Perhatikan pernyataan-pernyataan berikut! 1) Enzim lisozim diproduksi untuk menghidrolisis dinding sel bakteri. 2) Partikel berbahaya diperangkap dalam lendir. 3) Mastosit mengeluarkan histamin dan prostaglandin. 4) Sel-sel fagosit memakan patogen. 5) Interferon mencegah virus bereplikasi. Pernyataan yang berhubungan dengan reaksi inflamasi ditunjukkan oleh nomor . . . .",
                options: [
                "1) dan 2) ",
                "1) dan 3) ",
                "2) dan 3)",
                "3) dan 4) ",
                "4) dan 5) ",
                ],
                correctAnswer: 3,
                feedback: ""
            },
            {
                question: "Alergi merupakan respons imun yang berlebihan terhadap senyawa yang masuk ke tubuh. Untuk menghentikan gejala alergi dapat dilakukan dengan pemberian . . . . ",
                options: [
                "kulit menghalangi masuknya virus ke dalam tubuh",
                "sel T pembunuh menyerang sel tubuh yang terinfeksi virus",
                "asam lambung membunuh virus yang masuk melalui makanan",
                "rambut hidung menyaring partikel virus dari udara",
                "lisozim dalam air mata menghancurkan dinding sel virus",
                ],
                correctAnswer: 3,
                feedback: ""
            },
            {
                question: "Lupus merupakan penyakit autoimunitas yang terjadi akibat . . . . ",
                options: [
                "antibodi menyerang otot lurik ",
                "serangan virus terhadap sel T ",
                "antibodi menyerang kelenjar adrenal ",
                "antibodi menyerang sel-sel penyusun sendi ",
                "peradangan oleh senyawa kimia hasil sekresi sel fagosit",
                ],
                correctAnswer: 2,
                feedback: ""
            },
            {
                question: "Tubuh memproduksi berbagai jenis antibodi karena . . . .",
                options: [
                "antibodi tidak dapat bekerja untuk kedua kalinya" ,
                "antigen pada setiap patogen bersifat spesifik" ,
                "beberapa antibodi ditujukan untuk satu jenis antigen" ,
                "satu jenis antigen dapat mengalahkan beberapa antibodi" ,
                "setelah melawan antigen, antibodi langsung dikeluarkan oleh tubuh",
                ],
                correctAnswer: 1,
                feedback: ""
            },
            {
                question: "Perbedaan utama antara kekebalan humoral dan kekebalan seluler adalah ....",
                options: [
                "kekebalan humoral melibatkan sel T, sedangkan kekebalan seluler melibatkan sel B",
                "kekebalan humoral menghasilkan antibodi, sedangkan kekebalan seluler menghancurkan sel yang terinfeksi",
                "kekebalan humoral hanya melindungi dari bakteri, sedangkan kekebalan seluler melindungi dari virus",
                "kekebalan humoral bersifat nonspesifik, sedangkan kekebalan seluler bersifat spesifik",
                "kekebalan humoral melibatkan sel darah merah, sedangkan kekebalan seluler melibatkan sel darah putih",

                ],
                correctAnswer: 1,
                feedback: ""
            },
            {
                question: "Jika seseorang divaksinasi, mekanisme kekebalan yang terjadi adalah ....",
                options: [
                "sistem pertahanan nonspesifik langsung menghancurkan patogen",
                "sel B pengingat mengingat antigen dan memicu respons imun lebih cepat jika terpapar patogen yang sama di masa depan",
                "sel T supresor menghentikan respons imun setelah vaksinasi",
                "asam lambung membunuh patogen yang masuk melalui makanan",
                "lisozim dalam air liur menghancurkan dinding sel patogen",

                ],
                correctAnswer: 1,
                feedback: ""
            },
            {
                question: "Salah satu contoh pertahanan kimiawi pada sistem pertahanan nonspesifik adalah ....",
                options: [
                 "rambut hidung",
                "lisozim dalam air mata",
                "sel B pembunuh",
                "antibodi",
                "sel B plasma",

                ],
                correctAnswer: 1,
                feedback: ""
            },
        ];

        // Elemen DOM
        const questionText = document.getElementById('question-text');
        const optionsContainer = document.getElementById('options-container');
        const currentQuestionEl = document.getElementById('current-question');
        const totalQuestionsEl = document.getElementById('total-questions');
        const progressFill = document.getElementById('progress-fill');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const submitBtn = document.getElementById('submit-btn');
        const quizContainer = document.getElementById('question-container');
        const quizResult = document.getElementById('quiz-result');
        const scoreEl = document.getElementById('score');
        const totalEl = document.getElementById('total');
        const resultMessage = document.getElementById('result-message');
        const retryBtn = document.getElementById('retry-btn');
        const feedbackContainer = document.getElementById('feedback-container');
        const questionNumbersContainer = document.getElementById('question-numbers');
        const answeredCountEl = document.getElementById('answered-count');
        const unansweredCountEl = document.getElementById('unanswered-count');

        // State kuis
        let currentQuestionIndex = 0;
        let userAnswers = Array(quizData.length).fill(null);
        let quizSubmitted = false;

        // Inisialisasi kuis
        function initQuiz() {
            totalQuestionsEl.textContent = quizData.length;
            totalEl.textContent = quizData.length;
            createQuestionNumbers();
            showQuestion();
            updateProgress();
            updateAnswerStats();
        }

        // Buat nomor soal di sidebar
        function createQuestionNumbers() {
            questionNumbersContainer.innerHTML = '';
            
            quizData.forEach((_, index) => {
                const numberEl = document.createElement('div');
                numberEl.className = 'question-number';
                numberEl.textContent = index + 1;
                numberEl.addEventListener('click', () => navigateToQuestion(index));
                
                questionNumbersContainer.appendChild(numberEl);
            });
        }

        // Navigasi ke soal tertentu
        function navigateToQuestion(index) {
            if (quizSubmitted) return;
            
            currentQuestionIndex = index;
            showQuestion();
            updateProgress();
            updateAnswerStats();
        }

        // Tampilkan pertanyaan saat ini
        function showQuestion() {
            const question = quizData[currentQuestionIndex];
            questionText.textContent = question.question;
            
            // Hapus opsi sebelumnya
            optionsContainer.innerHTML = '';
            
            // Buat opsi baru
            question.options.forEach((option, index) => {
                const optionEl = document.createElement('label');
                optionEl.className = 'option';
                if (userAnswers[currentQuestionIndex] === index) {
                    optionEl.classList.add('selected');
                }
                if (quizSubmitted) {
                    if (index === question.correctAnswer) {
                        optionEl.classList.add('correct');
                    } else if (userAnswers[currentQuestionIndex] === index && index !== question.correctAnswer) {
                        optionEl.classList.add('incorrect');
                    }
                }
                
                optionEl.innerHTML = `
                    <input type="radio" name="option" value="${index}" ${userAnswers[currentQuestionIndex] === index ? 'checked' : ''}>
                    <div class="option-label">
                        <div class="option-marker"></div>
                        <div class="option-text">${option}</div>
                    </div>
                `;
                
                optionEl.addEventListener('click', () => selectOption(index));
                optionsContainer.appendChild(optionEl);
            });
            
            // Perbarui tombol navigasi
            prevBtn.disabled = currentQuestionIndex === 0;
            
            if (currentQuestionIndex === quizData.length - 1) {
                nextBtn.style.display = 'none';
                submitBtn.style.display = 'block';
            } else {
                nextBtn.style.display = 'block';
                submitBtn.style.display = 'none';
            }
            
            // Tampilkan umpan balik jika kuis sudah dikirim
            if (quizSubmitted) {
                feedbackContainer.textContent = question.feedback;
                feedbackContainer.className = 'feedback-container';
                feedbackContainer.classList.add(
                    userAnswers[currentQuestionIndex] === question.correctAnswer ? 
                    'feedback-correct' : 'feedback-incorrect'
                );
                feedbackContainer.style.display = 'block';
            } else {
                feedbackContainer.style.display = 'none';
            }
            
            // Perbarui nomor pertanyaan saat ini
            currentQuestionEl.textContent = currentQuestionIndex + 1;
            
            // Perbarui tampilan nomor soal di sidebar
            updateQuestionNumbers();
        }

        // Perbarui tampilan nomor soal di sidebar
        function updateQuestionNumbers() {
            const numberElements = questionNumbersContainer.querySelectorAll('.question-number');
            
            numberElements.forEach((el, index) => {
                el.classList.remove('active', 'answered');
                
                if (index === currentQuestionIndex) {
                    el.classList.add('active');
                }
                
                if (userAnswers[index] !== null) {
                    el.classList.add('answered');
                }
            });
        }

        // Pilih opsi
        function selectOption(optionIndex) {
            if (quizSubmitted) return;
            
            userAnswers[currentQuestionIndex] = optionIndex;
            showQuestion();
            updateAnswerStats();
        }

        // Navigasi ke pertanyaan berikutnya
        function nextQuestion() {
            if (currentQuestionIndex < quizData.length - 1) {
                currentQuestionIndex++;
                showQuestion();
                updateProgress();
            }
        }

        // Navigasi ke pertanyaan sebelumnya
        function prevQuestion() {
            if (currentQuestionIndex > 0) {
                currentQuestionIndex--;
                showQuestion();
                updateProgress();
            }
        }
        // update statistik jawaban
        function updateAnswerStats() {
            const answered = userAnswers.filter(answer => answer !== null).length;
            const unanswered = quizData.length - answered;
            
            answeredCountEl.textContent = answered;
            unansweredCountEl.textContent = unanswered;
        }
        // Perbarui progress bar
        function updateProgress() {
            const progress = ((currentQuestionIndex + 1) / quizData.length) * 100;
            progressFill.style.width = `${progress}%`;
        }

        // Kirim kuis
        function submitQuiz() {
            quizSubmitted = true;
            
            // Hitung skor
            let score = 0;
            quizData.forEach((question, index) => {
                if (userAnswers[index] === question.correctAnswer) {
                    score++;
                }
            });
            
            // Tampilkan hasil
            quizContainer.style.display = 'none';
            quizResult.style.display = 'block';
            scoreEl.textContent = score;
            
            // Atur pesan hasil berdasarkan skor
            const percentage = (score / quizData.length) * 100;
            if (percentage >= 80) {
                resultMessage.textContent = "Kerja bagus! Anda memiliki pemahaman yang kuat tentang Mekanisme Sistem Pertahanan Tubuh.";
            } else if (percentage >= 50) {
                resultMessage.textContent = "Usaha yang baik! Tinjau pertanyaan yang Anda lewatkan untuk meningkatkan pengetahuan Anda.";
            } else {
                resultMessage.textContent = "Terus berlatih! Pertimbangkan untuk meninjau ulang materi Mekanisme Sistem Pertahanan Tubuh untuk memperkuat pemahaman Anda.";
            }
        }

        // Ulangi kuis
        function retryQuiz() {
            currentQuestionIndex = 0;
            userAnswers = Array(quizData.length).fill(null);
            quizSubmitted = false;
            quizContainer.style.display = 'block';
            quizResult.style.display = 'none';
            showQuestion();
            updateProgress();
            updateAnswerStats();
        }

        // Event listeners
        nextBtn.addEventListener('click', nextQuestion);
        prevBtn.addEventListener('click', prevQuestion);
        submitBtn.addEventListener('click', submitQuiz);
        retryBtn.addEventListener('click', retryQuiz);

        // Inisialisasi kuis
        initQuiz();
    </script>
</body>
</html> --}}