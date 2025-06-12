@extends('layouts.app')

@section('title', 'Pengumpulan Data')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<h2 class="card-title mb-4" style="color: #9E2A2B">Pengumpulan Data</h2>

<div class="container mt-5">
    <h4 class="card-title mb-4" style="color: #540B0E">Instruksi</h4>
    <p class="materi">
        Setelah kamu mengamati video tadi dan mengerjakan tugas sebelumnya, selanjutnya kerjakan tugas berikut dengan cermat. 
        Klasifikasikan komponen sistem pertahanan tubuh ke dalam kategori yang tepat dengan cara drag and drop!
    </p>

    <!-- Container untuk pilihan komponen -->
    <div class="card mb-4" style="background-color: #f8f9fa;">
        <div class="card-body">
            <h5 class="card-title" style="color: #540B0E">Pilihan Komponen:</h5>
            <div id="komponen-list" class="d-flex flex-wrap gap-2">
                <div class="drag-item" data-id="inflamasi">Inflamasi</div>
                <div class="drag-item" data-id="air-mata">Air Mata</div>
                <div class="drag-item" data-id="asam-lambung">Sekresi Asam Lambung</div>
                <div class="drag-item" data-id="sel-b">Limfosit Sel B</div>
                <div class="drag-item" data-id="sel-t">Limfosit Sel T</div>
                <div class="drag-item" data-id="antibodi">Antibodi</div>
            </div>
        </div>
    </div>

    <!-- Tabel untuk klasifikasi -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #9E2A2B; color: white;">
                    <h5 class="mb-0">Pertahanan Non-Spesifik</h5>
                </div>
                <div class="card-body">
                    <div id="nonspesifik" class="drop-target"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #540B0E; color: white;">
                    <h5 class="mb-0">Pertahanan Spesifik</h5>
                </div>
                <div class="card-body">
                    <div id="spesifik" class="drop-target"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol cek jawaban -->
    <div class="text-center mt-4">
        <button class="btn btn-success btn-lg" onclick="checkAnswers()">
            <i class="fas fa-check-circle"></i> Cek Jawaban
        </button>
    </div>

    <!-- Area untuk menampilkan hasil -->
    <div id="result-message" class="alert mt-4" style="display: none;">
        <h5 id="result-title"></h5>
        <div id="result-details"></div>
    </div>
</div>

<style>
    .drag-item {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        background-color: #e9ecef;
        border: 2px solid #dee2e6;
        border-radius: 5px;
        cursor: move;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .drag-item:hover {
        background-color: #dee2e6;
        transform: translateY(-2px);
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .drag-item.dragging {
        opacity: 0.5;
    }

    .drop-target {
        min-height: 150px;
        border: 2px dashed #dee2e6;
        border-radius: 5px;
        padding: 15px;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .drop-target.drag-over {
        background-color: #e9ecef;
        border-color: #6c757d;
    }

    .drop-target .drag-item {
        margin: 5px;
        background-color: white;
    }

    .correct-item {
        background-color: #d4edda !important;
        border-color: #28a745 !important;
    }

    .incorrect-item {
        background-color: #f8d7da !important;
        border-color: #dc3545 !important;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
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

<!-- Library SortableJS -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    // Inisialisasi Sortable untuk komponen list
    const komponenList = document.getElementById('komponen-list');
    new Sortable(komponenList, {
        group: 'shared',
        animation: 150,
        sort: false
    });

    // Inisialisasi Sortable untuk drop targets
    const nonspesifikTarget = document.getElementById('nonspesifik');
    const spesifikTarget = document.getElementById('spesifik');

    new Sortable(nonspesifikTarget, {
        group: 'shared',
        animation: 150,
        onAdd: function(evt) {
            evt.to.classList.remove('drag-over');
        }
    });

    new Sortable(spesifikTarget, {
        group: 'shared',
        animation: 150,
        onAdd: function(evt) {
            evt.to.classList.remove('drag-over');
        }
    });

    // Tambahkan efek visual saat drag over
    [nonspesifikTarget, spesifikTarget].forEach(target => {
        target.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('drag-over');
        });

        target.addEventListener('dragleave', function(e) {
            this.classList.remove('drag-over');
        });

        target.addEventListener('drop', function(e) {
            this.classList.remove('drag-over');
        });
    });

    // Fungsi untuk memeriksa jawaban
    function checkAnswers() {
        // Kunci jawaban
        const answerKey = {
            nonspesifik: ['inflamasi', 'air-mata', 'asam-lambung'],
            spesifik: ['sel-b', 'sel-t', 'antibodi']
        };

        // Reset warna item
        document.querySelectorAll('.drag-item').forEach(item => {
            item.classList.remove('correct-item', 'incorrect-item');
        });

        // Ambil jawaban user
        const nonspesifikItems = Array.from(nonspesifikTarget.querySelectorAll('.drag-item'));
        const spesifikItems = Array.from(spesifikTarget.querySelectorAll('.drag-item'));

        let correctCount = 0;
        let incorrectCount = 0;
        let detailJawaban = {
            nonspesifik: [],
            spesifik: []
        };

        // Periksa pertahanan non-spesifik
        nonspesifikItems.forEach(item => {
            const dataId = item.getAttribute('data-id');
            detailJawaban.nonspesifik.push(dataId);
            
            if (answerKey.nonspesifik.includes(dataId)) {
                item.classList.add('correct-item');
                correctCount++;
            } else {
                item.classList.add('incorrect-item');
                incorrectCount++;
            }
        });

        // Periksa pertahanan spesifik
        spesifikItems.forEach(item => {
            const dataId = item.getAttribute('data-id');
            detailJawaban.spesifik.push(dataId);
            
            if (answerKey.spesifik.includes(dataId)) {
                item.classList.add('correct-item');
                correctCount++;
            } else {
                item.classList.add('incorrect-item');
                incorrectCount++;
            }
        });

        // Hitung yang belum dijawab
        const totalItems = 6;
        const answeredItems = nonspesifikItems.length + spesifikItems.length;
        const unansweredItems = totalItems - answeredItems;

        // Tampilkan hasil
        const resultMessage = document.getElementById('result-message');
        const resultTitle = document.getElementById('result-title');
        const resultDetails = document.getElementById('result-details');

        resultMessage.style.display = 'block';
        
        if (correctCount === 6 && incorrectCount === 0) {
            resultMessage.className = 'alert alert-success';
            resultTitle.innerHTML = '<i class="fas fa-trophy"></i> Jawaban benar!';
            resultDetails.innerHTML = 'Kerja Bagus! Progres Anda sedang disimpan...';
            
            // Simpan progres ke database
            simpanProgres(correctCount, totalItems, detailJawaban);
            
        } else if (unansweredItems > 0) {
            resultMessage.className = 'alert alert-warning';
            resultTitle.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Belum Lengkap';
            resultDetails.innerHTML = `
                <p><strong>Jawaban benar:</strong> ${correctCount}</p>
                <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                <p><strong>Belum dijawab:</strong> ${unansweredItems}</p>
                <p class="mb-0"><em>Silakan lengkapi semua jawaban terlebih dahulu!</em></p>
            `;
        } else {
            resultMessage.className = 'alert alert-danger';
            resultTitle.innerHTML = '<i class="fas fa-times-circle"></i> Masih ada yang keliru';
            resultDetails.innerHTML = `
                <p><strong>Jawaban benar:</strong> ${correctCount}</p>
                <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                <p class="mb-0"><em>Periksa kembali jawaban yang berwarna merah dan coba lagi!</em></p>
            `;
            
            // Tetap simpan progres meskipun belum selesai
            simpanProgres(correctCount, totalItems, detailJawaban);
        }

        // Scroll ke hasil
        resultMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Fungsi untuk menyimpan progres ke database
    function simpanProgres(skor, totalSoal, detailJawaban) {
        console.log('Memulai simpan progres...');
        console.log('Data yang akan dikirim:', {
            skor: skor,
            totalSoal: totalSoal,
            detailJawaban: detailJawaban
        });

        // Data yang akan dikirim
        const data = {
            nama_aktivitas: 'pengumpulan-data-1',
            judul_aktivitas: 'Pengumpulan Data 1',
            skor: skor,
            total_soal: totalSoal,
            detail_jawaban: detailJawaban
        };

        // Kirim data via AJAX menggunakan jQuery (karena sudah tersedia di layout)
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
                    resultDetails.innerHTML = '';
                    
                    // Tampilkan notifikasi sukses
                    if (typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Selamat!',
                            text: 'Anda telah menyelesaikan aktivitas ini dengan sempurna!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error('Error menyimpan progres:', error);
                console.error('Response:', xhr.responseText);
                
                // Tampilkan pesan error yang user-friendly
                const resultDetails = document.getElementById('result-details');
                resultDetails.innerHTML += '<br><small class="text-warning">Progres gagal disimpan, tetapi jawaban Anda tetap tercatat.</small>';
            }
        });
    }
</script>

@endsection