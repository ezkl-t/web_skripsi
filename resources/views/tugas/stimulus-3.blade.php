@extends('layouts.app')

@section('title', 'Stimulus')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .stimulus-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        .gambar-materi {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 40%;
            max-width: 500px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin: 20px auto;
        }

        .stimulus-title {
            color: #9E2A2B;
            font-size: 2rem;
            margin-bottom: 25px;
            text-align: center;
            border-bottom: 3px solid #FFF3B0;
            padding-bottom: 15px;
        }

        .stimulus-content {
            font-size: 1.1rem;
            color: #333;
            text-align: justify;
            margin-bottom: 20px;
        }

        .intro-questions {
            color: #540B0E;
            font-weight: 500;
            font-style: italic;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff3cd;
            border-left: 4px solid #9E2A2B;
            border-radius: 0 8px 8px 0;
        }

        .materi-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #540B0E;
        }

        .materi-title {
            color: #540B0E;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .materi-content {
            margin-bottom: 15px;
            text-align: justify;
            line-height: 1.7;
        }

        .highlight-text {
            background-color: #fff3cd;
            padding: 2px 6px;
            border-radius: 4px;
            font-weight: 500;
            color: #856404;
        }

        .image-caption {
            text-align: center;
            font-style: italic;
            color: #666;
            margin-top: 10px;
            font-size: 0.95rem;
        }

        .next-button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #dee2e6;
        }

        .btn-selanjutnya {
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
            display: inline-flex;
            align-items: center;
            gap: 8px;
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

        .btn-selanjutnya:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
            opacity: 0.6;
            transform: none;
            box-shadow: none;
        }

        .progress-indicator {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 20px;
            font-size: 14px;
            z-index: 1000;
            display: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .reading-time {
            background-color: #e9ecef;
            padding: 10px 15px;
            border-radius: 20px;
            font-size: 14px;
            color: #6c757d;
            text-align: center;
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .stimulus-container {
                padding: 20px;
            }
            
            .gambar-materi {
                width: 80%;
            }
            
            .stimulus-title {
                font-size: 1.5rem;
            }
            
            .stimulus-content {
                font-size: 1rem;
            }
            
            .next-button-container {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <!-- Progress Indicator -->
    <div id="progressIndicator" class="progress-indicator">
        <i class="fas fa-check-circle"></i> Progres tersimpan!
    </div>

    <div class="stimulus-container">
        <h1 class="stimulus-title">Stimulus</h1>

        <div class="intro-questions">
            Mengapa ada orang yang pernah sakit cacar air tidak akan sakit cacar air lagi seumur hidupnya, tetapi bisa berulang kali terkena flu? Jika sistem pertahanan tubuh dirancang untuk melindungi, mengapa ada penyakit di mana tubuh justru menyerang dirinya sendiri?
        </div>

        <div class="materi-section">
            <div class="materi-title">Sel Darah Putih (Leukosit) dalam Sistem Pertahanan Tubuh</div>
            
            <div class="materi-content">
                Tubuh manusia memiliki sistem pertahanan yang kompleks dan canggih untuk mengatasi infeksi patogen yang disebut imunitas. Sistem ini bekerja layaknya tentara yang bertugas menjaga keamanan tubuh dari berbagai ancaman luar seperti virus, bakteri, jamur, dan parasit. Namun, cara kerja sistem ini tidak selalu sederhana dan terkadang menunjukkan fenomena yang tampak berlawanan. Kadang-kadang, sistem yang seharusnya melindungi justru dapat menimbulkan masalah bagi tubuh itu sendiri
            </div>         
        </div>

        <img src="../img/kelainan-imun.jpg" class="gambar-materi" alt="Leukosit (Sel Darah Putih)">
        <div class="image-caption">Gambar 3.1 Alergi Sebagai Salah Satu Contoh Kelainan Imun</div>

        <!-- Tombol Selanjutnya -->
        <div class="next-button-container">
            <button class="btn-selanjutnya" id="btnSelanjutnya" onclick="lanjutKeIdentifikasi()">
                <span>Selanjutnya</span>
                <i class="fas fa-arrow-right"></i>
            </button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Variabel global
        let startTime = new Date().getTime();
        let isPageVisible = true;
        let totalReadingTime = 0;
        let hasAutoSaved = false;

        $(document).ready(function() {
            // Setup CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Auto-save progres saat halaman dimuat
            autoSaveProgress();

            // Deteksi jika user meninggalkan/kembali ke halaman
            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    // User meninggalkan halaman
                    if (isPageVisible) {
                        totalReadingTime += new Date().getTime() - startTime;
                        isPageVisible = false;
                    }
                } else {
                    // User kembali ke halaman
                    if (!isPageVisible) {
                        startTime = new Date().getTime();
                        isPageVisible = true;
                    }
                }
            });

            // Auto-save progres saat user scroll (menandakan membaca)
            $(window).scroll(function() {
                if ($(window).scrollTop() > 100) {
                    autoSaveProgress();
                }
            });
        });

        function autoSaveProgress() {
            if (hasAutoSaved) return; // Prevent multiple auto-saves
            
            hasAutoSaved = true;
            
            const detailJawaban = {
                reading_started: true,
                reading_time: Math.floor((new Date().getTime() - startTime) / 1000),
                timestamp: new Date().toISOString()
            };

            simpanProgres(1, 1, detailJawaban);
        }

        function lanjutKeIdentifikasi() {
            // Hitung total waktu membaca
            let endTime = new Date().getTime();
            if (isPageVisible) {
                totalReadingTime += endTime - startTime;
            }

            // Simpan progres akhir dengan waktu baca lengkap
            const detailJawaban = {
                reading_completed: true,
                total_reading_time_seconds: Math.floor(totalReadingTime / 1000),
                completed_timestamp: new Date().toISOString(),
                next_activity: 'identifikasi-masalah-2'
            };

            // Disable tombol untuk prevent double click
            document.getElementById('btnSelanjutnya').disabled = true;
            document.getElementById('btnSelanjutnya').style.opacity = '0.6';
            document.getElementById('btnSelanjutnya').style.cursor = 'not-allowed';
            
            simpanProgres(1, 1, detailJawaban, function() {
                // Callback setelah berhasil simpan
                $('#progressIndicator').fadeIn().delay(1500).fadeOut();
                
                // Redirect ke halaman berikutnya
                setTimeout(function() {
                    window.location.href = "{{ route('identifikasi-masalah-3') }}";
                }, 2000);
            });
        }

        // Fungsi simpan progres yang konsisten dengan file lain
        function simpanProgres(skor, totalSoal, detailJawaban, callback) {
            console.log('Memulai simpan progres stimulus 2...');
            console.log('Data yang akan dikirim:', {
                skor: skor,
                totalSoal: totalSoal,
                detailJawaban: detailJawaban
            });

            // Data yang akan dikirim
            const data = {
                nama_aktivitas: 'stimulus-3',
                judul_aktivitas: 'Stimulus 3 - Jenis dan Gangguan Sistem Pertahanan Tubuh',
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
                    
                    if (callback && typeof callback === 'function') {
                        callback(response);
                    }
                    
                    // Tampilkan notifikasi sukses jika sempurna
                    if (skor === totalSoal && typeof Swal !== 'undefined') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Stimulus 2 selesai!',
                            text: 'Anda telah menyelesaikan membaca stimulus tentang sel darah putih.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error menyimpan progres:', error);
                    console.error('Response:', xhr.responseText);
                    
                    // Tetap lanjut ke halaman berikutnya meski error
                    if (callback && typeof callback === 'function') {
                        alert('Progres mungkin tidak tersimpan, tetapi Anda akan dilanjutkan ke aktivitas berikutnya.');
                        callback();
                    }
                }
            });
        }
    </script>
</body>

@endsection



