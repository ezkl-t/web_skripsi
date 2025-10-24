<!-- Modal PDF Viewer -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="pdfModalLabel">
                    <i class="fas fa-book me-2"></i>Baca Materi
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <!-- Header Pilihan Materi -->
                <div class="bg-light p-3 border-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <label for="materiSelect" class="form-label fw-bold">Pilih Materi:</label>
                            <select class="form-select" id="materiSelect">
                                <option value="">-- Pilih Materi --</option>
                                <!-- Options akan diisi via JavaScript -->
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div id="materiInfo" class="text-muted small">
                                Pilih materi di atas
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PDF Viewer -->
                <div id="pdfViewerContainer" class="d-none">
                    <div class="embed-responsive embed-responsive-16by9" style="height: 70vh;">
                        <iframe 
                            id="pdfViewer" 
                            class="embed-responsive-item w-100 h-100" 
                            style="border: none;"
                            src=""
                            title="PDF Viewer">
                        </iframe>
                    </div>
                </div>

                <!-- Placeholder saat belum memilih -->
                <div id="pdfPlaceholder" class="text-center py-5">
                    <i class="fas fa-file-pdf fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Pilih materi di atas</h5>
                    <p class="text-muted">PDF akan ditampilkan di sini</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Tutup
                </button>
                <a href="#" id="downloadPdf" class="btn btn-success d-none">
                    <i class="fas fa-download me-1"></i>Download PDF
                </a>
                <a href="#" id="openNewTab" class="btn btn-outline-primary d-none" target="_blank">
                    <i class="fas fa-external-link-alt me-1"></i>Buka di Tab Baru
                </a>
            </div>
        </div>
    </div>
</div>

<style>
.pdf-modal .modal-dialog {
    max-width: 95%;
    height: 95%;
}

.pdf-modal .modal-content {
    height: 95%;
}

.embed-responsive {
    position: relative;
    display: block;
    width: 100%;
    padding: 0;
    overflow: hidden;
}

.embed-responsive-16by9::before {
    padding-top: 56.25%;
}

.embed-responsive-item {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

#pdfPlaceholder {
    min-height: 400px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const pdfModal = document.getElementById('pdfModal');
    const materiSelect = document.getElementById('materiSelect');
    const pdfViewer = document.getElementById('pdfViewer');
    const pdfViewerContainer = document.getElementById('pdfViewerContainer');
    const pdfPlaceholder = document.getElementById('pdfPlaceholder');
    const downloadPdf = document.getElementById('downloadPdf');
    const openNewTab = document.getElementById('openNewTab');
    const materiInfo = document.getElementById('materiInfo');

    let materiList = [];

    // Load daftar materi saat modal dibuka
    pdfModal.addEventListener('show.bs.modal', function() {
        loadMateriList();
    });

    // Reset saat modal ditutup
    pdfModal.addEventListener('hidden.bs.modal', function() {
        resetModal();
    });

    // Event ketika materi dipilih
    materiSelect.addEventListener('change', function() {
        const selectedId = this.value;
        const selectedMateri = materiList.find(m => m.id === selectedId);
        
        if (selectedMateri) {
            showPdf(selectedMateri);
        } else {
            hidePdf();
        }
    });

    function loadMateriList() {
        fetch('/api/materi-pdf')
            .then(response => response.json())
            .then(data => {
                materiList = data;
                populateMateriSelect(data);
            })
            .catch(error => {
                console.error('Error loading materi:', error);
                materiInfo.innerHTML = '<span class="text-danger">Gagal memuat daftar materi</span>';
            });
    }

    function populateMateriSelect(materi) {
        materiSelect.innerHTML = '<option value="">-- Pilih Materi --</option>';
        materi.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.textContent = item.nama;
            materiSelect.appendChild(option);
        });
    }

    function showPdf(materi) {
        const pdfUrl = `/pdf/${materi.filename}#toolbar=0`;
        
        // Update PDF viewer
        pdfViewer.src = pdfUrl;
        pdfViewerContainer.classList.remove('d-none');
        pdfPlaceholder.classList.add('d-none');
        
        // Update tombol aksi
        downloadPdf.href = `/pdf/${materi.filename}`;
        downloadPdf.classList.remove('d-none');
        downloadPdf.download = materi.filename;
        
        openNewTab.href = `/pdf/${materi.filename}`;
        openNewTab.classList.remove('d-none');
        
        // Update info materi
        materiInfo.innerHTML = `<strong>${materi.nama}</strong><br>${materi.deskripsi}`;
    }

    function hidePdf() {
        pdfViewer.src = '';
        pdfViewerContainer.classList.add('d-none');
        pdfPlaceholder.classList.remove('d-none');
        downloadPdf.classList.add('d-none');
        openNewTab.classList.add('d-none');
        materiInfo.innerHTML = 'Pilih materi di atas';
    }

    function resetModal() {
        materiSelect.selectedIndex = 0;
        hidePdf();
    }

    // Global function untuk membuka modal
    window.openPdfModal = function() {
        const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
        modal.show();
    };
});
</script>