<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Beranda</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
      <style>
         
         .login-section {
            background-color: #FFF3B0;
            padding: 50px 0;
         }
         
         .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
            border-top: 5px solid #E09F3E;
         }
         
         .login-container h2 {
            color: #9E2A2B;
            text-align: center;
            margin-bottom: 25px;
         }
         
         .input-group {
            margin-bottom: 20px;
         }
         
         .input-group label {
            color: #335C67;
            font-weight: bold;
         }
         
         .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
         }
         
         .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #9E2A2B;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
         }
         
         .login-btn:hover {
            background-color: #540B0E;
         }
         
         .logout-btn {
            background-color: #E09F3E;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
         }
         
         .logout-btn:hover {
            background-color: #9E2A2B;
         }
         
         .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #335C67;
         }
         
         .signup-link a {
            color: #E09F3E;
            text-decoration: none;
            font-weight: bold;
         }
         
         .signup-link a:hover {
            text-decoration: underline;
            color: #9E2A2B;
         }
         
         /* Header styles */
         .header_section {
            background-color: #335C67;
         }
         
         .header_section h1 {
            color: #E09F3E;
         }
         
         .nav-item a {
            color: #FFF3B0 !important;
         }
         
         .nav-item.active a {
            color: #E09F3E !important;
         }
         
         /* Hero section */
         .hero_area {
            background-color: #FFF3B0;
         }
         
         .detail-box h1 {
            color: #540B0E;
         }
         
         .detail-box h3 {
            color: #335C67;
         }
         
         .detail-box a {
            background-color: #E09F3E !important;
            color: white !important;
            padding: 10px 25px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
            transition: background-color 0.3s;
         }
         
         .detail-box a:hover {
            background-color: #9E2A2B !important;
         }
         
         /* Footer */
         .cpy_ {
            background-color: #335C67;
            color: #FFF3B0;
            padding: 15px 0;
            text-align: center;
         }

         .user-welcome {
            background-color: #E09F3E;
            color: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
         }

         .user-info {
            font-size: 14px;
            margin-bottom: 10px;
         }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <h1>Selamat Datang</h1>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="/beranda">Home <span class="sr-only">(current)</span></a>
                        </li>
                        @auth
                           @if(Auth::user()->isAdmin())
                              <li class="nav-item">
                                 <a class="nav-link" href="{{ route('dashboard-admin') }}">Dashboard Admin</a>
                              </li>
                           @else
                              <li class="nav-item">
                                 <a class="nav-link" href="/home">Materi</a>
                              </li>
                           @endif
                           <li class="nav-item">
                              <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                 @csrf
                                 <button type="submit" class="nav-link logout-btn" style="border: none; background: none; color: #FFF3B0 !important;">
                                    Logout ({{ Auth::user()->name }})
                                 </button>
                              </form>
                           </li>
                        @else
                           
                           <li class="nav-item">
                              <a class="nav-link" href="{{ route('login.guru') }}">Login Guru</a>
                           </li>
                        @endauth
                     </ul>
                  </div>
               </nav>
            </div>
         </header>
         <!-- end header section -->
         <!-- slider section -->
         <section class="slider_section">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7 col-lg-6">
                              <div class="detail-box">
                                 @if (session()->has("success"))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                       {{ session()->get("success") }}
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                 @endif
                                 @if (session()->has("error"))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       {{ session()->get("error") }}
                                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                       </button>
                                    </div>
                                 @endif

                                 @auth
                                    <div class="user-welcome">
                                       <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
                                       <div class="user-info">
                                          {{-- <strong>NISN:</strong> {{ Auth::user()->nisn }}  --}}
                                          {{-- <strong>Kelas:</strong> {{ Auth::user()->kelas }} --}}
                                          
                                       </div>
                                    </div>
                                 @endauth

                                 <h1>
                                    <span style="color: #9E2A2B">SELAMAT DATANG</span>
                                    <br>
                                 </h1>
                                 <h3>
                                    Media Pembelajaran Interaktif Sistem Pertahanan Tubuh Terhadap Penyakit
                                 </h3>
                                 <p>
                                    Untuk SMA Kelas XI
                                 </p>
                                 <div>
                                    @auth
                                       @if(Auth::user()->isSiswa())
                                          <a href="/home">Mulai Belajar</a>
                                       @else
                                          <a href="{{ route('dashboard-admin') }}">Dashboard Admin</a>
                                       @endif
                                    @else
                                       <a href="#login-section">Masuk</a>
                                    @endauth
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- end slider section -->
      </div>
      
      @guest
      <!-- login section -->
      <section class="login-section layout_padding" id="login-section">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Login
               </h2>
               <p style="color: #335C67; margin-bottom: 30px;">
                  
               </p>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-6">                  
                  <div class="login-container">
                     <form action="{{ route('login.post') }}" method="post">
                        @csrf
                        
                        @if ($errors->any())
                           <div class="alert alert-danger">
                              <ul class="mb-0">
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                              </ul>
                           </div>
                        @endif

                        <div class="input-group">
                           <label for="nisn">NISN</label>
                           <input type="text" id="nisn" name="nisn" value="{{ old('nisn') }}" required>
                        </div>
                        <div class="input-group">
                           <label for="password">Password</label>
                           <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="login-btn">Login</button>
                        <div class="signup-link">
                           Belum punya akun? <a href="/buat-akun">Buat akun di sini</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      @endguest
      <!-- end login section -->
      
      <!-- footer start -->
      <div class="cpy_">
         <p class="mx-auto">
            Tio Ezekiel@2025 Fakultas Keguruan dan Ilmu Pendidikan
         </p>
      </div>
      <!-- footer end -->
      
      <!-- jQery -->
      <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('js/custom.js') }}"></script>

      <script>
         // Auto hide alerts after 5 seconds
         setTimeout(function() {
            $('.alert').fadeOut('slow');
         }, 5000);
      </script>
      
   </body>
</html>