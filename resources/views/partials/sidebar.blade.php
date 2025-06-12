<!-- Sidebar Navigation -->
<div class="sidebar" id="sidebar">
    <!-- Sidebar Header -->
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
        <a href="/beranda" class="btn btn-primary" id="homeButton">
            <i class="bi bi-house-door me-2"></i>
            <span class="nav-item-text">Beranda</span>
        </a>
        {{-- <button class="btn btn-outline-secondary" id="collapseNavigation">
            <i class="bi bi-list"></i>
        </button> --}}
    </div>

    <!-- Accordion Navigation -->
    <div class="accordion" id="mainNavigation">
        @include('partials.navigation') <!-- Include file navigasi -->
    </div>
</div>