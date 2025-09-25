@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-chart-bar me-2"></i>Hasil Pengerjaan Semua Kuis</h4>
        </div>
        <div class="card-body">
            <!-- Data Peserta -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2">Data Peserta</h5>
                            <div class="row">
                                <div class="col-md-4 fw-bold">Nama</div>
                                <div class="col-md-8">: {{ Auth::user()->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 fw-bold">NISN</div>
                                <div class="col-md-8">: {{ Auth::user()->nisn }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 fw-bold">Kelas</div>
                                <div class="col-md-8">: {{ Auth::user()->kelas }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2">Progress Kuis</h5>
                            <div class="progress mb-3" style="height: 25px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $progressPercentage }}%;" 
                                    aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100">
                                    {{ $progressPercentage }}%
                                </div>
                            </div>
                            <div class="small text-muted">
                                <i class="fas fa-info-circle"></i> 
                                {{ $completedQuizCount }} dari {{ $totalQuizCount }} kuis telah diselesaikan
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Hasil Kuis -->
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Kuis</th>
                            <th>Nilai</th>
                            <th>Jawaban Benar</th>
                            <th>Total Soal</th>
                            <th>Status</th>
                            <th>Tanggal Pengerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quizResults as $type => $result)
                            <tr>
                                <td>
                                    @if($type == 'kuis1')
                                        Kuis 1: Sistem Pertahanan Eksternal dan Internal
                                    @elseif($type == 'kuis2')
                                        Kuis 2: Komponen Sistem Pertahanan Tubuh
                                    @elseif($type == 'kuis3')
                                        Kuis 3: Mekanisme Pertahanan Tubuh
                                    @else
                                        {{ ucfirst($type) }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($result)
                                        <span class="badge bg-{{ $result->status_class }} fs-6">{{ $result->nilai }}</span>
                                    @else
                                        <span class="badge bg-secondary fs-6">-</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($result)
                                        {{ $result->jawaban_benar }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($result)
                                        {{ $result->total_soal }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($result)
                                        <span class="badge bg-{{ $result->status_class }}">{{ $result->status }}</span>
                                    @else
                                        <span class="badge bg-secondary">Belum dikerjakan</span>
                                    @endif
                                </td>
                                <td>
                                    @if($result)
                                        {{ $result->tanggal_kuis->format('d/m/Y H:i') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($result)
                                        <a href="{{ route('kuis.hasil', ['id' => $result->id]) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    @else
                                        @if($type == 'kuis1')
                                            <a href="{{ route('kuis1.index') }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-play"></i> Mulai
                                            </a>
                                        @elseif($type == 'kuis2')
                                            <a href="{{ route('kuis2.index') }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-play"></i> Mulai
                                            </a>
                                        @elseif($type == 'kuis3')
                                            <a href="{{ route('kuis3.index') }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-play"></i> Mulai
                                            </a>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Grafik Perbandingan Nilai -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title border-bottom pb-2">Perbandingan Nilai Kuis</h5>
                            <canvas id="quizComparisonChart" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="d-flex justify-content-center mt-4 gap-3">
        <a href="{{ route('beranda') }}" class="btn btn-primary">
            <i class="fas fa-home me-1"></i> Kembali ke Beranda
        </a>
        <a href="#" onclick="window.print()" class="btn btn-success">
            <i class="fas fa-print me-1"></i> Cetak Hasil
        </a>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('quizComparisonChart').getContext('2d');
        
        // Data dari controller
        const quizLabels = [
            'Kuis 1: Sistem Pertahanan Eksternal dan Internal', 
            'Kuis 2: Komponen Sistem Pertahanan Tubuh', 
            'Kuis 3: Mekanisme Pertahanan Tubuh'
        ];
        
        const quizValues = [
            {{ isset($quizResults['kuis1']) ? $quizResults['kuis1']->nilai : 0 }},
            {{ isset($quizResults['kuis2']) ? $quizResults['kuis2']->nilai : 0 }},
            {{ isset($quizResults['kuis3']) ? $quizResults['kuis3']->nilai : 0 }}
        ];
        
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: quizLabels,
                datasets: [{
                    label: 'Nilai Kuis',
                    data: quizValues,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(153, 102, 255, 0.7)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    });
</script>
@endsection