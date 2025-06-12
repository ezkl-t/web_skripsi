@extends('layouts.app')

@section('title', 'Kesimpulan')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')
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
    
    .btn-edit {
        background-color: var(--secondary);
        color: white;
        border: none;
        padding: 6px 15px;
        border-radius: 4px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .btn-edit:hover {
        background-color: #c08935;
    }
    
    .hasil-content {
        color: #333;
        line-height: 1.8;
        white-space: pre-wrap;
        word-wrap: break-word;
    }
    
    .success-message {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 12px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: none;
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
    }
</style>

<div class="kesimpulan-container">
    <div class="card-kesimpulan">
        <h2 class="title-kesimpulan">Kesimpulan Materi 1</h2>
        
        <div class="instruksi">
            <i class="fas fa-lightbulb"></i> Setelah kamu mempelajari aktivitas dan materi tadi, sekarang buatlah kesimpulan dari yang telah kamu pelajari!
        </div>
        
        <div id="success-message" class="success-message">
            <i class="fas fa-check-circle"></i> Kesimpulan berhasil disimpan dan progres telah dicatat!
        </div>
        
        <div id="error-message" class="error-message">
            <i class="fas fa-exclamation-circle"></i> <span id="error-text">Terjadi kesalahan saat menyimpan.</span>
        </div>
        
        <form id="form-kesimpulan">
            <div class="form-group">
                <label for="kesimpulan">Tuliskan kesimpulanmu di bawah ini:</label>
                <textarea 
                    id="kesimpulan" 
                    name="kesimpulan" 
                    class="textarea-kesimpulan" 
                    placeholder="Tulis kesimpulan pembelajaran kamu di sini..."
                    maxlength="1000"
                    required
                ></textarea>
                <div class="char-counter">
                    <span id="char-count">0</span>/1000 karakter
                </div>
            </div>
            
            <button type="submit" id="btn-submit" class="btn-kirim">
                <i class="fas fa-paper-plane"></i> Kirim
            </button>
        </form>
        
        <div id="hasil-container" class="hasil-container">
            <div class="hasil-card">
                <div class="hasil-header">
                    <h4 class="hasil-title">Kesimpulan Materi Sistem Pertahanan Tubuh:</h4>
                </div>
                <div class="hasil-content">
                    <div id="materi-conclusion" style="line-height: 1.8; color: #333;">
                        Sistem pertahanan tubuh manusia terdiri dari dua jenis utama yaitu sistem pertahanan non-spesifik (bawaan) dan sistem pertahanan spesifik (adaptif). 
                        <br><br>
                        Sistem pertahanan non-spesifik merupakan garis pertahanan pertama yang meliputi pertahanan fisik (kulit, membran mukosa), pertahanan kimiawi (air mata, asam lambung), dan pertahanan seluler (fagosit, sel NK). Sistem ini bekerja cepat dan tidak memerlukan pengenalan patogen sebelumnya.
                        <br><br>
                        Sistem pertahanan spesifik melibatkan limfosit B dan limfosit T yang bekerja secara spesifik terhadap antigen tertentu. Limfosit B menghasilkan antibodi, sedangkan limfosit T berperan dalam imunitas seluler. Sistem ini memiliki kemampuan memori imunologis yang memberikan perlindungan jangka panjang.
                        <br><br>
                        Kedua sistem ini bekerja sama secara sinergis untuk melindungi tubuh dari berbagai patogen dan menjaga kesehatan tubuh secara keseluruhan.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
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
        
        const kesimpulan = $('#kesimpulan').val().trim();
        
        if (kesimpulan.length < 50) {
            showError('Kesimpulan terlalu singkat. Minimal 50 karakter.');
            return;
        }
        
        // Disable form while submitting
        $('#btn-submit').prop('disabled', true).html('<span class="loading"></span> Menyimpan...');
        $('#kesimpulan').prop('readonly', true);
        
        // Simpan kesimpulan dan progres
        simpanKesimpulan(kesimpulan);
    });
});

function simpanKesimpulan(kesimpulan) {
    const data = {
        nama_aktivitas: 'kesimpulan-1',
        judul_aktivitas: 'Kesimpulan 1',
        skor: 1, // Kesimpulan dianggap selesai jika sudah dikirim
        total_soal: 1,
        detail_jawaban: {
            kesimpulan_siswa: kesimpulan,
            timestamp: new Date().toISOString()
        }
    };
    
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
            
            // Hide form and show result - TIDAK MENGGUNAKAN slideUp agar tidak hilang
            $('#form-kesimpulan').hide();
            $('#hasil-container').show();
            
            // Trigger event for progress bar update
            window.dispatchEvent(new Event('activityCompleted'));
            
            // Hide success message after 5 seconds
            setTimeout(() => {
                $('#success-message').fadeOut();
            }, 5000);
        },
        error: function(xhr, status, error) {
            console.error('Error menyimpan progres:', error);
            showError('Gagal menyimpan kesimpulan. Silakan coba lagi.');
            
            // Re-enable form
            $('#btn-submit').prop('disabled', false).html('<i class="fas fa-paper-plane"></i> Kirim');
            $('#kesimpulan').prop('readonly', false);
        }
    });
}

// Hapus function editKesimpulan karena tidak ada tombol edit lagi

function showError(message) {
    $('#error-text').text(message);
    $('#error-message').fadeIn();
    
    setTimeout(() => {
        $('#error-message').fadeOut();
    }, 5000);
}
</script>
@endsection