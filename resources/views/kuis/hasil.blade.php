<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Kuis - Sistem Pertahanan Tubuh</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        :root {
            --primary-color: #335C67;
            --secondary-color: #E09F3E;
            --accent-color: #9E2A2B;
            --light-color: #FFF3B0;
            --success-color: #28a745;
            --danger-color: #dc3545;
        }

        body {
            background: linear-gradient(135deg, var(--light-color) 0%, #ffffff 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .result-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
            text-align: center;
        }

        .score-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }

        .score-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
        }

        .score-number {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .score-pass {
            color: var(--success-color);
        }

        .score-fail {
            color: var(--danger-color);
        }

        .grade-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: bold;
            font-size: 1.5rem;
            margin-top: 1rem;
        }

        .grade-A { background: #28a745; color: white; }
        .grade-B { background: #17a2b8; color: white; }
        .grade-C { background: #ffc107; color: black; }
        .grade-D { background: #fd7e14; color: white; }
        .grade-E { background: #dc3545; color: white; }

        .stats-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 1rem;
            border-left: 4px solid var(--secondary-color);
        }

        .detail-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .question-review {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #dee2e6;
        }

        .question-review.correct {
            border-left-color: var(--success-color);
            background: #d4edda;
        }

        .question-review.incorrect {
            border-left-color: var(--danger-color);
            background: #f8d7da;
        }

        .answer-option {
            padding: 0.8rem;
            margin: 0.5rem 0;
            border-radius: 8px;
            border: 1px solid #dee2e6;
        }

        .user-answer {
            background: #e7f3ff;
            border-color: #0066cc;
        }

        .correct-answer {
            background: #d4edda;
            border-color: var(--success-color);
        }

        .incorrect-answer {
            background: #f8d7da;
            border-color: var(--danger-color);
        }

        .btn-action {
            padding: 0.8rem 2rem;
            border-radius: 25px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            margin: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(51, 92, 103, 0.4);
            color: white;
        }

        .comparison-chart {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        @media (max-width: 768px) {
            .score-number {
                font-size: 3rem;
            }
            
            .result-header {
                padding: 2rem 0;
            }
            
            .score-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="result-header">
        <div class="container">
            <h1><i class="fas fa-trophy"></i> Hasil Kuis 1</h1>
            <p class="mb-0">Sistem Pertahanan Tubuh</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Score Card -->
            <div class="col-lg-4">
                <div class="score-card">
                    <h3>Nilai Anda</h3>
                    <div class="score-number {{ $hasil->nilai >= 70 ? 'score-pass' : 'score-fail' }}">
                        {{ $hasil->formatted_nilai }}
                    </div>
                    <div class="grade-badge grade-{{ $hasil->grade }}">
                        Grade {{ $hasil->grade }}
                    </div>
                    <p class="mt-3 mb-0">
                        <strong>{{ $hasil->status }}</strong>
                    </p>
                </div>

                <!-- Statistics -->
                <div class="stats-card">
                    <h5><i class="fas fa-chart-bar"></i> Statistik</h5>
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="text-success">
                                <i class="fas fa-check-circle fa-2x"></i>
                                <div><strong>{{ $hasil->jawaban_benar }}</strong></div>
                                <small>Benar</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-danger">
                                <i class="fas fa-times-circle fa-2x"></i>
                                <div><strong>{{ $hasil->jawaban_salah }}</strong></div>
                                <small>Salah</small>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <small class="text-muted">
                            <i class="fas fa-clock"></i> Waktu: {{ $hasil->formatted_waktu }}<br>
                            <i class="fas fa-calendar"></i> {{ $hasil->tanggal_kuis->format('d M Y, H:i') }}
                        </small>
                    </div>
                </div>

                <!-- Comparison -->
                <div class="stats-card">
                    <h5><i class="fas fa-users"></i> Perbandingan</h5>
                    <div class="mb-2">
                        <small>Rata-rata Kelas</small>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: {{ $rataRataNilai }}%">
                                {{ number_format($rataRataNilai, 1) }}
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <small>Nilai Anda</small>
                        <div class="progress">
                            <div class="progress-bar {{ $hasil->nilai >= $rataRataNilai ? 'bg-success' : 'bg-warning' }}" 
                                 style="width: {{ $hasil->nilai }}%">
                                {{ $hasil->formatted_nilai }}
                            </div>
                        </div>
                    </div>
                    <small class="text-muted">
                        <i class="fas fa-info-circle"></i> 
                        Total peserta: {{ $totalPeserta }} siswa
                    </small>
                </div>
            </div>

            <!-- Detailed Results -->
            <div class="col-lg-8">
                <!-- Performance Chart -->
                <div class="comparison-chart">
                    <h5><i class="fas fa-chart-pie"></i> Analisis Jawaban</h5>
                    <canvas id="performanceChart" width="400" height="200"></canvas>
                </div>

                <!-- Question Details -->
                <div class="detail-card">
                    <h5><i class="fas fa-list-check"></i> Review Jawaban</h5>
                    
                    @foreach($hasil->detail_jawaban as $index => $detail)
                        <div class="question-review {{ $detail['is_benar'] ? 'correct' : 'incorrect' }}">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h6>
                                    <span class="badge bg-secondary">{{ $index + 1 }}</span>
                                    @if($detail['is_benar'])
                                        <i class="fas fa-check-circle text-success"></i>
                                    @else
                                        <i class="fas fa-times-circle text-danger"></i>
                                    @endif
                                </h6>
                                <span class="badge {{ $detail['is_benar'] ? 'bg-success' : 'bg-danger' }}">
                                    {{ $detail['is_benar'] ? 'Benar' : 'Salah' }}
                                </span>
                            </div>
                            
                            <p class="question-text">{{ $detail['pertanyaan'] }}</p>
                            
                            <div class="answers">
                                @if(!$detail['is_benar'])
                                    <div class="answer-option incorrect-answer">
                                        <strong>Jawaban Anda ({{ $detail['jawaban_user'] }}):</strong> 
                                        {{ $detail['teks_jawaban_user'] }}
                                    </div>
                                @endif
                                
                                <div class="answer-option correct-answer">
                                    <strong>Jawaban Benar ({{ $detail['jawaban_benar'] }}):</strong> 
                                    {{ $detail['teks_jawaban_benar'] }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center mb-5">
            <a href="{{ route('kuis.index') }}" class="btn-action btn-primary-custom">
                <i class="fas fa-redo"></i> Ulangi Kuis
            </a>
            <a href="/home" class="btn-action btn-primary-custom">
                <i class="fas fa-book"></i> Kembali ke Materi
            </a>
            <a href="#" onclick="window.print()" class="btn-action btn-primary-custom">
                <i class="fas fa-print"></i> Cetak Hasil
            </a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Performance Chart
        const ctx = document.getElementById('performanceChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Jawaban Benar', 'Jawaban Salah'],
                datasets: [{
                    data: [{{ $hasil->jawaban_benar }}, {{ $hasil->jawaban_salah }}],
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });

        // Celebration effect for good scores
        @if($hasil->nilai >= 80)
            // Add confetti or celebration animation here
            document.addEventListener('DOMContentLoaded', function() {
                // Simple celebration - you can add more advanced animations
                const scoreCard = document.querySelector('.score-card');
                scoreCard.style.animation = 'pulse 2s infinite';
            });
        @endif

        // Print functionality
        function printResult() {
            window.print();
        }

        // Add CSS for print
        const printStyle = document.createElement('style');
        printStyle.textContent = `
            @media print {
                .btn-action, .comparison-chart { display: none !important; }
                body { background: white !important; }
                .score-card, .stats-card, .detail-card { 
                    box-shadow: none !important; 
                    border: 1px solid #ddd !important; 
                }
            }
        `;
        document.head.appendChild(printStyle);
    </script>
</body>
</html>