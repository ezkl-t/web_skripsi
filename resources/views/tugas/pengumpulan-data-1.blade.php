@extends('layouts.app')

@section('title', 'Pengumpulan Data')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<h2 class="card-title mb-4" style="color: #9E2A2B">Pengumpulan Data</h2>

<div class="container mt-5">
    <h4 class="card-title mb-4" style="color: #540B0E">Petunjuk Pengerjaan</h4>
    <div class="alert alert-info">
        <ol class="mb-0">
            <li>Isilah kolom kosong pada Tabel Klasifikasi Pertahanan Tubuh di bawah ini dengan cara menarik opsi jawaban dan meletakannya pada kolom yang tepat!</li>
            <li>Perhatikan opsi jawaban yang berisi berbagai macam sistem pertahanan pada tubuh, kemudian letakkan sesuai dengan kolom klasifikasi sistem pertahanan tubuh yang tepat.</li>
            <li>Silakan akses bahan baca untuk membantu mengerjakan tugas ini</li>
        </ol>
    </div>

    <!-- Container untuk pilihan komponen -->
    <div class="card mb-4" style="background-color: #f8f9fa;">
        <div class="card-body">
            <div class="text-center mt-4">
                <button type="button" class="btn btn-info btn-lg" onclick="openPdfModal()">
                    <i class="fas fa-book me-2"></i>Buka Bahan Bacaan
                </button>
            </div>
            <h5 class="card-title" style="color: #540B0E">Opsi Jawaban:</h5>
            <div id="komponen-list" class="d-flex flex-wrap gap-2">
                <div class="drag-item" data-id="jaringan-epitel">Jaringan epitel pada saluran pernafasan, pencernaan</div>
                <div class="drag-item" data-id="respon-imun">Respon imun terjadi karena tubuh mendeteksi antigen</div>
                <div class="drag-item" data-id="lisozim">Sekresi lisozim pada komposisi air mata, air liur, keringat</div>
                <div class="drag-item" data-id="lendir">Sekresi lendir di saluran pernapasan untuk menangkap debu dan patogen</div>
                <div class="drag-item" data-id="hcl">Sekresi Hidrogen Klorida (HCl) di lambung</div>
                <div class="drag-item" data-id="antibodi">Antibodi terbentuk oleh leukosit untuk melawan antigen yang dikenali</div>
            </div>
        </div>
    </div>

    <!-- Tabel untuk klasifikasi -->
    <h5 class="mb-3" style="color: #540B0E">Tabel Klasifikasi Pertahanan Tubuh</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #9E2A2B; color: white;">
                    <h5 class="mb-0">Pertahanan Nonspesifik</h5>
                </div>
                <div class="card-body">
                    <div id="nonspesifik" class="drop-target">
                        <p class="text-muted text-center">Letakkan komponen pertahanan nonspesifik di sini</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #540B0E; color: white;">
                    <h5 class="mb-0">Pertahanan Spesifik</h5>
                </div>
                <div class="card-body">
                    <div id="spesifik" class="drop-target">
                        <p class="text-muted text-center">Letakkan komponen pertahanan spesifik di sini</p>
                    </div>
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

    <!-- Tombol Selanjutnya -->
    <div id="tombolSelanjutnya" style="display: none; text-align: center; margin-top: 20px;">
        <a href="{{ route('pengolahan-data-1') }}" class="btn-selanjutnya">
            Selanjutnya
        </a>
    </div>
</div>

<style>
    .drag-item {
        display: inline-block;
        padding: 12px 16px;
        margin: 5px;
        background-color: #e9ecef;
        border: 2px solid #dee2e6;
        border-radius: 8px;
        cursor: move;
        font-weight: 500;
        transition: all 0.3s ease;
        font-size: 14px;
        max-width: 300px;
        text-align: center;
        line-height: 1.4;
    }

    .drag-item:hover {
        background-color: #dee2e6;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .drag-item.dragging {
        opacity: 0.5;
    }

    .drop-target {
        min-height: 200px;
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        padding: 20px;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .drop-target.drag-over {
        background-color: #e9ecef;
        border-color: #6c757d;
        border-style: solid;
    }

    .drop-target .drag-item {
        margin: 8px 4px;
        background-color: white;
        display: block;
        max-width: 100%;
        margin-bottom: 10px;
    }

    .drop-target .text-muted {
        display: none;
    }

    .drop-target:empty .text-muted {
        display: block;
    }

    .correct-item {
        background-color: #d4edda !important;
        border-color: #28a745 !important;
        color: #155724;
    }

    .incorrect-item {
        background-color: #f8d7da !important;
        border-color: #dc3545 !important;
        color: #721c24;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        border-radius: 8px;
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

    .alert-info {
        background-color: #d1ecf1;
        border-color: #bee5eb;
        color: #0c5460;
    }

    .btn-selanjutnya {
        display: inline-block;
        background-color: #540B0E;
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
        background-color: #9E2A2B;
        text-decoration: none;
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .btn-selanjutnya:focus {
        outline: 2px solid #FFF3B0;
        outline-offset: 2px;
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
            // Sembunyikan teks placeholder
            updatePlaceholder(evt.to);
        },
        onRemove: function(evt) {
            // Update placeholder jika kosong
            updatePlaceholder(evt.from);
        }
    });

    new Sortable(spesifikTarget, {
        group: 'shared',
        animation: 150,
        onAdd: function(evt) {
            evt.to.classList.remove('drag-over');
            // Sembunyikan teks placeholder
            updatePlaceholder(evt.to);
        },
        onRemove: function(evt) {
            // Update placeholder jika kosong
            updatePlaceholder(evt.from);
        }
    });

    // Fungsi untuk update placeholder
    function updatePlaceholder(target) {
        const placeholder = target.querySelector('.text-muted');
        const items = target.querySelectorAll('.drag-item');
        
        if (items.length === 0) {
            if (placeholder) placeholder.style.display = 'block';
        } else {
            if (placeholder) placeholder.style.display = 'none';
        }
    }

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

    // Fungsi untuk menampilkan tombol selanjutnya
    function showNextButton() {
        document.getElementById('tombolSelanjutnya').style.display = 'block';
    }

    // Fungsi untuk memeriksa jawaban
    function checkAnswers() {
        // Kunci jawaban berdasarkan materi yang diberikan
        const answerKey = {
            nonspesifik: ['jaringan-epitel', 'lisozim', 'lendir', 'hcl'],
            spesifik: ['respon-imun', 'antibodi']
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
            resultTitle.innerHTML = '<i class="fas fa-trophy"></i> Selamat! Jawaban Anda benar semua!';
            resultDetails.innerHTML = 'Kerja Bagus! Anda telah berhasil mengklasifikasikan semua komponen sistem pertahanan tubuh dengan tepat.';
            
            // Tampilkan tombol selanjutnya
            showNextButton();
            
            // Simpan progres ke database
            simpanProgres(correctCount, totalItems, detailJawaban);
            
        } else if (unansweredItems > 0) {
            resultMessage.className = 'alert alert-warning';
            resultTitle.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Belum Lengkap';
            resultDetails.innerHTML = `
                <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalItems}</p>
                <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                <p><strong>Belum dijawab:</strong> ${unansweredItems}</p>
                <p class="mb-0"><em>Silakan lengkapi semua jawaban terlebih dahulu!</em></p>
            `;
            
            // Sembunyikan tombol selanjutnya
            document.getElementById('tombolSelanjutnya').style.display = 'none';
        } else {
            resultMessage.className = 'alert alert-danger';
            resultTitle.innerHTML = '<i class="fas fa-times-circle"></i> Masih ada yang keliru';
            resultDetails.innerHTML = `
                <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalItems}</p>
                <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                <p class="mb-0"><em>Periksa kembali jawaban yang berwarna merah dan coba lagi!</em></p>
            `;
            
            // Sembunyikan tombol selanjutnya
            document.getElementById('tombolSelanjutnya').style.display = 'none';
            
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
            judul_aktivitas: 'Pengumpulan Data 1 - Klasifikasi Sistem Pertahanan Tubuh',
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
                
                // Update pesan hasil jika sempurna
                if (skor === totalSoal) {
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

@include('pdf-modal')

@endsection