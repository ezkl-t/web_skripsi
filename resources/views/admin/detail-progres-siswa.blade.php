<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Detail Progres - {{ $siswa->name }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminPage/dist/css/adminlte.min.css') }}">
  
  <style>
    .timeline-item {
      border-left: 3px solid #007bff;
      padding-left: 20px;
      margin-bottom: 20px;
      position: relative;
    }
    .timeline-item.completed {
      border-left-color: #28a745;
    }
    .timeline-item.incomplete {
      border-left-color: #dc3545;
    }
    .timeline-item::before {
      content: '';
      position: absolute;
      left: -8px;
      top: 5px;
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: #007bff;
    }
    .timeline-item.completed::before {
      background: #28a745;
    }
    .timeline-item.incomplete::before {
      background: #dc3545;
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
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('progres-siswa') }}" class="nav-link">
          <i class="fas fa-arrow-left"></i> Kembali ke Progres Semua Siswa
        </a>
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
      <img src="{{ asset('AdminPage/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminPage/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
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
                  <p>Daftar Nama Siswa</p>
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
                  <p>Progres Pengerjaan</p>
                </a>
              </li>
            </ul>
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
            <h1 class="m-0">Detail Progres - {{ $siswa->name }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('progres-siswa') }}">Progres Siswa</a></li>
              <li class="breadcrumb-item active">{{ $siswa->name }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Info Siswa -->
        <div class="row mb-4">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informasi Siswa</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <strong>Nama Lengkap:</strong><br>
                    {{ $siswa->name }}
                  </div>
                  <div class="col-md-3">
                    <strong>NISN:</strong><br>
                    {{ $siswa->nisn }}
                  </div>
                  <div class="col-md-3">
                    <strong>Kelas:</strong><br>
                    {{ $siswa->kelas }}
                  </div>
                  <div class="col-md-3">
                    <strong>Total Aktivitas Selesai:</strong><br>
                    {{ $siswa->getTotalAktivitasSelesai() }}/{{ count($daftarAktivitas) }}
                    ({{ $siswa->getPersentaseProgresKeseluruhan(count($daftarAktivitas)) }}%)
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Progres per Aktivitas -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Timeline Progres Aktivitas</h3>
              </div>
              <div class="card-body">
                <div class="timeline">
                  @forelse($daftarAktivitas as $namaAktivitas => $judulAktivitas)
                    @php
                      $progresAktivitas = $progres->where('nama_aktivitas', $namaAktivitas)->first();
                    @endphp
                    <div class="timeline-item {{ $progresAktivitas && $progresAktivitas->status == 'completed' ? 'completed' : ($progresAktivitas ? 'incomplete' : '') }}">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">
                            {{ $judulAktivitas }}
                            @if($progresAktivitas)
                              @if($progresAktivitas->status == 'completed')
                                <span class="badge badge-success ml-2">
                                  <i class="fas fa-check"></i> Selesai
                                </span>
                              @else
                                <span class="badge badge-warning ml-2">
                                  <i class="fas fa-clock"></i> Dalam Progres
                                </span>
                              @endif
                            @else
                              <span class="badge badge-secondary ml-2">
                                <i class="fas fa-minus"></i> Belum Dimulai
                              </span>
                            @endif
                          </h4>
                        </div>
                        <div class="card-body">
                          @if($progresAktivitas)
                            <div class="row">
                              <div class="col-md-3">
                                <strong>Skor:</strong><br>
                                {{ $progresAktivitas->skor }}/{{ $progresAktivitas->total_soal }}
                                ({{ $progresAktivitas->persentase }}%)
                              </div>
                              <div class="col-md-3">
                                <strong>Status:</strong><br>
                                {{ $progresAktivitas->status_format }}
                              </div>
                              <div class="col-md-3">
                                <strong>Tanggal Mulai:</strong><br>
                                {{ $progresAktivitas->tanggal_mulai ? $progresAktivitas->tanggal_mulai->format('d/m/Y H:i') : '-' }}
                              </div>
                              <div class="col-md-3">
                                <strong>Tanggal Selesai:</strong><br>
                                {{ $progresAktivitas->tanggal_selesai ? $progresAktivitas->tanggal_selesai->format('d/m/Y H:i') : '-' }}
                              </div>
                            </div>
                            @if($progresAktivitas->waktu_pengerjaan)
                              <div class="row mt-2">
                                <div class="col-md-12">
                                  <strong>Waktu Pengerjaan:</strong> {{ $progresAktivitas->waktu_pengerjaan }}
                                </div>
                              </div>
                            @endif
                            @if($progresAktivitas->detail_jawaban)
                              <div class="row mt-3">
                                <div class="col-md-12">
                                  <strong>Detail Jawaban:</strong>
                                  <div class="mt-2">
                                    <pre class="bg-light p-2 rounded">{{ json_encode($progresAktivitas->detail_jawaban, JSON_PRETTY_PRINT) }}</pre>
                                  </div>
                                </div>
                              </div>
                            @endif
                            <div class="row mt-3">
                              <div class="col-md-12">
                                <button class="btn btn-danger btn-sm" onclick="resetProgres('{{ $siswa->id }}', '{{ $namaAktivitas }}', '{{ $judulAktivitas }}')">
                                  <i class="fas fa-redo"></i> Reset Progres
                                </button>
                              </div>
                            </div>
                          @else
                            <p class="text-muted">Siswa belum memulai aktivitas ini.</p>
                          @endif
                        </div>
                      </div>
                    </div>
                  @empty
                    <p class="text-center text-muted">Tidak ada aktivitas yang tersedia.</p>
                  @endforelse
                </div>
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
    <strong>Tio Ezekiel@2025 Fakultas Keguruan dan Ilmu Pendidikan</strong>
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
<!-- AdminLTE App -->
<script src="{{ asset('AdminPage/dist/js/adminlte.min.js') }}"></script>

<script>
// Setup CSRF token for AJAX requests
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function resetProgres(userId, namaAktivitas, judulAktivitas) {
  if (confirm(`Apakah Anda yakin ingin mereset progres "${judulAktivitas}" untuk siswa ini?`)) {
    $.ajax({
      url: '{{ route("progres.reset") }}',
      method: 'POST',
      data: {
        user_id: userId,
        nama_aktivitas: namaAktivitas
      },
      success: function(response) {
        if (response.success) {
          alert('Progres berhasil direset!');
          location.reload();
        } else {
          alert('Gagal mereset progres: ' + response.message);
        }
      },
      error: function(xhr) {
        alert('Terjadi kesalahan saat mereset progres.');
        console.error(xhr);
      }
    });
  }
}
</script>

</body>
</html>