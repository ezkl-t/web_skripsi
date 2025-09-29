@extends('layouts.app')

@section('title', 'Verifikasi')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<h2 class="card-title mb-4" style="color: #9E2A2B">Verifikasi 3</h2>

<div class="container mt-5">
    <h4 class="card-title mb-4" style="color: #540B0E">Petunjuk Pengerjaan</h4>
    <div class="alert alert-info">
        <ol class="mb-0">
            <li>Isilah kotak kosong pada setiap pernyataan di bawah ini dengan cara menarik opsi jawaban dan meletakkannya pada tempat yang tepat!</li>
            <li>Perhatikan opsi jawaban yang berisi berbagai macam istilah sistem pertahanan tubuh, kemudian letakkan sesuai dengan konteks kalimat yang tepat.</li>
        </ol>
    </div>

    <div class="row">
        <!-- Kolom untuk soal-soal -->
        <div class="col-md-8">
            <!-- Soal-soal drag and drop -->
            <h5 class="mb-3" style="color: #540B0E">Isilah kotak kosong dengan jawaban yang tepat!</h5>
            
            <div class="soal-container">
                <!-- Soal 1 -->
                <div class="soal-item mb-4">
                    <div class="soal-text">
                        <span class="soal-number">1.</span>
                        Imunitas yang terbentuk setelah terinfeksi cacar air adalah imunitas <span class="drop-target soal-1" data-jawaban="aktif"></span>.
                    </div>
                </div>

                <!-- Soal 2 -->
                <div class="soal-item mb-4">
                    <div class="soal-text">
                        <span class="soal-number">2.</span>
                        Antibodi yang diperoleh bayi melalui ASI adalah imunitas <span class="drop-target soal-2" data-jawaban="pasif"></span>.
                    </div>
                </div>

                <!-- Soal 3 -->
                <div class="soal-item mb-4">
                    <div class="soal-text">
                        <span class="soal-number">3.</span>
                        Kolostrum mengandung banyak zat <span class="drop-target soal-3" data-jawaban="antibodi"></span>.
                    </div>
                </div>

                <!-- Soal 9 -->
                <div class="soal-item mb-4">
                    <div class="soal-text">
                        <span class="soal-number">4.</span>
                        Respon berlebihan terhadap debu atau serbuk sari disebut <span class="drop-target soal-9" data-jawaban="alergi"></span>.
                    </div>
                </div>

                <!-- Soal 10 -->
                <div class="soal-item mb-4">
                    <div class="soal-text">
                        <span class="soal-number">5.</span>
                        Zat yang memicu reaksi alergi disebut <span class="drop-target soal-10" data-jawaban="alergen"></span>.
                    </div>
                </div>

                <!-- Soal 11 -->
                <div class="soal-item mb-4">
                    <div class="soal-text">
                        <span class="soal-number">6.</span>
                        Sel mast melepaskan <span class="drop-target soal-11" data-jawaban="histamin"></span> yang memicu peradangan.
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
                <a href="{{ url('/tugas/kesimpulan-3') }}" class="btn-selanjutnya">
                    <i class="fas fa-arrow-right"></i> Selanjutnya
                </a>
            </div>
        </div>

        <!-- Kolom untuk pilihan jawaban (samping kanan) -->
        <div class="col-md-4">
            <div class="card sticky-top" style="top: 20px; background-color: #f8f9fa;">
                <div class="card-body">
                    <h5 class="card-title" style="color: #540B0E">Opsi Jawaban:</h5>
                    <div id="jawaban-list" class="d-flex flex-column gap-2">
                        <div class="drag-item" data-id="aktif">Aktif</div>
                        <div class="drag-item" data-id="pasif">Pasif</div>
                        <div class="drag-item" data-id="antibodi">Antibodi</div>
                        <div class="drag-item" data-id="alergi">Alergi</div>
                        <div class="drag-item" data-id="alergen">Alergen</div>
                        <div class="drag-item" data-id="histamin">Histamin</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .drag-item {
        display: block;
        padding: 12px 16px;
        margin: 5px 0;
        background-color: #e9ecef;
        border: 2px solid #dee2e6;
        border-radius: 6px;
        cursor: move;
        font-weight: 500;
        transition: all 0.3s ease;
        font-size: 14px;
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

    .soal-item {
        padding: 15px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        background-color: #fafafa;
        margin-bottom: 15px;
    }

    .soal-number {
        font-weight: bold;
        color: #9E2A2B;
        margin-right: 10px;
        font-size: 16px;
    }

    .soal-text {
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    .drop-target {
        display: inline-block;
        min-width: 100px;
        min-height: 40px;
        border: 2px dashed #6c757d;
        border-radius: 6px;
        padding: 8px 12px;
        background-color: white;
        margin: 0 5px;
        vertical-align: middle;
        transition: all 0.3s ease;
        text-align: center;
    }

    .drop-target.drag-over {
        background-color: #e9ecef;
        border-color: #9E2A2B;
        border-style: solid;
    }

    .drop-target .drag-item {
        margin: 0;
        background-color: white;
        display: block;
        min-width: auto;
    }

    .drop-target:empty::before {
        content: "⬅ Tarik jawaban";
        color: #6c757d;
        font-style: italic;
        font-size: 12px;
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

    .btn-selanjutnya {
        display: inline-block;
        background-color: #28a745;
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
        background-color: #218838;
        text-decoration: none;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.15);
    }

    .sticky-top {
        position: sticky;
        z-index: 100;
    }

    .btn-success {
        background-color: #9E2A2B;
        border-color: #9E2A2B;
        padding: 10px 30px;
        font-size: 16px;
    }

    .btn-success:hover {
        background-color: #540B0E;
        border-color: #540B0E;
    }
</style>

<!-- Library SortableJS -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
    // Inisialisasi Sortable untuk daftar jawaban
    const jawabanList = document.getElementById('jawaban-list');
    new Sortable(jawabanList, {
        group: 'shared',
        animation: 150,
        sort: false
    });

    // Inisialisasi Sortable untuk setiap drop target
    document.querySelectorAll('.drop-target').forEach((target, index) => {
        new Sortable(target, {
            group: 'shared',
            animation: 150,
            onAdd: function(evt) {
                evt.to.classList.remove('drag-over');
                // Hanya boleh ada satu jawaban per target
                if (evt.to.children.length > 1) {
                    // Pindahkan item lama kembali ke daftar jawaban
                    const oldItem = evt.to.children[0];
                    jawabanList.appendChild(oldItem);
                }
            }
        });

        // Tambahkan event listener untuk efek visual
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

    // Kunci jawaban yang benar (hanya 6 soal)
    const answerKey = {
        'soal-1': 'aktif',
        'soal-2': 'pasif',
        'soal-3': 'antibodi',
        'soal-9': 'alergi',
        'soal-10': 'alergen',
        'soal-11': 'histamin'
    };

    // Fungsi untuk menampilkan tombol selanjutnya
    function showNextButton() {
        document.getElementById('tombolSelanjutnya').style.display = 'block';
    }

    // Fungsi untuk memeriksa jawaban
    function checkAnswers() {
        // Reset warna item
        document.querySelectorAll('.drag-item').forEach(item => {
            item.classList.remove('correct-item', 'incorrect-item');
        });

        let correctCount = 0;
        let incorrectCount = 0;
        let unansweredCount = 0;
        let detailJawaban = {};

        // Periksa setiap soal
        document.querySelectorAll('.drop-target').forEach(target => {
            const soalId = target.classList[1]; // soal-1, soal-2, etc.
            const jawabanBenar = answerKey[soalId];
            const jawabanUser = target.querySelector('.drag-item');
            
            detailJawaban[soalId] = {
                jawaban_user: jawabanUser ? jawabanUser.getAttribute('data-id') : null,
                jawaban_benar: jawabanBenar,
                status: ''
            };

            if (jawabanUser) {
                const userAnswer = jawabanUser.getAttribute('data-id');
                
                if (userAnswer === jawabanBenar) {
                    jawabanUser.classList.add('correct-item');
                    correctCount++;
                    detailJawaban[soalId].status = 'benar';
                } else {
                    jawabanUser.classList.add('incorrect-item');
                    incorrectCount++;
                    detailJawaban[soalId].status = 'salah';
                }
            } else {
                unansweredCount++;
                detailJawaban[soalId].status = 'belum_dijawab';
            }
        });

        // Total soal
        const totalSoal = Object.keys(answerKey).length;

        // Tampilkan hasil
        const resultMessage = document.getElementById('result-message');
        const resultTitle = document.getElementById('result-title');
        const resultDetails = document.getElementById('result-details');

        resultMessage.style.display = 'block';
        
        if (correctCount === totalSoal && incorrectCount === 0) {
            resultMessage.className = 'alert alert-success';
            resultTitle.innerHTML = '<i class="fas fa-trophy"></i> Selamat! Jawaban Anda benar semua!';
            resultDetails.innerHTML = 'Kerja Bagus! Anda telah berhasil mengisi semua soal dengan tepat.';
            
            // Tampilkan tombol selanjutnya
            showNextButton();
            
            // Simpan progres ke database
            simpanProgres(correctCount, totalSoal, detailJawaban);
            
        } else if (unansweredCount > 0) {
            resultMessage.className = 'alert alert-warning';
            resultTitle.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Belum Lengkap';
            resultDetails.innerHTML = `
                <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalSoal}</p>
                <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                <p><strong>Belum dijawab:</strong> ${unansweredCount}</p>
                <p class="mb-0"><em>Silakan lengkapi semua jawaban terlebih dahulu!</em></p>
            `;
            
            // Sembunyikan tombol selanjutnya
            document.getElementById('tombolSelanjutnya').style.display = 'none';
        } else {
            resultMessage.className = 'alert alert-danger';
            resultTitle.innerHTML = '<i class="fas fa-times-circle"></i> Masih ada yang keliru';
            resultDetails.innerHTML = `
                <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalSoal}</p>
                <p><strong>Jawaban salah:</strong> ${incorrectCount}</p>
                <p class="mb-0"><em>Periksa kembali jawaban yang berwarna merah dan coba lagi!</em></p>
            `;
            
            // Sembunyikan tombol selanjutnya
            document.getElementById('tombolSelanjutnya').style.display = 'none';
            
            // Tetap simpan progres meskipun belum selesai
            simpanProgres(correctCount, totalSoal, detailJawaban);
        }

        // Scroll ke hasil
        resultMessage.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    // Fungsi untuk menyimpan progres ke database
    function simpanProgres(skor, totalSoal, detailJawaban) {
        console.log('Memulai simpan progres Verifikasi 3...');
        console.log('Data yang akan dikirim:', {
            skor: skor,
            totalSoal: totalSoal,
            detailJawaban: detailJawaban
        });

        // Data yang akan dikirim
        const data = {
            nama_aktivitas: 'verifikasi-3',
            judul_aktivitas: 'Verifikasi 3 - Sistem Pertahanan Tubuh',
            skor: skor,
            total_soal: totalSoal,
            detail_jawaban: detailJawaban
        };

        // Kirim data via AJAX menggunakan jQuery
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
                            text: 'Anda telah menyelesaikan Verifikasi 3 dengan sempurna!',
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
                if (resultDetails) {
                    resultDetails.innerHTML += '<br><small class="text-warning">Progres gagal disimpan, tetapi jawaban Anda tetap tercatat.</small>';
                }
            }
        });
    }

    // Fungsi untuk mengembalikan jawaban ke daftar (opsional)
    function resetJawaban() {
        document.querySelectorAll('.drop-target').forEach(target => {
            const items = target.querySelectorAll('.drag-item');
            items.forEach(item => {
                jawabanList.appendChild(item);
            });
        });
        
        document.querySelectorAll('.drag-item').forEach(item => {
            item.classList.remove('correct-item', 'incorrect-item');
        });
        
        document.getElementById('result-message').style.display = 'none';
        document.getElementById('tombolSelanjutnya').style.display = 'none';
    }
</script>

@endsection