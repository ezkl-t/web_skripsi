<!-- Modal Sambutan Kuis -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="welcomeModalLabel">Selamat Datang di {{ $title }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-12">
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
                </div>

                <div class="alert alert-info">
                    <h5 class="alert-heading"><i class="fas fa-info-circle me-2"></i>Petunjuk Pengerjaan Kuis</h5>
                    <hr>
                    <ol>
                        <li>Kuis ini terdiri dari beberapa pertanyaan pilihan ganda.</li>
                        <li>Pilih jawaban yang menurut Anda paling tepat.</li>
                        <li>Setelah memilih jawaban, klik tombol "Selanjutnya" untuk melanjutkan ke pertanyaan berikutnya.</li>
                        <li>Anda dapat melihat progres pengerjaan kuis pada indikator di bagian atas.</li>
                        <li>Setelah menyelesaikan semua pertanyaan, klik tombol "Selesai" untuk melihat hasil.</li>
                        <li>Nilai akan otomatis tersimpan dan dapat dilihat di halaman hasil kuis.</li>
                    </ol>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('beranda') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="fas fa-play me-1"></i> Mulai Kuis
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan modal saat halaman dimuat -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
        welcomeModal.show();
    });
</script>