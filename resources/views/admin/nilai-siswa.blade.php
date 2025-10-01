<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nilai Siswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminPage/dist/css/adminlte.min.css') }}">
  <!-- Custom CSS for minimalist styling -->
  <style>
    .nilai-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 1rem;
      display: inline-block;
      min-width: 50px;
      text-align: center;
    }
    
    .grade-A { background-color: #10b981; color: white; }
    .grade-B { background-color: #3b82f6; color: white; }
    .grade-C { background-color: #f59e0b; color: white; }
    .grade-D { background-color: #f97316; color: white; }
    .grade-E { background-color: #ef4444; color: white; }
    
    .status-tuntas { 
      background-color: #10b981; 
      color: white;
      font-size: 0.875rem;
      padding: 4px 10px;
      margin-top: 6px;
    }
    
    .status-belum-tuntas { 
      background-color: #ef4444; 
      color: white;
      font-size: 0.875rem;
      padding: 4px 10px;
      margin-top: 6px;
    }
    
    .belum-dikerjakan { 
      color: #9ca3af; 
      font-size: 1.25rem;
      font-weight: 500;
    }
    
    /* Clean table design */
    .table {
      border: none;
    }
    
    .table thead th {
      border-bottom: 2px solid #e5e7eb;
      border-top: none;
      font-weight: 600;
      color: #374151;
      padding: 1rem;
      background: #f9fafb;
      vertical-align: middle;
    }
    
    .table tbody td {
      border-bottom: 1px solid #f3f4f6;
      padding: 1rem;
      vertical-align: middle;
    }
    
    .table tbody tr:hover {
      background-color: #f9fafb;
    }
    
    /* Clean card design */
    .card {
      border: none;
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
      background: white;
      border-bottom: 1px solid #e5e7eb;
      padding: 1.5rem;
    }
    
    .card-title {
      font-size: 1.25rem;
      font-weight: 600;
      margin: 0;
      color: #111827;
    }
    
    /* Filter styling */
    .filter-select {
      border: 1px solid #e5e7eb;
      border-radius: 8px;
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
      background: white;
      color: #374151;
      cursor: pointer;
      transition: all 0.2s;
    }
    
    .filter-select:hover {
      border-color: #3b82f6;
    }
    
    .filter-select:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    /* Button styling */
    .btn-detail {
      background: #3b82f6;
      color: white;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      font-size: 0.875rem;
      font-weight: 500;
      transition: all 0.2s;
      text-decoration: none;
      display: inline-block;
    }
    
    .btn-detail:hover {
      background: #2563eb;
      color: white;
      transform: translateY(-1px);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    /* Page header */
    .content-header {
      padding: 2rem 0 1rem;
    }
    
    .page-title {
      font-size: 1.5rem;
      font-weight: 600;
      color: #111827;
      margin: 0;
    }
    
    /* Column headers */
    th.quiz-header {
      text-align: center;
      font-size: 0.9rem;
    }
    
    td.nilai-cell {
      text-align: center;
    }
    
    /* Remove navbar search */
    .navbar-search-block {
      display: none;
    }
    
    /* Simplify breadcrumb */
    .breadcrumb {
      background: transparent;
      padding: 0;
      margin: 0;
    }
    
    .breadcrumb-item {
      font-size: 0.875rem;
    }
    
    /* Tooltip for KKM */
    .kkm-tooltip {
      position: relative;
      cursor: help;
    }
    
    .kkm-tooltip::after {
      content: attr(data-kkm);
      position: absolute;
      bottom: 100%;
      left: 50%;
      transform: translateX(-50%);
      background: #1f2937;
      color: white;
      padding: 0.25rem 0.5rem;
      border-radius: 4px;
      font-size: 0.75rem;
      white-space: nowrap;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.2s;
      margin-bottom: 4px;
    }
    
    .kkm-tooltip:hover::after {
      opacity: 1;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('beranda') }}" class="brand-link">
      <span class="brand-text font-weight-light">Halaman Guru</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Halaman Data Siswa
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('dashboard-admin') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('nilai-siswa') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('progres-siswa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Progres Latihan Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('pengaturan-kkm') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaturan KKM</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                @auth
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action nav-item" 
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-left me-2"></i>
                            <span class="nav-item-text">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endauth
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="page-title">Nilai Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Nilai Siswa</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Nilai</h3>
                <div class="card-tools">
                  <select class="filter-select" id="filterKelas" onchange="filterByKelas()">
                    <option value="">Semua Kelas</option>
                    <option value="10A">10A</option>
                    <option value="10B">10B</option>
                    <option value="11A">11A</option>
                    <option value="11B">11B</option>
                    <option value="12A">12A</option>
                    <option value="12B">12B</option>
                  </select>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 50px">No</th>
                      <th>Nama Siswa</th>
                      <th style="width: 100px">NISN</th>
                      <th style="width: 80px">Kelas</th>
                      <th class="quiz-header" style="width: 120px">Kuis 1
                        <br><small class="text-muted">Mekanisme Sistem Pertahanan Tubuh</small>
                      </th>
                      <th class="quiz-header" style="width: 120px">Kuis 2<br><small class="text-muted">Komponen Sistem Pertahanan Tubuh</small></th>
                      <th class="quiz-header" style="width: 120px">Kuis 3<br><small class="text-muted">Jenis-jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh</small></th>
                      <th class="quiz-header" style="width: 120px">Evaluasi</th>
                      <th style="width: 100px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($dataSiswa as $index => $siswa)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $siswa['name'] }}</td>
                        <td>{{ $siswa['nisn'] }}</td>
                        <td>{{ $siswa['kelas'] }}</td>
                        
                        <!-- Nilai Kuis 1 -->
                        <td class="nilai-cell">
                            @if($siswa['kuis_1'])
                                @php
                                  $kkmKuis1 = App\Models\PengaturanKKM::getKkmByNamaKuis('kuis1');
                                  $isTuntasKuis1 = $siswa['kuis_1']['nilai'] >= $kkmKuis1;
                                @endphp
                                <div class="kkm-tooltip" data-kkm="KKM: {{ $kkmKuis1 }}">
                                  <span class="nilai-badge grade-{{ $siswa['kuis_1']['grade'] }}">
                                      {{ number_format($siswa['kuis_1']['nilai'], 0) }}
                                  </span>
                                </div>
                                <br>
                                <span class="nilai-badge {{ $isTuntasKuis1 ? 'status-tuntas' : 'status-belum-tuntas' }}">
                                    {{ $isTuntasKuis1 ? 'Tuntas' : 'Belum' }}
                                </span>
                            @else
                                <span class="belum-dikerjakan">-</span>
                            @endif
                        </td>
                        
                        <!-- Nilai Kuis 2 -->
                        <td class="nilai-cell">
                            @if($siswa['kuis_2'])
                                @php
                                  $kkmKuis2 = App\Models\PengaturanKKM::getKkmByNamaKuis('kuis2');
                                  $isTuntasKuis2 = $siswa['kuis_2']['nilai'] >= $kkmKuis2;
                                @endphp
                                <div class="kkm-tooltip" data-kkm="KKM: {{ $kkmKuis2 }}">
                                  <span class="nilai-badge grade-{{ $siswa['kuis_2']['grade'] }}">
                                      {{ number_format($siswa['kuis_2']['nilai'], 0) }}
                                  </span>
                                </div>
                                <br>
                                <span class="nilai-badge {{ $isTuntasKuis2 ? 'status-tuntas' : 'status-belum-tuntas' }}">
                                    {{ $isTuntasKuis2 ? 'Tuntas' : 'Belum' }}
                                </span>
                            @else
                                <span class="belum-dikerjakan">-</span>
                            @endif
                        </td>
                        
                        <!-- Nilai Kuis 3 -->
                        <td class="nilai-cell">
                            @if($siswa['kuis_3'])
                                @php
                                  $kkmKuis3 = App\Models\PengaturanKKM::getKkmByNamaKuis('kuis3');
                                  $isTuntasKuis3 = $siswa['kuis_3']['nilai'] >= $kkmKuis3;
                                @endphp
                                <div class="kkm-tooltip" data-kkm="KKM: {{ $kkmKuis3 }}">
                                  <span class="nilai-badge grade-{{ $siswa['kuis_3']['grade'] }}">
                                      {{ number_format($siswa['kuis_3']['nilai'], 0) }}
                                  </span>
                                </div>
                                <br>
                                <span class="nilai-badge {{ $isTuntasKuis3 ? 'status-tuntas' : 'status-belum-tuntas' }}">
                                    {{ $isTuntasKuis3 ? 'Tuntas' : 'Belum' }}
                                </span>
                            @else
                                <span class="belum-dikerjakan">-</span>
                            @endif
                        </td>
                        
                        <!-- Nilai Evaluasi -->
                        <td class="nilai-cell">
                            @if($siswa['evaluasi'])
                                @php
                                  $kkmEvaluasi = App\Models\PengaturanKKM::getKkmByNamaKuis('evaluasi');
                                  $isTuntasEvaluasi = $siswa['evaluasi']['nilai'] >= $kkmEvaluasi;
                                @endphp
                                <div class="kkm-tooltip" data-kkm="KKM: {{ $kkmEvaluasi }}">
                                  <span class="nilai-badge grade-{{ $siswa['evaluasi']['grade'] }}">
                                      {{ number_format($siswa['evaluasi']['nilai'], 0) }}
                                  </span>
                                </div>
                                <br>
                                <span class="nilai-badge {{ $isTuntasEvaluasi ? 'status-tuntas' : 'status-belum-tuntas' }}">
                                    {{ $isTuntasEvaluasi ? 'Tuntas' : 'Belum' }}
                                </span>
                            @else
                                <span class="belum-dikerjakan">-</span>
                            @endif
                        </td>
                        
                        <!-- Aksi -->
                        <td>
                            <a href="{{ route('detail-nilai-siswa', $siswa['id']) }}" class="btn-detail">
                                <i class="fas fa-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center" style="padding: 3rem; color: #9ca3af;">
                            Tidak ada data siswa
                        </td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('AdminPage/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminPage/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminPage/dist/js/adminlte.min.js') }}"></script>

<script>
function filterByKelas() {
    const kelas = document.getElementById('filterKelas').value;
    if (kelas) {
        window.location.href = `{{ route('nilai-siswa-by-kelas', '') }}/${kelas}`;
    } else {
        window.location.href = `{{ route('nilai-siswa') }}`;
    }
}
</script>

</body>
</html>