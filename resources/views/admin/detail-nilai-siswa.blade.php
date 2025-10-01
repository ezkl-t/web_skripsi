<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Nilai Siswa - {{ $user->name }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminPage/dist/css/adminlte.min.css') }}">
  <style>
    .nilai-card {
      border-left: 4px solid #007bff;
    }
    .grade-A { border-left-color: #28a745 !important; }
    .grade-B { border-left-color: #17a2b8 !important; }
    .grade-C { border-left-color: #ffc107 !important; }
    .grade-D { border-left-color: #fd7e14 !important; }
    .grade-E { border-left-color: #dc3545 !important; }
    .status-lulus { color: #28a745; font-weight: bold; }
    .status-tidak-lulus { color: #dc3545; font-weight: bold; }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('nilai-siswa') }}" class="nav-link">
          <i class="fas fa-arrow-left"></i> Kembali ke Daftar Nilai
        </a>
      </li>
    </ul>
  </nav>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('beranda') }}" class="brand-link">
      <span class="brand-text font-weight-light">Halaman Guru</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
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
    </div>
  </aside>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Nilai Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('nilai-siswa') }}">Nilai Siswa</a></li>
              <li class="breadcrumb-item active">Detail</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Info Siswa -->
        <div class="row">
          <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                </div>
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                <p class="text-muted text-center">{{ $user->kelas }}</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NISN</b> <a class="float-right">{{ $user->nisn }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Kelas</b> <a class="float-right">{{ $user->kelas }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Rata-rata Nilai</b> 
                    <a class="float-right">
                      {{ $user->hasilKuis->count() > 0 ? number_format($user->hasilKuis->avg('nilai'), 1) : '-' }}
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Detail Nilai -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Riwayat Kuis</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Detail Jawaban</a></li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  
                  <!-- Tab Riwayat Kuis -->
                  <div class="active tab-pane" id="activity">
                    @forelse($user->hasilKuis->groupBy('nama_kuis') as $namaKuis => $hasilKuis)
                    <div class="card nilai-card grade-{{ $hasilKuis->first()->grade }}">
                      <div class="card-header">
                        <h3 class="card-title">{{ $namaKuis }}</h3>
                        <div class="card-tools">
                          <span class="badge badge-pill 
                            @if($hasilKuis->first()->grade == 'A') badge-success
                            @elseif($hasilKuis->first()->grade == 'B') badge-info
                            @elseif($hasilKuis->first()->grade == 'C') badge-warning
                            @elseif($hasilKuis->first()->grade == 'D') badge-secondary
                            @else badge-danger
                            @endif">
                            Grade {{ $hasilKuis->first()->grade }}
                          </span>
                        </div>
                      </div>
                      <div class="card-body">
                        @foreach($hasilKuis as $hasil)
                        <div class="row mb-3">
                          <div class="col-md-6">
                            <h5>Nilai: <strong>{{ number_format($hasil->nilai, 1) }}</strong></h5>
                            <p class="text-muted mb-1">
                              Dikerjakan: {{ $hasil->tanggal_kuis->format('d M Y, H:i') }}
                            </p>
                            <p class="text-muted mb-1">
                              Waktu Pengerjaan: {{ $hasil->formatted_waktu }}
                            </p>
                            <p class="
                              @if($hasil->status == 'Lulus') status-lulus 
                              @else status-tidak-lulus 
                              @endif">
                              {{ $hasil->status }}
                            </p>
                          </div>
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-sm-4">
                                <div class="description-block">
                                  <h5 class="description-header text-success">{{ $hasil->jawaban_benar }}</h5>
                                  <span class="description-text">Benar</span>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="description-block">
                                  <h5 class="description-header text-danger">{{ $hasil->jawaban_salah }}</h5>
                                  <span class="description-text">Salah</span>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="description-block">
                                  <h5 class="description-header text-info">{{ $hasil->total_soal }}</h5>
                                  <span class="description-text">Total Soal</span>
                                </div>
                              </div>
                            </div>
                            <div class="progress mt-2">
                              <div class="progress-bar bg-success" role="progressbar" 
                                   style="width: {{ $hasil->persentase_benar }}%">
                                {{ number_format($hasil->persentase_benar, 1) }}%
                              </div>
                            </div>
                          </div>
                        </div>
                        @if(!$loop->last)<hr>@endif
                        @endforeach
                      </div>
                    </div>
                    @empty
                    <div class="alert alert-info">
                      <h4><i class="icon fa fa-info"></i> Informasi</h4>
                      Siswa belum mengerjakan kuis apapun.
                    </div>
                    @endforelse
                  </div>

                  <!-- Tab Detail Jawaban -->
                  <div class="tab-pane" id="timeline">
                    @if($user->hasilKuis->count() > 0)
                    <div class="row">
                      <div class="col-md-12">
                        <label for="kuisSelect">Pilih Kuis untuk melihat detail jawaban:</label>
                        <select class="form-control mb-3" id="kuisSelect" onchange="showDetailJawaban()">
                          <option value="">-- Pilih Kuis --</option>
                          @foreach($user->hasilKuis->groupBy('nama_kuis') as $namaKuis => $results)
                          <option value="{{ $namaKuis }}">{{ $namaKuis }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    @foreach($user->hasilKuis->groupBy('nama_kuis') as $namaKuis => $results)
                    <div class="detail-jawaban-container" id="detail-{{ Str::slug($namaKuis) }}" style="display: none;">
                      @foreach($results as $hasil)
                      <div class="card">
                        <div class="card-header">
                          <h4>{{ $namaKuis }} - {{ $hasil->tanggal_kuis->format('d M Y, H:i') }}</h4>
                          <p class="mb-0">
                            <strong>Nilai:</strong> {{ number_format($hasil->nilai, 1) }} | 
                            <strong>Benar:</strong> {{ $hasil->jawaban_benar }} | 
                            <strong>Salah:</strong> {{ $hasil->jawaban_salah }} | 
                            <strong>Total:</strong> {{ $hasil->total_soal }}
                          </p>
                        </div>
                        <div class="card-body">
                          @if($hasil->detail_jawaban && is_array($hasil->detail_jawaban))
                          <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th style="width: 80px;">No. Soal</th>
                                  <th style="width: 100px;">Status</th>
                                  <th>Jawaban Siswa</th>
                                  <th>Jawaban Benar</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($hasil->detail_jawaban as $index => $jawaban)
                                <tr class="{{ $jawaban['is_benar'] ? 'table-success' : 'table-danger' }}">
                                  <td class="text-center">
                                    <span class="badge badge-secondary">{{ $index + 1 }}</span>
                                  </td>
                                  <td class="text-center">
                                    @if($jawaban['is_benar'])
                                      <i class="fas fa-check-circle text-success" style="font-size: 1.2em;" title="Benar"></i>
                                      <span class="text-success ml-1">Benar</span>
                                    @else
                                      <i class="fas fa-times-circle text-danger" style="font-size: 1.2em;" title="Salah"></i>
                                      <span class="text-danger ml-1">Salah</span>
                                    @endif
                                  </td>
                                  <td>
                                    <span class="badge {{ $jawaban['is_benar'] ? 'badge-success' : 'badge-danger' }}">
                                      {{ $jawaban['jawaban_user'] ?? ($jawaban['jawaban_siswa'] ?? 'Tidak dijawab') }}
                                    </span>
                                  </td>
                                  <td>
                                    <span class="badge badge-primary">
                                      {{ $jawaban['jawaban_benar'] ?? '-' }}
                                    </span>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                          </div>

                          <!-- Ringkasan -->
                          <div class="row mt-3">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-sm-3">
                                  <div class="description-block border-right">
                                    <span class="description-percentage text-success">
                                      <i class="fas fa-check"></i> {{ $hasil->jawaban_benar }}
                                    </span>
                                    <h5 class="description-header">Jawaban Benar</h5>
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="description-block border-right">
                                    <span class="description-percentage text-danger">
                                      <i class="fas fa-times"></i> {{ $hasil->jawaban_salah }}
                                    </span>
                                    <h5 class="description-header">Jawaban Salah</h5>
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="description-block border-right">
                                    <span class="description-percentage text-info">
                                      <i class="fas fa-percentage"></i> {{ number_format($hasil->persentase_benar, 1) }}%
                                    </span>
                                    <h5 class="description-header">Persentase</h5>
                                  </div>
                                </div>
                                <div class="col-sm-3">
                                  <div class="description-block">
                                    <span class="description-percentage {{ $hasil->status == 'Lulus' ? 'text-success' : 'text-danger' }}">
                                      <i class="fas {{ $hasil->status == 'Lulus' ? 'fa-trophy' : 'fa-exclamation-triangle' }}"></i> {{ $hasil->grade }}
                                    </span>
                                    <h5 class="description-header">{{ $hasil->status }}</h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          @else
                          <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                            Detail jawaban tidak tersedia untuk kuis ini.
                          </div>
                          @endif
                        </div>
                      </div>
                      @if(!$loop->last)<hr>@endif
                      @endforeach
                    </div>
                    @endforeach
                    @else
                    <div class="alert alert-info">
                      <h4><i class="icon fa fa-info"></i> Informasi</h4>
                      Siswa belum mengerjakan kuis apapun.
                    </div>
                    @endif
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>

</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('AdminPage/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('AdminPage/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('AdminPage/dist/js/adminlte.min.js') }}"></script>

<script>
// Fungsi untuk menampilkan detail jawaban berdasarkan kuis yang dipilih
function showDetailJawaban() {
    const kuisSelect = document.getElementById('kuisSelect');
    const selectedKuis = kuisSelect.value;
    
    // Sembunyikan semua container detail jawaban
    const containers = document.querySelectorAll('.detail-jawaban-container');
    containers.forEach(container => {
        container.style.display = 'none';
    });
    
    // Tampilkan container yang sesuai dengan kuis yang dipilih
    if (selectedKuis) {
        const slug = selectedKuis.toLowerCase()
            .replace(/[^a-z0-9 -]/g, '') // Remove invalid chars
            .replace(/\s+/g, '-')        // Replace spaces with -
            .replace(/-+/g, '-')         // Replace multiple - with single -
            .trim();                     // Trim - from start and end of text
        
        const targetContainer = document.getElementById('detail-' + slug);
        if (targetContainer) {
            targetContainer.style.display = 'block';
        }
    }
}

// Auto scroll ke detail jawaban ketika dipilih
document.getElementById('kuisSelect').addEventListener('change', function() {
    if (this.value) {
        setTimeout(() => {
            const detailSection = document.querySelector('.detail-jawaban-container[style*="block"]');
            if (detailSection) {
                detailSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }, 100);
    }
});
</script>

</body>
</html>