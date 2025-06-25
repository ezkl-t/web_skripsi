@extends('layouts.app')

@section('title', 'Kesimpulan')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        :root {
            --primary: #335C67;
            --secondary: #E09F3E;
            --accent: #9E2A2B;
            --light: #FFF3B0;
            --dark: #540B0E;
        }
        
        .kesimpulan-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .card-kesimpulan {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
            margin-bottom: 20px;
        }
        
        .title-kesimpulan {
            color: var(--accent);
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 600;
        }
        
        .instruksi {
            background-color: rgba(255, 243, 176, 0.3);
            border-left: 4px solid var(--secondary);
            padding: 15px 20px;
            margin-bottom: 25px;
            border-radius: 5px;
            color: var(--dark);
            font-size: 1.05rem;
        }
        
        .form-group label {
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 10px;
            display: block;
        }
        
        .textarea-kesimpulan {
            width: 100%;
            min-height: 200px;
            padding: 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            line-height: 1.6;
            resize: vertical;
            transition: border-color 0.3s;
        }
        
        .textarea-kesimpulan:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(51, 92, 103, 0.1);
        }
        
        .char-counter {
            text-align: right;
            font-size: 0.85rem;
            color: #666;
            margin-top: 5px;
        }
        
        .btn-kirim {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
        }
        
        .btn-kirim:hover {
            background-color: var(--dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .btn-kirim:disabled {
            background-color: #ccc;
            cursor: not-allowed;
            transform: none;
        }

        .btn-lanjut {
            background-color: var(--dark);
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            float: right;
            margin-top: 20px;
        }
        
        .btn-lanjut:hover {
            background-color: var(--accent);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            text-decoration: none;
            color: white;
        }
        
        .hasil-container {
            display: none;
            margin-top: 30px;
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .hasil-card {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            position: relative;
        }
        
        .hasil-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .hasil-title {
            color: var(--primary);
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .hasil-content {
            color: #333;
            line-height: 1.8;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        
        .error-message {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 12px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: none;
        }
        
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255,255,255,.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .materi-kesimpulan {
            background-color: #f8f9fa;
            border-left: 4px solid var(--accent);
            padding: 20px;
            margin-bottom: 25px;
            border-radius: 0 8px 8px 0;
        }

        .materi-kesimpulan h4 {
            color: var(--dark);
            margin-bottom: 15px;
        }

        .materi-kesimpulan p {
            line-height: 1.8;
            color: #333;
            margin-bottom: 15px;
            text-align: justify;
        }

        .next-button-container {
            text-align: right;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            clear: both;
        }
        
        @media (max-width: 768px) {
            .kesimpulan-container {
                padding: 10px;
            }
            
            .card-kesimpulan {
                padding: 20px;
            }
            
            .textarea-kesimpulan {
                min-height: 150px;
                font-size: 0.95rem;
            }

            .btn-lanjut {
                float: none;
                width: 100%;
                text-align: center;
                justify-content: center;
            }

            .next-button-container {
                text-align: center;
            }
        }
    </style>
</head>

<div class="kesimpulan-container">
    <div class="card-kesimpulan">
        <h2 class="title-kesimpulan">Kesimpulan Materi 1</h2>
        
        <div class="instruksi">
            <i class="fas fa-lightbulb"></i>Kamu sudah mempelajari materi tentang Sistem Pertahanan Eksternal dan Internal. Sekarang buatlah kesimpulan dari pembelajaranmu untuk mengukur pemahamanmu terhadap materi yang telah dipelajari!
        </div>

        <!-- Materi Kesimpulan -->
        <div class="materi-kesimpulan">
        
            <strong>
            <ul style="margin-left: 20px; margin-bottom: 15px;">
                <li>Komponen-komponen sistem pertahanan tubuh eksternal dan internal</li>
                <li>Mekanisme pertahanan fisik, kimiawi, dan seluler bekerja sama dalam sistem pertahanan eksternal untuk mencegah masuknya patogen ke dalam tubuh</li>
                <li>Fungsi sistem pengenalan antigen-antibodi dalam pertahanan internal.</li>
            </strong>
            </ul>
        </div>
        
        <div id="error-message" class="error-message">
            <i class="fas fa-exclamation-circle"></i> <span id="error-text">Terjadi kesalahan saat menyimpan.</span>
        </div>
        
        <form id="form-kesimpulan">
            <div class="form-group">
                <label for="kesimpulan">Tuliskan kesimpulanmu berdasarkan materi yang telah dipelajari:</label>
                <textarea 
                    id="kesimpulan" 
                    name="kesimpulan" 
                    class="textarea-kesimpulan" 
                    placeholder="Berdasarkan materi yang telah saya pelajari tentang sistem pertahanan tubuh, saya dapat menyimpulkan bahwa..."
                    maxlength="1000"
                    required
                ></textarea>
                <div class="char-counter">
                    <span id="char-count">0</span>/1000 karakter
                </div>
            </div>
            
            <button type="submit" id="btn-submit" class="btn-kirim">
                <i class="fas fa-paper-plane"></i> Buat Kesimpulan
            </button>
        </form>
        
        <div id="hasil-container" class="hasil-container">
            <div class="hasil-card">
                <div class="hasil-header">
                    <h4 class="hasil-title">Kesimpulan Anda tentang Sistem Pertahanan Tubuh:</h4>
                </div>
                <div class="hasil-content" id="hasil-kesimpulan">
                    <!-- Kesimpulan user akan ditampilkan di sini -->
                </div>
            </div>

            <!-- Tombol Lanjut ke Kuis -->
            <div class="next-button-container">
                <a href="{{ route('kuis.index') }}" class="btn-lanjut" id="btn-lanjut-kuis">
                    <span>Lanjutkan ke Kuis 1</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Setup CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Character counter
        $('#kesimpulan').on('input', function() {
            const length = $(this).val().length;
            $('#char-count').text(length);
            
            // Change color when near limit
            if (length > 900) {
                $('.char-counter').css('color', '#dc3545');
            } else {
                $('.char-counter').css('color', '#666');
            }
        });
        
        // Form submission
        $('#form-kesimpulan').on('submit', function(e) {
            e.preventDefault();
            console.log('Form submitted'); // Debug log
            
            const kesimpulan = $('#kesimpulan').val().trim();
            console.log('Kesimpulan:', kesimpulan); // Debug log
            
            if (kesimpulan.length === 0) {
                showError('Silakan tuliskan kesimpulan Anda.');
                return;
            }
            
            // Disable form while submitting
            $('#btn-submit').prop('disabled', true).html('<span class="loading"></span> Menyimpan...');
            $('#kesimpulan').prop('readonly', true);
            
            // Cek apakah CSRF token ada
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (!csrfToken) {
                console.error('CSRF token tidak ditemukan!');
                showError('CSRF token tidak ditemukan. Refresh halaman dan coba lagi.');
                // Re-enable form
                $('#btn-submit').prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Buat Kesimpulan');
                $('#kesimpulan').prop('readonly', false);
                return;
            }
            
            // Simpan kesimpulan dan progres
            simpanProgres(kesimpulan);
        });
    });

    function simpanProgres(kesimpulan) {
        console.log('Memulai simpan progres kesimpulan...');
        console.log('Data yang akan dikirim:', {
            skor: 1,
            totalSoal: 1,
            kesimpulan: kesimpulan
        });

        // Data yang akan dikirim
        const data = {
            nama_aktivitas: 'kesimpulan-1',
            judul_aktivitas: 'Kesimpulan 1 - Sistem Pertahanan Tubuh',
            skor: 1, // Kesimpulan dianggap selesai jika sudah dikirim
            total_soal: 1,
            detail_jawaban: {
                kesimpulan_siswa: kesimpulan,
                timestamp: new Date().toISOString(),
                char_count: kesimpulan.length
            }
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
                
                // Show success message
                $('#success-message').fadeIn();
                
                // Hide form and show result with user's conclusion
                $('#form-kesimpulan').hide();
                $('#hasil-kesimpulan').text(kesimpulan);
                $('#hasil-container').fadeIn();
                
                // Tampilkan notifikasi sukses
                if (typeof Swal !== 'undefined') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Selamat!',
                        text: 'Kesimpulan Anda telah berhasil disimpan!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
                
                // Trigger event for progress bar update
                window.dispatchEvent(new Event('activityCompleted'));
                
                // Hide success message after 3 seconds
                setTimeout(() => {
                    $('#success-message').fadeOut();
                }, 3000);
            },
            error: function(xhr, status, error) {
                console.error('Error menyimpan progres:', error);
                console.error('Response:', xhr.responseText);
                
                showError('Gagal menyimpan kesimpulan. Silakan coba lagi.');
                
                // Re-enable form
                $('#btn-submit').prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Buat Kesimpulan');
                $('#kesimpulan').prop('readonly', false);
            }
        });
    }

    function showError(message) {
        $('#error-text').text(message);
        $('#error-message').fadeIn();
        
        setTimeout(() => {
            $('#error-message').fadeOut();
        }, 3000);
    }
</script>
@endsection