{{-- TIDAK TERPAKAI LAGI/SIAP DIHAPUS --}}

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    :root {
           --sidebar-width: 280px;
           --sidebar-collapsed-width: 80px;
           --transition-speed: 0.3s;
       }

       body {
           font-family: 'Arial', sans-serif;
           background-color: #f4f6f9;
           overflow-x: hidden;
       }

       /* Sidebar Styling */
       .sidebar {
           height: 100vh;
           width: var(--sidebar-width);
           position: fixed;
           top: 0;
           left: 0;
           background-color: #ffffff;
           box-shadow: 2px 0 5px rgba(0,0,0,0.1);
           transition: width var(--transition-speed) ease;
           z-index: 1000;
           overflow-x: hidden;
       }

       .sidebar.collapsed {
           width: var(--sidebar-collapsed-width);
       }

       /* Navigation Item Styling */
       .nav-item {
           display: flex;
           align-items: center;
           padding: 10px 15px;
           transition: background-color 0.2s;
       }

       .nav-item:hover {
           background-color: #f8f9fa;
       }

       .sidebar.collapsed .nav-item-text {
           display: none;
       }

       .sidebar.collapsed .nav-item {
           justify-content: center;
       }

       /* Content Area */
       .content-area {
           transition: margin-left var(--transition-speed) ease;
           margin-left: var(--sidebar-width);
       }

       .sidebar.collapsed + .content-area {
           margin-left: var(--sidebar-collapsed-width);
       }

       /* Responsive Design */
       @media (max-width: 992px) {
           .sidebar {
               transform: translateX(-100%);
           }
           .content-area {
               margin-left: 0;
           }
           .sidebar.show {
               transform: translateX(0);
           }
       }

       /* Content Styling */
       .content-card {
           background-color: white;
           border-radius: 8px;
           box-shadow: 0 4px 6px rgba(0,0,0,0.1);
       }

       /* Accordion Customization */
       .accordion-button {
           background-color: #f8f9fa;
       }

       .accordion-button:not(.collapsed) {
           background-color: #e9ecef;
       }

       .materi {
           text-align:justify;
       }

       #homeButton {
           display: flex;
           align-items: center;
           text-decoration: none;
       }

       #homeButton i {
           font-size: 1.2rem;
       }

       #homeButton .nav-item-text {
           margin-left: 10px;
       }
</style>
<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar" id="sidebar">
        <!-- Sidebar Header -->
        <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
            <a href="#" class="btn btn-primary" id="homeButton">
                <i class="bi bi-house-door me-2"></i>
                <span class="nav-item-text">Beranda</span>
            </a>
            <button class="btn btn-outline-secondary" id="collapseNavigation">
                <i class="bi bi-list"></i>
            </button>
        </div>

        
        <div class="accordion" id="mainNavigation">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed nav-item" type="button" data-bs-toggle="collapse" 
                            data-bs-target="#basicConcepts">
                        <i class="bi bi-diagram-3 me-2"></i>
                        <span class="nav-item-text">A. Mekanisme Sistem Pertahanan Tubuh</span>
                    </button>
                </h2>
                <div id="basicConcepts" class="accordion-collapse collapse" data-bs-parent="#mainNavigation">
                    <div class="accordion-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pendahuluan-1">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pendahuluan & Stimulus</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="identifikasi-masalah-1">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Identifikasi Masalah</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pengumpulan-data-1">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pengumpulan Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pengolahan-data-1">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pengolahan Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="verifikasi-1">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Verifikasi</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="kuis-1">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Kuis</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed nav-item" type="button" data-bs-toggle="collapse" 
                            data-bs-target="#nonSpecificDefense">
                        <i class="bi bi-shield me-2"></i>
                        <span class="nav-item-text">B.	Komponen Sistem Pertahanan Tubuh </span>
                    </button>
                </h2>
                <div id="nonSpecificDefense" class="accordion-collapse collapse" data-bs-parent="#mainNavigation">
                    <div class="accordion-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pendahuluan-2">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pendahuluan & Stimulus</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="identifikasi-masalah-2">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Identifikasi Masalah</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pengumpulan-data-2">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pengumpulan Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pengolahan-data-2">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pengolahan Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="verifikasi-2">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Verifikasi</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="kuis-2">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Kuis</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed nav-item" type="button" data-bs-toggle="collapse" 
                            data-bs-target="#specificDefense">
                        <i class="bi bi-book me-2"></i>
                        <span class="nav-item-text">C.	Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh</span>
                    </button>
                </h2>
                <div id="specificDefense" class="accordion-collapse collapse" data-bs-parent="#mainNavigation">
                    <div class="accordion-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pendahuluan-3">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pendahuluan & Stimulus</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="identifikasi-masalah-3">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Identifikasi Masalah</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pengumpulan-data-3">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pengumpulan Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="pengolahan-data-3">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Pengolahan Data</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="verifikasi-3">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Verifikasi</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="kuis-3">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Kuis</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed nav-item" type="button" data-bs-toggle="collapse" 
                            data-bs-target="#specificDefense">
                        <i class="bi bi-blockquote-left me-2"></i>
                        <span class="nav-item-text">Evaluasi</span>
                    </button>
                </h2>
                <div id="specificDefense" class="accordion-collapse collapse" data-bs-parent="#mainNavigation">
                    <div class="accordion-body p-0">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action nav-item content-link" 
                               data-content="evaluasi-1">
                                <i class="bi bi-arrow-right me-2"></i>
                                <span class="nav-item-text">Evaluasi</span>
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const sidebar = document.getElementById('sidebar');
            const contentArea = document.querySelector('.content-area');
            const collapseNavigationBtn = document.getElementById('collapseNavigation');
            const toggleSidebarBtn = document.getElementById('toggleSidebar');
            const contentBody = document.getElementById('contentBody');
            const pageTitle = document.getElementById('pageTitle');

            // Home Button
            const homeButton = document.getElementById('homeButton');
            homeButton.addEventListener('click', function(e) {
                e.preventDefault();
                loadContent('home');
            });

            // Navigation Collapse/Expand
            collapseNavigationBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });

            // Tambahkan event listener untuk link konten
            document.querySelectorAll('.content-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const contentType = this.getAttribute('data-content');
                    loadContent(contentType);
                });
            });
    </script>
</body>
</html> --}}