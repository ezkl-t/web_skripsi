<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistem Pertahanan Tubuh')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style>
        :root {
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFF3B0;
            overflow-x: hidden;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            width: var(--sidebar-width);
            position: fixed;
            top: 0;
            left: 0;
            background-color: #335C67;
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
            /* background-color: #273F4F; */
            transition: background-color 0.2s;
        }

        .nav-item:hover {
            background-color: #FFF3B0;
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

        .navbar {
            background-color: #E09F3E;
            border-radius: 8px;
        }

        /* Progress Bar Styling - Minimalis */
        .student-progress-container {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: auto;
            margin-right: 15px;
        }

        .student-name {
            font-weight: 500;
            color: #540B0E;
            font-size: 0.9rem;
        }

        .progress-wrapper {
            position: relative;
            width: 180px;
        }

        .progress {
            height: 20px;
            background-color: rgba(255, 243, 176, 0.5); /* --light dengan opacity */
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #335C67;
        }

        .progress-bar {
            background-color: #335C67; /* --primary */
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFF3B0; /* --light */
            font-weight: 600;
            font-size: 0.85rem;
            transition: width 0.5s ease;
        }

        .progress-percentage {
            color: #540B0E; /* --dark */
            font-weight: 600;
            font-size: 0.9rem;
            min-width: 40px;
            text-align: right;
        }

        /* Responsive Progress Bar */
        @media (max-width: 768px) {
            .student-progress-container {
                gap: 8px;
            }
            
            .progress-wrapper {
                width: 120px;
            }
            
            .student-name {
                display: none; /* Hide name on mobile */
            }
            
            .progress {
                height: 16px;
            }
            
            .progress-bar {
                font-size: 0.75rem;
            }
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
            background-color: rgb(200, 218, 223);
        }

        .accordion-button:not(.collapsed) {
            background-color: #e9ecef;
        }

        .materi {
            text-align:justify;
        }
        .btn-outline-secondary {
            background-color: #540B0E;
        }

        #homeButton {
            display: flex;
            align-items: center;
            text-decoration: none;
            background-color: #9E2A2B;
            border-color: #9E2A2B;
        }

        #homeButton i {
            font-size: 1.2rem;
        }

        #homeButton .nav-item-text {
            margin-left: 10px;
        }       
    </style>
</head>
<body>
    <!-- Sidebar -->
    @include('partials.sidebar')

    <!-- Content Area -->
    <div class="content-area p-4">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg shadow-sm mb-4">
            <div class="container-fluid">
                <button class="btn btn-outline-secondary" id="collapseNavigation">
                    <i class="bi bi-list"></i>
                </button>
                
                
                <!-- Progress Bar untuk Siswa -->
                @if(Auth::check() && Auth::user()->isSiswa())
                    @php
                        $user = Auth::user();
                        
                        // Ambil daftar aktivitas dari UserController (centralized)
                        $daftarAktivitas = \App\Http\Controllers\UserController::getDaftarAktivitas();
                        
                        // Ambil data progres dari database
                        $progresData = \App\Models\ProgresSiswa::where('user_id', $user->id)
                            ->whereIn('status', ['completed', 'incomplete'])
                            ->get();
                        
                        // Hitung progres (sama persis dengan progres-siswa.blade.php)
                        $totalAktivitas = count($daftarAktivitas);
                        $totalSelesai = 0;
                        
                        foreach($daftarAktivitas as $namaAktivitas => $judulAktivitas) {
                            $progresAktivitas = $progresData->where('nama_aktivitas', $namaAktivitas)->first();
                            if($progresAktivitas && $progresAktivitas->status == 'completed') {
                                $totalSelesai++;
                            }
                        }
                        
                        $persentaseKeseluruhan = $totalAktivitas > 0 ? round(($totalSelesai / $totalAktivitas) * 100, 0) : 0;
                    @endphp
                    
                    <div class="student-progress-container">
                        <span class="student-name">{{ $user->name }}</span>
                        <div class="progress-wrapper">
                            <div class="progress">
                                <div class="progress-bar" 
                                    role="progressbar" 
                                    style="width: {{ $persentaseKeseluruhan }}%;" 
                                    aria-valuenow="{{ $persentaseKeseluruhan }}" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100"
                                    title="{{ $totalSelesai }} dari {{ $totalAktivitas }} aktivitas selesai">
                                    @if($persentaseKeseluruhan > 20)
                                        {{ $totalSelesai }}/{{ $totalAktivitas }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <span class="progress-percentage" title="{{ $totalSelesai }} dari {{ $totalAktivitas }} aktivitas selesai">{{ $persentaseKeseluruhan }}%</span>
                    </div>
                @endif
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card content-card" id="contentContainer">
                        <div class="card-body" id="contentBody">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contentMap = @json($contentMap ?? []);
            const sidebar = document.getElementById('sidebar');
            const contentArea = document.querySelector('.content-area');
            const collapseNavigationBtn = document.getElementById('collapseNavigation');
            const toggleSidebarBtn = document.getElementById('toggleSidebar');
            const contentBody = document.getElementById('contentBody');
            const pageTitle = document.getElementById('pageTitle');

            // Home Button
            const homeButton = document.getElementById('homeButton');
            homeButton.addEventListener('click', function(e) {
                
            });

            // Navigation Collapse/Expand
            collapseNavigationBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });

            // Content Loading Function
            function loadContent(contentType) {
                // Simulasi loading konten (ganti dengan metode aktual seperti fetch)
                

                const selectedContent = contentMap[contentType] || {
                    title: 'Konten Tidak Ditemukan',
                    content: '<p>Maaf, konten belum tersedia.</p>'
                };

                // Update konten
                pageTitle.textContent = selectedContent.title;
                contentBody.innerHTML = selectedContent.content;
            }

            // Tambahkan event listener untuk link konten
            document.querySelectorAll('.content-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const contentType = this.getAttribute('data-content');
                    loadContent(contentType);
                });
            });
            
            // Auto-refresh progress bar setiap aktivitas selesai
            @if(Auth::check() && Auth::user()->isSiswa())
            // Listen for custom event when activity is completed
            window.addEventListener('activityCompleted', function(e) {
                // Reload page atau update progress bar via AJAX
                setTimeout(() => {
                    location.reload();
                }, 2000);
            });
            @endif
        });
    </script>
</body>
</html>