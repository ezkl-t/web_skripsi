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
      <title>Registrasi</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
      <style>
         /* Custom styles for login section */
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
            color: #FFF3B0;
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
      </style>
   </head>
   <body>

    <!-- login section -->
      <section class="login-section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Registrasi
               </h2>
            </div>
            <div class="row justify-content-center">
               <div class="col-md-6">
                  @if (session()->has("success"))
                     <div class="alert alert-success">
                        {{ session()->get("success")}}
                     </div>
                  @endif
                  @if (session()->has("error"))
                     <div class="alert alert-error">
                        {{ session()->get("error")}}
                     </div>
                  @endif
                  <div class="login-container">
                      <form method="POST" action="{{ route('register.post') }}"> 
                        @csrf
                        <div class="input-group">
                           <label for="nama-lengkap">Nama Lengkap</label>
                           <input type="text" id="namalengkap" name="namalengkap" required>
                        </div>
                        <div class="input-group">
                           <label for="username">NISN</label>
                           <input type="text" id="nisn" name="nisn" required>
                        </div>
                        <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas" required>
                            <option value="">Pilih Kelas</option>
                            <option value="XI-1">XI-1</option>
                            <option value="XI-2">XI-2</option>
                            <option value="XI-3">XI-3</option>
                        </select>
                        </div>
                        <div class="input-group">
                           <label for="password">Password</label>
                           <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="login-btn">Daftar</button>
                        <div class="signup-link">
                           Sudah punya akun? Masuk<a href="/beranda"> di sini</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
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
      
   </body>
</html>