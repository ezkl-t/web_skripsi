<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }} - Sistem Pertahanan Tubuh</title>
    
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
                    <h1><i class="fas fa-brain"></i> {{ $title }}</h1>
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
        @include('partials.messages')

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
    </div>

    <div class="page-container">
        <!-- Konten utama kuis -->
        <div class="quiz-main">
            <div class="quiz-container">
                <!-- Header Kuis -->
                <div class="quiz-header-inner">
                    <div class="quiz-title">{{ $title }}</div>
                    <div class="quiz-progress">
                        <span id="current-question">1</span>/<span id="total-questions">{{ count($soal) }}</span>
                        <div class="progress-bar">
                            <div class="progress-fill" id="progress-fill"></div>
                        </div>
                    </div>
                </div>

                <!-- Kontainer Pertanyaan -->
                <div id="question-container">
                    <div class="question-container">
                        <div class="question-text" id="question-text"></div>
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
                <div id="timer" class="h3 mb-0">15:00</div>
                <small>Waktu mulai: <span id="startTime"></span></small>
            </div>
            
            <div class="question-nav">
                <div class="question-nav-title">Navigasi Soal</div>
                
                <div class="question-nav-stats">
                    <div>Terjawab: <span class="answered-count" id="answered-count">0</span></div>
                    <div>Belum: <span class="unanswered-count" id="unanswered-count">{{ count($soal) }}</span></div>
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
        <input type="hidden" name="nama_kuis" value="{{ $quizId }}">
        <input type="hidden" name="waktu_mulai" id="waktuMulai" value="{{ time() }}">
        <input type="hidden" name="waktu_selesai" id="waktuSelesai" value="">
        <!-- Input jawaban akan ditambahkan oleh JavaScript -->
    </form>

    <!-- Modal Hasil Kuis -->
    <div class="modal fade" id="hasilModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-trophy me-2"></i>Hasil Kuis
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <!-- Konten modal hasil -->
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-primary me-3" id="retry-btn">
                        <i class="fas fa-redo me-2"></i>Ulangi Kuis
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
            this.timeLeft = 15 * 60; // 15 menit
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
                homeBtn.addEventListener('click', () => window.location.href = '/beranda');
            }
        }

        init() {
            this.elements.waktuMulai.value = Math.floor(this.startTime.getTime() / 1000);
            this.elements.startTime.textContent = this.startTime.toLocaleTimeString();
            
            this.createQuestionNumbers();
            this.showQuestion();
            this.startTimer();
            this.updateProgress();
            this.updateAnswerStats();
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
                question.options.forEach(option => {
                    const optionEl = this.createOptionElement(option);
                    this.elements.optionsContainer.appendChild(optionEl);
                });
            } else {
                this.elements.optionsContainer.innerHTML = '<p>Tidak ada pilihan jawaban.</p>';
            }
            
            this.updateNavigationButtons();
            this.elements.currentQuestion.textContent = this.currentQuestionIndex + 1;
            this.updateQuestionNumbers();
        }

        createOptionElement(option) {
            const optionEl = document.createElement('label');
            optionEl.className = 'option';
            if (this.userAnswers[this.currentQuestionIndex] === option.option) {
                optionEl.classList.add('selected');
            }
            
            optionEl.innerHTML = `
                <input type="radio" name="option" value="${option.option}">
                <div class="option-label">
                    <div class="option-marker"></div>
                    <div class="option-text">${option.text}</div>
                </div>
            `;
            
            optionEl.addEventListener('click', () => this.selectOption(option.option));
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
                <input type="hidden" name="nama_kuis" value="${this.quizId}">
                <input type="hidden" name="waktu_mulai" value="${this.elements.waktuMulai.value}">
                <input type="hidden" name="waktu_selesai" value="${waktuSelesai}">
            `;
            
            // Add answers to form
            this.quizData.forEach((question, index) => {
                const answer = this.userAnswers[index] || '';
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
                if (this.userAnswers[index]) {
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

    // Inisialisasi kuis saat DOM ready - DIPERBAIKI
    document.addEventListener('DOMContentLoaded', function() {
        try {
            // Data soal dari Laravel
            const quizData = {!! isset($soalFormatted) ? json_encode($soalFormatted) : '[]' !!};
            const quizId = '{{ $quizId ?? 'kuis1' }}';
            
            console.log('Quiz Data:', quizData);
            console.log('Quiz ID:', quizId);
            
            if (!quizData || quizData.length === 0) {
                console.error('Tidak ada data soal yang diterima');
                document.getElementById('question-container').innerHTML = `
                    <div class="alert alert-danger">
                        <h4>Error</h4>
                        <p>Tidak ada soal yang tersedia atau terjadi kesalahan dalam memuat soal.</p>
                        <a href="/beranda" class="btn btn-primary">Kembali ke Beranda</a>
                    </div>
                `;
                return;
            }
            
            const quizManager = new QuizManager(quizData, quizId);
            quizManager.init();
            
            // Hanya tampilkan modal petunjuk jika elemen ada
            const petunjukModalEl = document.getElementById('petunjukModal');
            if (petunjukModalEl) {
                const petunjukModal = new bootstrap.Modal(petunjukModalEl);
                // petunjukModal.show(); // Sementara nonaktifkan dulu untuk testing
            }
            
        } catch (error) {
            console.error('Error initializing quiz:', error);
            if (document.getElementById('question-container')) {
                document.getElementById('question-container').innerHTML = `
                    <div class="alert alert-danger">
                        <h4>Error</h4>
                        <p>Terjadi kesalahan dalam memuat kuis: ${error.message}</p>
                        <a href="/beranda" class="btn btn-primary">Kembali ke Beranda</a>
                    </div>
                `;
            }
        }
    });
</script>
</body>
</html>