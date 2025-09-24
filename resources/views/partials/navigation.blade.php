<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed nav-item" type="button" data-bs-toggle="collapse" 
                data-bs-target="#basicConceptsA">
            <i class="bi bi-diagram-3 me-2"></i>
            <span class="nav-item-text">A. Mekanisme Sistem Pertahanan Tubuh</span>
        </button>
    </h2>
    <div id="basicConceptsA" class="accordion-collapse collapse" data-bs-parent="#mainNavigation">
        <div class="accordion-body p-0">
            <div class="list-group list-group-flush">
                {{-- <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                   data-content="subbab-1">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">TP</span>
                </a>  --}}
                {{-- <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                   data-content="">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Tujuan Pembelajaran</span>
                </a> --}}
                <a href="{{ route('stimulus-1') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="stimulus-1">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Stimulus</span>
                </a>
                <a href="{{ route('identifikasi-masalah-1') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="identifikasi-masalah-1">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Identifikasi Masalah</span>
                </a>
                <a href="{{ route('pengumpulan-data-1') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="pengumpulan-data-1">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Pengumpulan Data</span>
                </a>
                <a href="{{ route('pengolahan-data-1') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="pengolahan-data-1">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Pengolahan Data</span>
                </a>
                <a href="{{ route('verifikasi-1') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="verifikasi-1">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Verifikasi</span>
                </a>
                <a href="{{ route('kesimpulan-1') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="kesimpulan-1">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Kesimpulan</span>
                </a>
                <a href="{{ route('kuis1.index') }}" class="list-group-item list-group-item-action nav-item">
                    <i class="bi bi-list-task me-2"></i>
                    <span class="nav-item-text">Kuis 1</span>
                </a>
                <!-- Tambahkan link navigasi lainnya -->
            </div>
        </div>
    </div>
</div>
<!-- Tambahkan accordion-item lainnya -->

<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed nav-item" type="button" data-bs-toggle="collapse" 
                data-bs-target="#basicConceptsB">
            <i class="bi bi-diagram-3 me-2"></i>
            <span class="nav-item-text">B. Komponen Sistem Pertahanan Tubuh</span>
        </button>
    </h2>
    <div id="basicConceptsB" class="accordion-collapse collapse" data-bs-parent="#mainNavigation">
        <div class="accordion-body p-0">
            <div class="list-group list-group-flush">
                {{-- <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                   data-content="subbab-2">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">TP</span>
                </a> --}}
                <a href="{{ route('stimulus-2') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="stimulus-2">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Stimulus</span>
                </a>
                <a href="{{ route('identifikasi-masalah-2') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="identifikasi-masalah-2">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Identifikasi Masalah</span>
                </a>
                <a href="{{ route('pengumpulan-data-2') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="pengumpulan-data-2">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Pengumpulan Data</span>
                </a>
                <a href="{{ route('pengolahan-data-2') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="pengolahan-data-2">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Pengolahan Data</span>
                </a>
                <a href="{{ route('verifikasi-2') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="verifikasi-2">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Verifikasi</span>
                </a>
                <a href="{{ route('kesimpulan-2') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="kesimpulan-2">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Kesimpulan</span>
                </a>
                <a href="{{ route('kuis2.index') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="kuis-2">
                    <i class="bi bi-list-task me-2"></i>
                    <span class="nav-item-text">Kuis 2</span>
                </a>
                <!-- Tambahkan link navigasi lainnya -->
            </div>
        </div>
    </div>
</div>

<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed nav-item" type="button" data-bs-toggle="collapse" 
                data-bs-target="#basicConceptsC">
            <i class="bi bi-diagram-3 me-2"></i>
            <span class="nav-item-text">C. Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh</span>
        </button>
    </h2>
    <div id="basicConceptsC" class="accordion-collapse collapse" data-bs-parent="#mainNavigation">
        <div class="accordion-body p-0">
            <div class="list-group list-group-flush">
                {{-- <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                   data-content="subbab-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">TP</span>
                </a> --}}
                <a href="{{ route('stimulus-3') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="stimulus-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Stimulus</span>
                </a>
                <a href="{{ route('identifikasi-masalah-3') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="identifikasi-masalah-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Identifikasi Masalah</span>
                </a>
                <a href="{{ route('pengumpulan-data-3') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="pengumpulan-data-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Pengumpulan Data</span>
                </a>
                <a href="{{ route('pengolahan-data-3') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="pengolahan-data-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Pengolahan Data</span>
                </a>
                <a href="{{ route('verifikasi-3') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="verifikasi-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Verifikasi</span>
                </a>
                <a href="{{ route('kesimpulan-3') }}" class="list-group-item list-group-item-action nav-item" 
                   data-content="kesimpulan-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    <span class="nav-item-text">Kesimpulan</span>
                </a>
                <a href="{{ route('kuis3.index') }}" class="list-group-item list-group-item-action nav-item " 
                   data-content="kuis-3">
                    <i class="bi bi-list-task me-2"></i>
                    <span class="nav-item-text">Kuis 3</span>
                </a>
                <!-- Tambahkan link navigasi lainnya -->
            </div>
        </div>
    </div>
</div>

<!-- Evaluasi Akhir -->
<div class="list-group list-group-flush">
    <a href="{{ route('evaluasi') }}" class="list-group-item list-group-item-action nav-item">
        <i class="bi bi-clipboard-check me-2"></i>
        <span class="nav-item-text">Evaluasi Akhir</span>
    </a>
</div>


@auth
    <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action nav-item" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left me-2"></i>
            <span class="nav-item-text">Logout ({{ Auth::user()->name }})</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
@endauth

<!-- Alternative: Logout dengan JavaScript untuk pengalaman yang lebih smooth (sedang dipakai) -->

{{-- Konvensional: Form POST langsung --}}
{{-- @auth
    
    <div class="list-group list-group-flush">
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="list-group-item list-group-item-action nav-item text-start w-100 border-0" 
                        style="background: none; cursor: pointer;">
                    <i class="bi bi-box-arrow-left me-2"></i>
                    <span class="nav-item-text">Logout ({{ Auth::user()->name }})</span>
                </button>
            </form>
        </div>
@endauth --}}