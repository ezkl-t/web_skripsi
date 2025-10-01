<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengaturan KKM</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminPage/dist/css/adminlte.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Custom CSS -->
  <style>
    .kkm-input {
      width: 80px;
      text-align: center;
      font-weight: bold;
    }
    .btn-save {
      padding: 4px 12px;
      font-size: 0.875rem;
    }
    .table td {
      vertical-align: middle;
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
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
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
                <a href="{{ route('nilai-siswa') }}" class="nav-link">
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
                <a href="{{ route('pengaturan-kkm') }}" class="nav-link active">
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
            <h1 class="m-0">Pengaturan Kriteria Ketuntasan Minimal (KKM)</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- KKM Settings Table -->
        <div class="row">
          <div class="col-md-8 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-cogs mr-2"></i>
                  Pengaturan KKM
                </h3>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 60%">Nama Kuis</th>
                      <th style="width: 40%">Nilai KKM</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($PengaturanKKM as $setting)
                    <tr>
                      <td>
                        <strong>{{ $setting->judul_kuis }}</strong>
                        @if($setting->deskripsi)
                          <br><small class="text-muted">{{ $setting->deskripsi }}</small>
                        @endif
                      </td>
                      <td>
                        <div class="input-group input-group-sm" style="width: 120px;">
                          <input type="number" 
                                 class="form-control kkm-input" 
                                 id="kkm_{{ $setting->nama_kuis }}"
                                 value="{{ intval($setting->nilai_kkm) }}"
                                 min="0" 
                                 max="100"
                                 data-nama-kuis="{{ $setting->nama_kuis }}">
                          <div class="input-group-append">
                            <button type="button" 
                                    class="btn btn-primary btn-save btn-update-kkm" 
                                    data-nama-kuis="{{ $setting->nama_kuis }}"
                                    title="Simpan">
                              <i class="fas fa-save"></i>
                            </button>
                          </div>
                        </div>
                        <div class="mt-1">
                          {{-- <span class="badge badge-info" id="status_{{ $setting->nama_kuis }}">
                            KKM: {{ intval($setting->nilai_kkm) }}
                          </span> --}}
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              {{-- <div class="card-footer">
                <small class="text-muted">
                  <i class="fas fa-info-circle mr-1"></i>
                  Perubahan KKM akan langsung mempengaruhi status ketuntasan siswa.
                </small>
              </div> --}}
            </div>
          </div>
        </div>

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
<!-- SweetAlert2 -->
<script src="{{ asset('AdminPage/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
$(document).ready(function() {
    // Setup CSRF token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Update KKM
    $('.btn-update-kkm').click(function() {
        const namaKuis = $(this).data('nama-kuis');
        const nilaiKkm = $(`#kkm_${namaKuis}`).val();
        
        if (!nilaiKkm || nilaiKkm < 0 || nilaiKkm > 100) {
            Swal.fire({
                icon: 'error',
                title: 'Input Tidak Valid',
                text: 'Nilai KKM harus antara 0-100',
                timer: 2000,
                showConfirmButton: false
            });
            return;
        }

        updateKkm(namaKuis, nilaiKkm);
    });

    // Auto save on Enter key
    $('.kkm-input').keypress(function(e) {
        if (e.which === 13) { // Enter key
            const namaKuis = $(this).data('nama-kuis');
            $(`.btn-update-kkm[data-nama-kuis="${namaKuis}"]`).click();
        }
    });

    // Auto save on blur (when input loses focus)
    $('.kkm-input').blur(function() {
        const namaKuis = $(this).data('nama-kuis');
        const nilaiKkm = $(this).val();
        const currentKkm = $(`#status_${namaKuis}`).text().replace('KKM: ', '');
        
        // Only update if value changed
        if (nilaiKkm != currentKkm && nilaiKkm >= 0 && nilaiKkm <= 100) {
            updateKkm(namaKuis, nilaiKkm);
        }
    });
});

function updateKkm(namaKuis, nilaiKkm) {
    // Disable button temporarily
    const btn = $(`.btn-update-kkm[data-nama-kuis="${namaKuis}"]`);
    btn.prop('disabled', true);
    btn.html('<i class="fas fa-spinner fa-spin"></i>');
    
    $.ajax({
        url: '{{ route("update-kkm") }}',
        type: 'POST',
        data: {
            nama_kuis: namaKuis,
            nilai_kkm: nilaiKkm
        },
        success: function(response) {
            if (response.success) {
                // Update status badge
                $(`#status_${namaKuis}`).text(`KKM: ${parseInt(nilaiKkm)}`);
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'KKM berhasil diperbarui',
                    timer: 1500,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: response.message,
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function(xhr) {
            let message = 'Terjadi kesalahan';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }
            
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: message,
                timer: 2000,
                showConfirmButton: false
            });
        },
        complete: function() {
            // Re-enable button
            btn.prop('disabled', false);
            btn.html('<i class="fas fa-save"></i>');
        }
    });
}
</script>

</body>
</html>