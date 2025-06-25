@extends('layouts.app')

@section('title', 'Pengolahan Data')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .materi {
            font-size: 1.1em;
            color: #555;
            text-align: justify;
            line-height: 1.6;
        }
        
        .petunjuk-box {
            background-color: #d1ecf1;
            border: 1px solid #bee5eb;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .opsi-jawaban-box {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .paragraf-box {
            background-color: #f8f9fa;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 25px;
            font-size: 1.1em;
            line-height: 1.8;
        }

        .blank-input {
            display: inline-block;
            min-width: 150px;
            padding: 5px 10px;
            border: 2px solid #6c757d;
            border-radius: 4px;
            background-color: white;
            font-weight: bold;
            text-align: center;
            margin: 0 3px;
        }

        .blank-input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .blank-input.correct {
            background-color: #d4edda;
            border-color: #28a745;
            color: #155724;
        }

        .blank-input.incorrect {
            background-color: #f8d7da;
            border-color: #dc3545;
            color: #721c24;
        }

        .opsi-item {
            display: inline-block;
            background-color: #e9ecef;
            border: 2px solid #6c757d;
            border-radius: 6px;
            padding: 8px 12px;
            margin: 5px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .opsi-item:hover {
            background-color: #dee2e6;
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .opsi-item.selected {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .btn-cek {
            background-color: #540B0E;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-cek:hover {
            background-color: #9E2A2B;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
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

        .result-section {
            margin-top: 25px;
            padding: 20px;
            border-radius: 8px;
            display: none;
        }

        .result-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .result-warning {
            background-color: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }

        .result-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .number-label {
            display: inline-block;
            background-color: #540B0E;
            color: white;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            text-align: center;
            line-height: 24px;
            font-size: 14px;
            font-weight: bold;
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2 class="card-title mb-4" style="color: #9E2A2B">Pengolahan Data</h2>
        
        <!-- Petunjuk Pengerjaan -->
        <div class="petunjuk-box">
            <h5 style="color: #0c5460; margin-bottom: 15px;"><i class="fas fa-info-circle"></i> Petunjuk Pengerjaan:</h5>
            <p class="mb-0">Lengkapi paragraf berikut dengan jawaban yang tepat pada bagian yang kosong! Klik pada opsi jawaban yang tersedia untuk mengisi bagian yang kosong tersebut.</p>
        </div>

        <!-- Opsi Jawaban -->
        <div class="opsi-jawaban-box">
            <h5 style="color: #856404; margin-bottom: 15px;"><i class="fas fa-list"></i> Opsi Jawaban:</h5>
            <div id="opsi-container">
                <div class="opsi-item" data-value="patogen">patogen/mikroorganisme</div>
                <div class="opsi-item" data-value="jaringan-epitel">jaringan epitel/lapisan epitel</div>
                <div class="opsi-item" data-value="hcl">HCl/Hidrogen Klorida/asam lambung</div>
                <div class="opsi-item" data-value="lisozim">lisozim</div>
                <div class="opsi-item" data-value="trombosit">trombosit</div>
                <div class="opsi-item" data-value="nonspesifik">nonspesifik/tidak spesifik</div>
            </div>
        </div>

        <!-- Paragraf dengan isian -->
        <div class="paragraf-box">
            <p>
                Tubuh manusia memiliki sistem pertahanan eksternal yang berfungsi mencegah masuknya 
                <span class="number-label">1</span><input type="text" class="blank-input" id="blank-1" readonly placeholder="Klik opsi jawaban"> 
                ke dalam jaringan tubuh. Pertahanan eksternal terdiri dari tiga jenis mekanisme yang bekerja secara terpadu. 
                Pertama, pertahanan fisik berupa 
                <span class="number-label">2</span><input type="text" class="blank-input" id="blank-2" readonly placeholder="Klik opsi jawaban"> 
                yang melapisi permukaan tubuh, saluran pernapasan, dan pencernaan untuk menghalangi masuknya mikroorganisme. 
                Kedua, pertahanan kimiawi melalui sekresi berbagai senyawa, seperti 
                <span class="number-label">3</span><input type="text" class="blank-input" id="blank-3" readonly placeholder="Klik opsi jawaban"> 
                di lambung yang menciptakan kondisi asam untuk membunuh mikroorganisme, serta enzim 
                <span class="number-label">4</span><input type="text" class="blank-input" id="blank-4" readonly placeholder="Klik opsi jawaban"> 
                yang terdapat dalam air mata, air liur, dan keringat yang berfungsi merusak dinding sel bakteri. 
                Ketiga, pertahanan di tingkat sel yang melibatkan 
                <span class="number-label">5</span><input type="text" class="blank-input" id="blank-5" readonly placeholder="Klik opsi jawaban"> 
                atau keping darah dalam mekanisme penutupan luka untuk mencegah patogen masuk melalui jaringan yang terbuka. 
                Meskipun sangat penting, pertahanan eksternal memiliki keterbatasan karena bersifat 
                <span class="number-label">6</span><input type="text" class="blank-input" id="blank-6" readonly placeholder="Klik opsi jawaban">, 
                artinya tidak dapat membedakan jenis patogen secara khusus.
            </p>
        </div>

        <!-- Tombol Cek Jawaban -->
        <div class="text-center">
            <button class="btn-cek" onclick="checkAnswers()">
                <i class="fas fa-check-circle"></i> Cek Jawaban
            </button>
        </div>

        <!-- Area Hasil -->
        <div id="result-section" class="result-section">
            <h5 id="result-title"></h5>
            <div id="result-details"></div>
        </div>

        <!-- Tombol Selanjutnya -->
        <div id="tombolSelanjutnya" style="display: none; text-align: center; margin-top: 20px;">
            <a href="{{ route('verifikasi-1') }}" class="btn-selanjutnya">
                <i class="fas fa-arrow-right"></i> Selanjutnya
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Deklarasi variabel global
        let selectedBlank = null;
        let userAnswers = {};

        $(document).ready(function() {
            // Setup CSRF token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Kunci jawaban
            const answerKey = {
                1: 'patogen',
                2: 'jaringan-epitel', 
                3: 'hcl',
                4: 'lisozim',
                5: 'trombosit',
                6: 'nonspesifik'
            };

            // Event handler untuk input kosong
            $('.blank-input').click(function() {
                // Reset semua input
                $('.blank-input').removeClass('selected-input');
                $('.opsi-item').removeClass('selected');
                
                // Tandai input yang dipilih
                $(this).addClass('selected-input');
                selectedBlank = $(this).attr('id');
                
                // Highlight opsi yang sudah dipilih untuk input ini
                const currentValue = $(this).data('value');
                if (currentValue) {
                    $(`.opsi-item[data-value="${currentValue}"]`).addClass('selected');
                }
            });

            // Event handler untuk opsi jawaban
            $('.opsi-item').click(function() {
                if (!selectedBlank) {
                    alert('Silakan pilih kotak isian terlebih dahulu!');
                    return;
                }

                const value = $(this).data('value');
                const text = $(this).text();
                const inputNumber = selectedBlank.split('-')[1];

                // Reset opsi yang sebelumnya terpilih
                $('.opsi-item').removeClass('selected');
                
                // Tandai opsi yang dipilih
                $(this).addClass('selected');

                // Isi input yang dipilih
                $(`#${selectedBlank}`).val(text).data('value', value);
                
                // Simpan jawaban user
                userAnswers[inputNumber] = value;
                
                console.log('User answers updated:', userAnswers);

                // Reset selection
                $('.blank-input').removeClass('selected-input');
                selectedBlank = null;
            });
        });

        function checkAnswers() {
            const answerKey = {
                1: 'patogen',
                2: 'jaringan-epitel', 
                3: 'hcl',
                4: 'lisozim',
                5: 'trombosit',
                6: 'nonspesifik'
            };

            let correctCount = 0;
            let totalQuestions = 6;
            let detailJawaban = {};
            let answeredCount = 0;

            // Reset warna semua input
            $('.blank-input').removeClass('correct incorrect');

            // Periksa setiap jawaban
            for (let i = 1; i <= totalQuestions; i++) {
                const input = $(`#blank-${i}`);
                const userValue = input.data('value');
                const correctValue = answerKey[i];
                
                // Hitung yang sudah dijawab
                if (userValue) {
                    answeredCount++;
                }
                
                detailJawaban[i] = {
                    user_answer: userValue || '',
                    correct_answer: correctValue,
                    is_correct: userValue === correctValue
                };

                if (userValue === correctValue) {
                    correctCount++;
                    input.addClass('correct');
                } else if (userValue) {
                    input.addClass('incorrect');
                }
            }

            // Debug logging
            console.log('Correct Count:', correctCount);
            console.log('Total Questions:', totalQuestions);
            console.log('Answered Count:', answeredCount);
            console.log('User Answers:', userAnswers);
            console.log('Detail Jawaban:', detailJawaban);

            // Tampilkan hasil
            const resultSection = $('#result-section');
            const resultTitle = $('#result-title');
            const resultDetails = $('#result-details');
            
            resultSection.show();

            const unansweredCount = totalQuestions - answeredCount;
            
            if (correctCount === totalQuestions && answeredCount === totalQuestions) {
                resultSection.removeClass('result-warning result-danger').addClass('result-success');
                resultTitle.html('<i class="fas fa-trophy"></i> Selamat! Jawaban Anda benar semua!');
                resultDetails.html('Kerja Bagus! Anda telah berhasil melengkapi paragraf dengan tepat.');
                
                // Tampilkan tombol selanjutnya
                console.log('Menampilkan tombol selanjutnya...');
                $('#tombolSelanjutnya').show();
                
                // Force show dengan CSS
                document.getElementById('tombolSelanjutnya').style.display = 'block';
                
            } else if (unansweredCount > 0) {
                resultSection.removeClass('result-success result-danger').addClass('result-warning');
                resultTitle.html('<i class="fas fa-exclamation-triangle"></i> Belum Lengkap');
                resultDetails.html(`
                    <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalQuestions}</p>
                    <p><strong>Belum dijawab:</strong> ${unansweredCount}</p>
                    <p class="mb-0"><em>Silakan lengkapi semua isian terlebih dahulu!</em></p>
                `);
                
                $('#tombolSelanjutnya').hide();
            } else {
                resultSection.removeClass('result-success result-warning').addClass('result-danger');
                resultTitle.html('<i class="fas fa-times-circle"></i> Masih ada yang keliru');
                resultDetails.html(`
                    <p><strong>Jawaban benar:</strong> ${correctCount} dari ${totalQuestions}</p>
                    <p><strong>Jawaban salah:</strong> ${totalQuestions - correctCount}</p>
                    <p class="mb-0"><em>Periksa kembali jawaban yang berwarna merah dan coba lagi!</em></p>
                `);
                
                $('#tombolSelanjutnya').hide();
            }

            // Scroll ke hasil
            resultSection[0].scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Simpan progres
            simpanProgres(correctCount, totalQuestions, detailJawaban);
        }

        function simpanProgres(skor, totalSoal, detailJawaban) {
            const data = {
                nama_aktivitas: 'pengolahan-data-1',
                judul_aktivitas: 'Pengolahan Data 1 - Melengkapi Paragraf Sistem Pertahanan Tubuh',
                skor: skor,
                total_soal: totalSoal,
                detail_jawaban: detailJawaban
            };

            $.ajax({
                url: '/api/progres/simpan',
                method: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(response) {
                    console.log('Progres berhasil disimpan:', response);
                    
                    if (skor === totalSoal) {
                        // Tampilkan notifikasi sukses jika sempurna
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
                    
                    // Tampilkan pesan error yang user-friendly
                    const resultDetails = $('#result-details');
                    resultDetails.append('<br><small class="text-warning">Progres gagal disimpan, tetapi jawaban Anda tetap tercatat.</small>');
                }
            });
        }
    </script>
</body>

@endsection