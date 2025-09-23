@extends('layouts.app')

@section('title', 'Verifikasi')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tugas Sistem Pertahanan Tubuh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .drag-drop-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .drag-drop-list {
            width: 45%;
            border: 1px solid #ccc;
            padding: 10px;
            min-height: 200px;
            border-radius: 8px;
            background-color: #f8f9fa;
        }
        .drag-item {
            padding: 8px;
            margin: 5px;
            background-color: #e9ecef;
            border: 1px solid #ddd;
            cursor: move;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .drag-item:hover {
            background-color: #dee2e6;
            transform: translateY(-1px);
        }
        .drop-target {
            min-height: 50px;
            border: 2px dashed #ccc;
            padding: 10px;
            border-radius: 4px;
            background-color: #fff;
            transition: all 0.3s ease;
        }
        .drop-target.correct {
            border-color: #28a745;
            background-color: #d4edda;
        }
        .drop-target.incorrect {
            border-color: #dc3545;
            background-color: #f8d7da;
        }
        .drag-item.correct {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }
        .drag-item.incorrect {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }
        .btn-cek {
            background-color: #540B0E;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        .btn-cek:hover {
            background-color: #9E2A2B;
            transform: translateY(-1px);
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
            margin-top: 20px;
        }
        .btn-selanjutnya:hover {
            background-color: #9E2A2B;
            text-decoration: none;
            color: white;
            transform: translateY(-1px);
        }
        .hasil-pengecekan {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
            font-weight: bold;
            display: none;
        }
        .hasil-sukses {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }
        .hasil-peringatan {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }
        .hasil-gagal {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="card-title mb-4" style="color: #9E2A2B">Verifikasi 2</h2>
        
        <h4 class="card-title text-primary mb-4">Instruksi</h4>
        <p class="materi">
            Setelah kamu mengamati video tadi dan mengerjakan tugas sebelumnya, selanjutnya kerjakan tugas berikut dengan cermat. 
            Klasifikasikan beberapa kategori sistem pertahanan tubuh terhadap penyakit berdasarkan komponen apa yang terlibat 
            dan fungsinya dalam menghentikan patogen!
        </p>
        <ol class="materi">
            <li class="materi">Klasifikasikan komponen pertahanan tubuh berdasarkan cara kerjanya.</li>
            <li class="materi">Klik dan tahan salah satu komponen dan letakkan pada kolom tabel yang tepat.</li>    
        </ol>

        <!-- Container untuk Drag and Drop -->
        <div class="drag-drop-container">
            <!-- Daftar Komponen -->
            <div class="drag-drop-list" id="komponen-list">
                <div class="drag-item" data-id="makrofag">Cenderung tinggal di organ-organ tertentu dan tidak sepenuhnya menghancurkan patogen.</div>
                <div class="drag-item" data-id="eosinofil">Melawan parasit besar seperti cacing tambang dan membantu mengatur serta memunculkan respon imun terhadap alergi.</div>
                <div class="drag-item" data-id="mastosit">Memproduksi protein inflamasi dan melebarkan pembuluh darah.</div>
                <div class="drag-item" data-id="limfosit-t">Mengenali sel tubuh yang berubah menjadi kanker dan mencegah pertumbuhannya.</div>
                <div class="drag-item" data-id="sistem-komplemen">Sebagian besar diproduksi oleh sel-sel hati dan akan aktif ketika ada patogen dan tidak aktif jika tidak ada patogen.</div>
            </div>

            <!-- Daftar Fungsi -->
            <div class="drag-drop-list" id="fungsi-list">
                <div class="drag-item" data-id="makrofag">Makrofag</div>
                <div class="drag-item" data-id="eosinofil">Eosinofil</div>
                <div class="drag-item" data-id="mastosit">Mastosit</div>
                <div class="drag-item" data-id="limfosit-t">Limfosit T</div>
                <div class="drag-item" data-id="sistem-komplemen">Sistem Komplemen</div>
            </div>
        </div>

        <!-- Tabel untuk Drop Target -->
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Fungsi</th>
                    <th>Komponen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="fungsi-target-0" class="drop-target" data-correct="makrofag"></td>
                    <td id="komponen-target-0" class="drop-target" data-correct="makrofag"></td>
                </tr>
                <tr>
                    <td id="fungsi-target-1" class="drop-target" data-correct="eosinofil"></td>
                    <td id="komponen-target-1" class="drop-target" data-correct="eosinofil"></td>
                </tr>
                <tr>
                    <td id="fungsi-target-2" class="drop-target" data-correct="mastosit"></td>
                    <td id="komponen-target-2" class="drop-target" data-correct="mastosit"></td>
                </tr>
                <tr>
                    <td id="fungsi-target-3" class="drop-target" data-correct="limfosit-t"></td>
                    <td id="komponen-target-3" class="drop-target" data-correct="limfosit-t"></td>
                </tr>
                <tr>
                    <td id="fungsi-target-4" class="drop-target" data-correct="sistem-komplemen"></td>
                    <td id="komponen-target-4" class="drop-target" data-correct="sistem-komplemen"></td>
                </tr>
            </tbody>
        </table>

        <!-- Hasil Pengecekan -->
        <div id="hasilPengecekan" class="hasil-pengecekan">
            <p>Hasil Pengecekan:</p>
            <p>Jumlah Jawaban Benar: <span id="jumlahBenar">0</span></p>
            <p>Jumlah Jawaban Salah: <span id="jumlahSalah">0</span></p>
        </div>

        <!-- Tombol Cek Jawaban -->
        <div class="text-center">
            <button class="btn-cek" onclick="cekJawaban()">
                Cek Jawaban
            </button>
        </div>

        <!-- Tombol Selanjutnya -->
        <div id="tombolSelanjutnya" style="display: none; text-align: center; margin-top: 20px;">
            <button class="btn-selanjutnya" id="btnSelanjutnya" onclick="lanjutKeKesimpulan2()">
                Selanjutnya
            </button>
        </div>
    </div>

    <!-- Library SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Setup CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Inisialisasi Sortable untuk komponen dan fungsi
        const komponenList = document.getElementById('komponen-list');
        const fungsiList = document.getElementById('fungsi-list');

        new Sortable(komponenList, {
            group: 'shared',
            animation: 150,
            onEnd: function (evt) {
                updateDropTarget(evt);
            }
        });

        new Sortable(fungsiList, {
            group: 'shared',
            animation: 150,
            onEnd: function (evt) {
                updateDropTarget(evt);
            }
        });

        // Inisialisasi Sortable untuk drop target
        document.querySelectorAll('.drop-target').forEach(target => {
            new Sortable(target, {
                group: 'shared',
                animation: 150,
                onEnd: function (evt) {
                    updateDropTarget(evt);
                }
            });
        });

        // Fungsi untuk memperbarui drop target
        function updateDropTarget(evt) {
            const item = evt.item;
            const target = evt.to;
            if (target.classList.contains('drop-target')) {
                const id = target.id;
                const dataId = item.getAttribute('data-id');
                console.log(`Item ${dataId} ditempatkan di ${id}`);
            }
        }

        // Fungsi untuk memeriksa jawaban
        function cekJawaban() {
            let jumlahBenar = 0;
            let jumlahSalah = 0;
            
            // Reset semua status
            document.querySelectorAll('.drop-target').forEach(target => {
                target.classList.remove('correct', 'incorrect');
            });
            
            document.querySelectorAll('.drag-item').forEach(item => {
                item.classList.remove('correct', 'incorrect');
            });
            
            // Periksa setiap drop target
            document.querySelectorAll('.drop-target').forEach(target => {
                const items = target.querySelectorAll('.drag-item');
                const correctAnswer = target.getAttribute('data-correct');
                
                if (items.length > 0) {
                    const userAnswer = items[0].getAttribute('data-id');
                    
                    if (userAnswer === correctAnswer) {
                        target.classList.add('correct');
                        items[0].classList.add('correct');
                        jumlahBenar++;
                    } else {
                        target.classList.add('incorrect');
                        items[0].classList.add('incorrect');
                        jumlahSalah++;
                    }
                } else {
                    jumlahSalah++; // Kosong dianggap salah
                }
            });
            
            // Tampilkan hasil pengecekan
            document.getElementById('hasilPengecekan').style.display = 'block';
            document.getElementById('jumlahBenar').textContent = jumlahBenar;
            document.getElementById('jumlahSalah').textContent = jumlahSalah;
            
            // Update class hasil berdasarkan jumlah benar
            const hasilElement = document.getElementById('hasilPengecekan');
            hasilElement.classList.remove('hasil-sukses', 'hasil-peringatan', 'hasil-gagal');
            
            if (jumlahBenar === 10 && jumlahSalah === 0) {
                hasilElement.classList.add('hasil-sukses');
                document.getElementById('tombolSelanjutnya').style.display = 'block';
            } else if (jumlahBenar > 0) {
                hasilElement.classList.add('hasil-peringatan');
                document.getElementById('tombolSelanjutnya').style.display = 'none';
            } else {
                hasilElement.classList.add('hasil-gagal');
                document.getElementById('tombolSelanjutnya').style.display = 'none';
            }
            
            // Buat detail jawaban untuk disimpan
            const detailJawaban = {};
            document.querySelectorAll('.drop-target').forEach((target, index) => {
                const items = target.querySelectorAll('.drag-item');
                const correctAnswer = target.getAttribute('data-correct');
                const userAnswer = items.length > 0 ? items[0].getAttribute('data-id') : '';
                
                detailJawaban[index] = {
                    user_answer: userAnswer,
                    correct_answer: correctAnswer,
                    is_correct: userAnswer === correctAnswer
                };
            });
            
            // Simpan progres
            simpanProgres(jumlahBenar, 10, detailJawaban);
        }

        // Fungsi untuk melanjutkan ke halaman kesimpulan-2
        function lanjutKeKesimpulan2() {
            // Redirect ke halaman kesimpulan-2
            window.location.href = "{{ route('kesimpulan-2') }}";
        }

        // Fungsi untuk menyimpan progres
        function simpanProgres(skor, totalSoal, detailJawaban) {
            console.log('Memulai simpan progres...');
            console.log('Data yang akan dikirim:', {
                skor: skor,
                totalSoal: totalSoal,
                detailJawaban: detailJawaban
            });

            // Data yang akan dikirim
            const data = {
                nama_aktivitas: 'verifikasi-2',
                judul_aktivitas: 'Verifikasi 2 - Klasifikasi Komponen Sistem Pertahanan Tubuh',
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
                success: function(response) {
                    console.log('Progres berhasil disimpan:', response);
                    
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
                    alert('Progres gagal disimpan. Silakan coba lagi atau lanjutkan ke aktivitas berikutnya.');
                }
            });
        }
    </script>
</body>

@endsection