<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Progres Pengerjaan Siswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminPage/dist/css/adminlte.min.css') }}">
  
  <style>
    .progress-cell {
      min-width: 200px;
    }
    
    .progress {
      height: 25px;
      background-color: #e9ecef;
    }
    
    .progress-bar {
      background: linear-gradient(90deg, #28a745 0%, #20c997 100%);
      color: white;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .detail-row {
      background-color: #f8f9fa;
    }
    
    .activity-badge {
      display: inline-block;
      padding: 0.25rem 0.5rem;
      margin: 0.1rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      font-weight: 500;
    }
    
    .activity-badge.completed {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    
    .activity-badge.incomplete {
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
    }
    
    .activity-badge.not-started {
      background-color: #e2e3e5;
      color: #383d41;
      border: 1px solid #d6d8db;
    }
    
    .btn-detail {
      cursor: pointer;
      transition: transform 0.3s;
    }
    
    .btn-detail.rotated {
      transform: rotate(180deg);
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
        <a href="{{ route('dashboard-admin') }}" class="nav-link">Home</a>
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
          <li class="nav-item menu open">
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
                <a href="{{ route('nilai-siswa') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('progres-siswa') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Progres Pengerjaan Siswa</p>
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
            <h1 class="m-0">Progres Pengerjaan Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Progres Pengerjaan Siswa</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Tabel Progres -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Progres Siswa</h3>
              </div>
              
              <div class="card-body">
                <table id="progresTable" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th width="20%">Nama</th>
                      <th width="15%">NISN</th>
                      <th width="10%">Kelas</th>
                      <th width="25%">Progress</th>
                      {{-- <th width="10%">Selesai</th> --}}
                      {{-- <th width="10%">Persentase</th> --}}
                      <th width="5%">Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($siswa as $s)
                      @php
                        // Hitung progres
                        $totalAktivitas = count($daftarAktivitas);
                        $totalSelesai = 0;
                        
                        foreach($daftarAktivitas as $namaAktivitas => $judulAktivitas) {
                            $progresAktivitas = $s->progresSiswa->where('nama_aktivitas', $namaAktivitas)->first();
                            if($progresAktivitas && $progresAktivitas->status == 'completed') {
                                $totalSelesai++;
                            }
                        }
                        
                        $persentaseKeseluruhan = $totalAktivitas > 0 ? round(($totalSelesai / $totalAktivitas) * 100, 2) : 0;
                      @endphp
                      
                      <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td>{{ $s->name }}</td>
                        <td>{{ $s->nisn }}</td>
                        <td class="text-center">
                          <span class="badge badge-info">{{ $s->kelas }}</span>
                        </td>
                        <td class="progress-cell">
                          <div class="progress">
                            <div class="progress-bar" role="progressbar" 
                                 style="width: {{ $persentaseKeseluruhan }}%;" 
                                 aria-valuenow="{{ $persentaseKeseluruhan }}" 
                                 aria-valuemin="0" aria-valuemax="100">
                              {{ $totalSelesai }}/{{ $totalAktivitas }}
                            </div>
                          </div>
                        </td>
                        {{-- <td class="text-center">
                          <span class="badge {{ $totalSelesai == $totalAktivitas ? 'badge-success' : 'badge-warning' }}">
                            {{ $totalSelesai }}
                          </span>
                        </td> --}}
                        {{-- <td class="text-center">
                          <strong class="{{ $persentaseKeseluruhan == 100 ? 'text-success' : '' }}">
                            {{ $persentaseKeseluruhan }}%
                          </strong>
                        </td> --}}
                        <td class="text-center">
                          <button class="btn btn-sm btn-primary btn-detail" 
                                  onclick="toggleDetail(this, {{ $s->id }})">
                            <i class="fas fa-chevron-down"></i>
                          </button>
                        </td>
                      </tr>
                      
                      <!-- Detail Row (Hidden by default) -->
                      <tr class="detail-row" id="detail-{{ $s->id }}" style="display: none;">
                        <td colspan="8">
                          <div class="p-3">
                            <h5 class="mb-3">Detail Aktivitas - {{ $s->name }}</h5>
                            
                            <div class="activity-container">
                              <!-- Tabel Kategori Aktivitas -->
                              <table class="table table-sm table-bordered">
                                <thead class="thead-light">
                                  <tr>
                                    <th style="width: 30%">Subbab</th>
                                    <th style="width: 70%">Aktivitas</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <!-- Kategori 1: Mekanisme Sistem Pertahanan -->
                                  <tr>
                                    <td class="font-weight-bold align-middle">
                                      <i class="fas fa-shield-alt text-primary mr-2"></i>
                                      Mekanisme Sistem Pertahanan
                                    </td>
                                    <td>
                                      <div class="d-flex flex-wrap">
                                        @php
                                          $kategori1 = [
                                            'identifikasi-masalah-1',
                                            'pengumpulan-data-1',
                                            'pengolahan-data-1',
                                            'verifikasi-1',
                                            'kesimpulan-1',
                                            'kuis-1'
                                          ];
                                        @endphp
                                        
                                        @foreach($kategori1 as $namaAktivitas)
                                          @if(isset($daftarAktivitas[$namaAktivitas]))
                                            @php
                                              $judulAktivitas = $daftarAktivitas[$namaAktivitas];
                                              $progresAktivitas = $s->progresSiswa->where('nama_aktivitas', $namaAktivitas)->first();
                                              $status = 'not-started';
                                              $icon = 'fa-circle';
                                              $score = '-';
                                              
                                              if($progresAktivitas) {
                                                if($progresAktivitas->status == 'completed') {
                                                  $status = 'completed';
                                                  $icon = 'fa-check-circle';
                                                  $score = $progresAktivitas->skor . '/' . $progresAktivitas->total_soal;
                                                } else {
                                                  $status = 'incomplete';
                                                  $icon = 'fa-clock';
                                                  $score = $progresAktivitas->skor . '/' . $progresAktivitas->total_soal;
                                                }
                                              }
                                            @endphp
                                            
                                            <span class="activity-badge {{ $status }} m-1" 
                                                  title="Skor: {{ $score }}">
                                              <i class="fas {{ $icon }} mr-1"></i>
                                              {{ $judulAktivitas }}
                                            </span>
                                          @endif
                                        @endforeach
                                      </div>
                                    </td>
                                  </tr>
                                  
                                  <!-- Kategori 2: Komponen Sistem Pertahanan Tubuh -->
                                  <tr>
                                    <td class="font-weight-bold align-middle">
                                      <i class="fas fa-dna text-success mr-2"></i>
                                      Komponen Sistem Pertahanan Tubuh
                                    </td>
                                    <td>
                                      <div class="d-flex flex-wrap">
                                        @php
                                          $kategori2 = [
                                            'identifikasi-masalah-2',
                                            'pengumpulan-data-2',
                                            'pengolahan-data-2',
                                            'verifikasi-2',
                                            'kesimpulan-2',
                                            'kuis-2'
                                          ];
                                        @endphp
                                        
                                        @foreach($kategori2 as $namaAktivitas)
                                          @if(isset($daftarAktivitas[$namaAktivitas]))
                                            @php
                                              $judulAktivitas = $daftarAktivitas[$namaAktivitas];
                                              $progresAktivitas = $s->progresSiswa->where('nama_aktivitas', $namaAktivitas)->first();
                                              $status = 'not-started';
                                              $icon = 'fa-circle';
                                              $score = '-';
                                              
                                              if($progresAktivitas) {
                                                if($progresAktivitas->status == 'completed') {
                                                  $status = 'completed';
                                                  $icon = 'fa-check-circle';
                                                  $score = $progresAktivitas->skor . '/' . $progresAktivitas->total_soal;
                                                } else {
                                                  $status = 'incomplete';
                                                  $icon = 'fa-clock';
                                                  $score = $progresAktivitas->skor . '/' . $progresAktivitas->total_soal;
                                                }
                                              }
                                            @endphp
                                            
                                            <span class="activity-badge {{ $status }} m-1" 
                                                  title="Skor: {{ $score }}">
                                              <i class="fas {{ $icon }} mr-1"></i>
                                              {{ $judulAktivitas }}
                                            </span>
                                          @endif
                                        @endforeach
                                      </div>
                                    </td>
                                  </tr>
                                  
                                  <!-- Kategori 3: Jenis dan Gangguan Pertahanan Tubuh -->
                                  <tr>
                                    <td class="font-weight-bold align-middle">
                                      <i class="fas fa-virus text-danger mr-2"></i>
                                      Jenis dan Gangguan Pertahanan Tubuh
                                    </td>
                                    <td>
                                      <div class="d-flex flex-wrap">
                                        @php
                                          $kategori3 = [
                                            'identifikasi-masalah-3',
                                            'pengumpulan-data-3',
                                            'pengolahan-data-3',
                                            'verifikasi-3',
                                            'kesimpulan-3',
                                            'kuis-3'
                                          ];
                                        @endphp
                                        
                                        @foreach($kategori3 as $namaAktivitas)
                                          @if(isset($daftarAktivitas[$namaAktivitas]))
                                            @php
                                              $judulAktivitas = $daftarAktivitas[$namaAktivitas];
                                              $progresAktivitas = $s->progresSiswa->where('nama_aktivitas', $namaAktivitas)->first();
                                              $status = 'not-started';
                                              $icon = 'fa-circle';
                                              $score = '-';
                                              
                                              if($progresAktivitas) {
                                                if($progresAktivitas->status == 'completed') {
                                                  $status = 'completed';
                                                  $icon = 'fa-check-circle';
                                                  $score = $progresAktivitas->skor . '/' . $progresAktivitas->total_soal;
                                                } else {
                                                  $status = 'incomplete';
                                                  $icon = 'fa-clock';
                                                  $score = $progresAktivitas->skor . '/' . $progresAktivitas->total_soal;
                                                }
                                              }
                                            @endphp
                                            
                                            <span class="activity-badge {{ $status }} m-1" 
                                                  title="Skor: {{ $score }}">
                                              <i class="fas {{ $icon }} mr-1"></i>
                                              {{ $judulAktivitas }}
                                            </span>
                                          @endif
                                        @endforeach
                                      </div>
                                    </td>
                                  </tr>
                                  
                                  <!-- Evaluasi Akhir -->
                                  @if(isset($daftarAktivitas['evaluasi']))
                                    <tr>
                                      <td class="font-weight-bold align-middle">
                                        <i class="fas fa-graduation-cap text-warning mr-2"></i>
                                        Evaluasi
                                      </td>
                                      <td>
                                        @php
                                          $progresEvaluasi = $s->progresSiswa->where('nama_aktivitas', 'evaluasi')->first();
                                          $status = 'not-started';
                                          $icon = 'fa-circle';
                                          $score = '-';
                                          
                                          if($progresEvaluasi) {
                                            if($progresEvaluasi->status == 'completed') {
                                              $status = 'completed';
                                              $icon = 'fa-check-circle';
                                              $score = $progresEvaluasi->skor . '/' . $progresEvaluasi->total_soal;
                                            } else {
                                              $status = 'incomplete';
                                              $icon = 'fa-clock';
                                              $score = $progresEvaluasi->skor . '/' . $progresEvaluasi->total_soal;
                                            }
                                          }
                                        @endphp
                                        
                                        <span class="activity-badge {{ $status }} m-1" 
                                              title="Skor: {{ $score }}">
                                          <i class="fas {{ $icon }} mr-1"></i>
                                          {{ $daftarAktivitas['evaluasi'] }}
                                        </span>
                                      </td>
                                    </tr>
                                  @endif
                                </tbody>
                              </table>
                            </div>
                            
                            <div class="mt-3 pt-3 border-top">
                              <div class="row">
                                <div class="col-md-4">
                                  <small class="text-muted">Total Aktivitas: <strong>{{ $totalAktivitas }}</strong></small>
                                </div>
                                <div class="col-md-4">
                                  <small class="text-muted">Selesai: <strong class="text-success">{{ $totalSelesai }}</strong></small>
                                </div>
                                <div class="col-md-4">
                                  <small class="text-muted">Belum Selesai: <strong class="text-danger">{{ $totalAktivitas - $totalSelesai }}</strong></small>
                                </div>
                              </div>
                              
                              <!-- Progress per Subbab -->
                              <div class="row mt-3">
                                <div class="col-12">
                                  <h6 class="text-muted">Progress per Subbab:</h6>
                                  @php
                                    // Hitung progress per subbab
                                    $kategoriProgress = [
                                      'Mekanisme Sistem Pertahanan' => ['total' => 0, 'selesai' => 0],
                                      'Komponen Sistem Pertahanan Tubuh' => ['total' => 0, 'selesai' => 0],
                                      'Jenis dan Gangguan Pertahanan Tubuh' => ['total' => 0, 'selesai' => 0]
                                    ];
                                    
                                    foreach($kategori1 as $aktv) {
                                      if(isset($daftarAktivitas[$aktv])) {
                                        $kategoriProgress['Mekanisme Sistem Pertahanan']['total']++;
                                        $prog = $s->progresSiswa->where('nama_aktivitas', $aktv)->first();
                                        if($prog && $prog->status == 'completed') {
                                          $kategoriProgress['Mekanisme Sistem Pertahanan']['selesai']++;
                                        }
                                      }
                                    }
                                    
                                    foreach($kategori2 as $aktv) {
                                      if(isset($daftarAktivitas[$aktv])) {
                                        $kategoriProgress['Komponen Sistem Pertahanan Tubuh']['total']++;
                                        $prog = $s->progresSiswa->where('nama_aktivitas', $aktv)->first();
                                        if($prog && $prog->status == 'completed') {
                                          $kategoriProgress['Komponen Sistem Pertahanan Tubuh']['selesai']++;
                                        }
                                      }
                                    }
                                    
                                    foreach($kategori3 as $aktv) {
                                      if(isset($daftarAktivitas[$aktv])) {
                                        $kategoriProgress['Jenis dan Gangguan Pertahanan Tubuh']['total']++;
                                        $prog = $s->progresSiswa->where('nama_aktivitas', $aktv)->first();
                                        if($prog && $prog->status == 'completed') {
                                          $kategoriProgress['Jenis dan Gangguan Pertahanan Tubuh']['selesai']++;
                                        }
                                      }
                                    }
                                  @endphp
                                  
                                  @foreach($kategoriProgress as $namaKategori => $progress)
                                    @php
                                      $persentase = $progress['total'] > 0 ? round(($progress['selesai'] / $progress['total']) * 100, 1) : 0;
                                    @endphp
                                    <div class="mb-2">
                                      <small class="text-muted">{{ $namaKategori }}:</small>
                                      <div class="progress" style="height: 20px;">
                                        <div class="progress-bar {{ $persentase == 100 ? 'bg-success' : 'bg-info' }}" 
                                            role="progressbar" 
                                            style="width: {{ $persentase }}%;" 
                                            aria-valuenow="{{ $persentase }}" 
                                            aria-valuemin="0" 
                                            aria-valuemax="100">
                                          {{ $progress['selesai'] }}/{{ $progress['total'] }} ({{ $persentase }}%)
                                        </div>
                                      </div>
                                    </div>
                                  @endforeach
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
    <div class="float-right d-none d-sm-inline-block">
      
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('AdminPage/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminPage/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('AdminPage/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminPage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminPage/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminPage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminPage/dist/js/adminlte.min.js') }}"></script>

<script>
$(function () {
  // Initialize DataTable dengan konfigurasi yang sama seperti dashboard
  $('#progresTable').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "pageLength": 10,
    "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Semua"]],
    "order": [[1, "asc"]], // Sort by nama default
    "columnDefs": [
      {
        "orderable": false,
        "targets": 7 // Kolom detail tidak bisa di-sort
      }
    ],
    "language": {
      "lengthMenu": "Tampilkan _MENU_ data per halaman",
      "zeroRecords": "Data tidak ditemukan",
      "info": "Menampilkan halaman _PAGE_ dari _PAGES_ (Total _TOTAL_ data)",
      "infoEmpty": "Tidak ada data tersedia",
      "infoFiltered": "(difilter dari _MAX_ total data)",
      "search": "Cari:",
      "paginate": {
        "first": "Pertama",
        "last": "Terakhir",
        "next": "Selanjutnya",
        "previous": "Sebelumnya"
      }
    }
  });
});

// Toggle detail row
function toggleDetail(button, studentId) {
  const detailRow = document.getElementById(`detail-${studentId}`);
  const icon = button.querySelector('i');
  
  if (detailRow.style.display === 'none') {
    // Hide all other detail rows first
    document.querySelectorAll('.detail-row').forEach(row => {
      if (row.id !== `detail-${studentId}`) {
        row.style.display = 'none';
        // Reset other buttons
        document.querySelectorAll('.btn-detail').forEach(btn => {
          if (btn !== button) {
            btn.classList.remove('rotated');
          }
        });
      }
    });
    
    detailRow.style.display = 'table-row';
    button.classList.add('rotated');
  } else {
    detailRow.style.display = 'none';
    button.classList.remove('rotated');
  }
}
</script>

</body>
</html>