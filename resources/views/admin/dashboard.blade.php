<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminPage/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminPage/dist/css/adminlte.min.css') }}">
  
  <!-- Custom CSS untuk password reveal -->
  <style>
    .password-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    
    .password-text {
      font-family: monospace;
      letter-spacing: 2px;
    }
    
    .password-reveal-btn {
      cursor: pointer;
      padding: 5px 10px;
      border: 1px solid #ddd;
      border-radius: 3px;
      background-color: #f8f9fa;
      transition: all 0.2s;
    }
    
    .password-reveal-btn:hover {
      background-color: #e9ecef;
    }
    
    .password-reveal-btn:active {
      background-color: #dee2e6;
    }
    
    .password-reveal-btn i {
      font-size: 14px;
      color: #495057;
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
                <a href="{{ route('dashboard-admin') }}" class="nav-link active">
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
            <h1 class="m-0">Daftar Nama Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard-admin') }}">Home</a></li>
              <li class="breadcrumb-item active">Daftar Siswa</li>
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
                <h3 class="card-title">Tabel Nama Siswa</h3>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahSiswaModal">
                  <i class="fas fa-plus"></i> Tambah Siswa
                </button>
              </div>
              
              <div class="card-body">
                {{-- Alert Messages --}}
                @if (session()->has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
                
                @if (session()->has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session()->get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap Siswa</th>
                      <th>NISN</th>
                      <th>Kelas</th>
                      <th>Password</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($users as $index => $user)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->nisn }}</td>
                      <td>{{ $user->kelas }}</td>
                      <td>
                        <div class="password-container">
                          <span class="password-text" id="password-{{ $user->id }}" data-password="{{ $user->password_plain ?? 'N/A' }}">
                            ••••••••
                          </span>
                          <button type="button" 
                                  class="password-reveal-btn" 
                                  onmousedown="showPassword('{{ $user->id }}')" 
                                  onmouseup="hidePassword('{{ $user->id }}')" 
                                  onmouseleave="hidePassword('{{ $user->id }}')"
                                  ontouchstart="showPassword('{{ $user->id }}')"
                                  ontouchend="hidePassword('{{ $user->id }}')"
                                  title="Tahan untuk melihat password">
                            <i class="fas fa-eye"></i>
                          </button>
                        </div>
                      </td>
                      <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSiswaModal{{ $user->id }}">
                          <i class="fas fa-edit"></i> Edit
                        </button>
                        <form action="{{ route('deleteSiswa', $user->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin ingin menghapus data siswa {{ $user->name }}?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                          </button>
                        </form>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="6" class="text-center">Tidak ada data siswa</td>
                    </tr>
                    @endforelse
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

  <!-- Modal Tambah Siswa -->
  <div class="modal fade" id="tambahSiswaModal" tabindex="-1" role="dialog" aria-labelledby="tambahSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahSiswaModalLabel">Tambah Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="tambahSiswaForm" method="POST" action="{{ route('tambahSiswa') }}">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nama_lengkap" name="namalengkap" required value="{{ old('namalengkap') }}">
            </div>
            <div class="form-group">
              <label for="nisn">NISN <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="nisn" name="nisn" required value="{{ old('nisn') }}">
            </div>
            <div class="form-group">
              <label for="kelas">Kelas <span class="text-danger">*</span></label>
              <select class="form-control" id="kelas" name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="XI-1" {{ old('kelas') == 'XI-1' ? 'selected' : '' }}>XI-1</option>
                <option value="XI-2" {{ old('kelas') == 'XI-2' ? 'selected' : '' }}>XI-2</option>
                <option value="XI-3" {{ old('kelas') == 'XI-3' ? 'selected' : '' }}>XI-3</option>
              </select>
            </div>
            <div class="form-group">
              <label for="password">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control" id="password" name="password" required>
              <small class="form-text text-muted">Password minimal 6 karakter</small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-warning" onclick="resetForm()">Reset</button>
            <button type="submit" class="btn btn-primary">Tambah Siswa</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @foreach($users as $user)
  <!-- Modal Edit Siswa -->
  <div class="modal fade" id="editSiswaModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editSiswaModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editSiswaModalLabel{{ $user->id }}">Edit Data Siswa: {{ $user->name }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('editSiswa', $user->id) }}">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="form-group">
              <label for="edit_nama{{ $user->id }}">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="edit_nama{{ $user->id }}" name="namalengkap" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
              <label for="edit_nisn{{ $user->id }}">NISN <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="edit_nisn{{ $user->id }}" name="nisn" value="{{ $user->nisn }}" required>
            </div>
            <div class="form-group">
              <label for="edit_kelas{{ $user->id }}">Kelas <span class="text-danger">*</span></label>
              <select class="form-control" id="edit_kelas{{ $user->id }}" name="kelas" required>
                <option value="XI-1" {{ $user->kelas == 'XI-1' ? 'selected' : '' }}>XI-1</option>
                <option value="XI-2" {{ $user->kelas == 'XI-2' ? 'selected' : '' }}>XI-2</option>
                <option value="XI-3" {{ $user->kelas == 'XI-3' ? 'selected' : '' }}>XI-3</option>
              </select>
            </div>
            <div class="form-group">
              <label for="edit_password{{ $user->id }}">Password Baru</label>
              <input type="password" class="form-control" id="edit_password{{ $user->id }}" name="password" placeholder="Kosongkan jika tidak ingin mengubah">
              <small class="text-muted">
                Password saat ini: 
                <span class="password-text" id="modal-password-{{ $user->id }}" data-password="{{ $user->password_plain ?? 'N/A' }}">
                  ••••••••
                </span>
                <button type="button" 
                        class="btn btn-sm btn-outline-secondary ml-2" 
                        onmousedown="showPassword('modal-password-{{ $user->id }}')" 
                        onmouseup="hidePassword('modal-password-{{ $user->id }}')" 
                        onmouseleave="hidePassword('modal-password-{{ $user->id }}')"
                        ontouchstart="showPassword('modal-password-{{ $user->id }}')"
                        ontouchend="hidePassword('modal-password-{{ $user->id }}')">
                  <i class="fas fa-eye"></i>
                </button>
              </small>
              <br><small class="form-text text-muted">Password minimal 6 karakter (jika diisi)</small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

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
<!-- DataTables  & Plugins -->
<script src="{{ asset('AdminPage/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminPage/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminPage/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminPage/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminPage/dist/js/adminlte.min.js') }}"></script>

<script>
$(function () {
  // Initialize DataTable
  $('#example2').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
    }
  });

  // Auto hide alerts after 5 seconds
  setTimeout(function() {
    $('.alert').fadeOut('slow');
  }, 5000);
});

// Reset form function
function resetForm() {
  document.getElementById("tambahSiswaForm").reset();
}

// Password reveal functions
function showPassword(elementId) {
  const passwordElement = document.getElementById(elementId.startsWith('modal-') ? elementId : 'password-' + elementId);
  const actualPassword = passwordElement.getAttribute('data-password');
  passwordElement.textContent = actualPassword;
  
  // Change icon to eye-slash
  const button = passwordElement.nextElementSibling;
  if (button && button.querySelector('i')) {
    button.querySelector('i').classList.remove('fa-eye');
    button.querySelector('i').classList.add('fa-eye-slash');
  }
}

function hidePassword(elementId) {
  const passwordElement = document.getElementById(elementId.startsWith('modal-') ? elementId : 'password-' + elementId);
  passwordElement.textContent = '••••••••';
  
  // Change icon back to eye
  const button = passwordElement.nextElementSibling;
  if (button && button.querySelector('i')) {
    button.querySelector('i').classList.remove('fa-eye-slash');
    button.querySelector('i').classList.add('fa-eye');
  }
}

// Setup CSRF token for AJAX requests
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

// Prevent context menu on password reveal buttons (optional)
document.addEventListener('DOMContentLoaded', function() {
  const passwordButtons = document.querySelectorAll('.password-reveal-btn');
  passwordButtons.forEach(button => {
    button.addEventListener('contextmenu', function(e) {
      e.preventDefault();
      return false;
    });
  });
});
</script>

</body>
</html>