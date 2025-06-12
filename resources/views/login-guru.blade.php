<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title>Login Guru</title>
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
            min-height: 100vh;
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
            display: block;
            margin-bottom: 5px;
         }
         
         .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
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
            font-weight: bold;
         }
         
         .login-btn:hover {
            background-color: #540B0E;
         }
         
         .back-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
         }
         
         .back-link a {
            color: #E09F3E;
            text-decoration: none;
            font-weight: bold;
         }
         
         .alert {
            padding: 12px 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 14px;
         }
         
         .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
         }
         
         .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
         }
      </style>
   </head>
   <body>

      <!-- Header -->
      <div style="background-color: #335C67; color: #FFF3B0; text-align: center; padding: 20px 0;">
         <h1 style="margin: 0; font-size: 28px;">Sistem Pertahanan Tubuh</h1>
         <p style="margin: 5px 0 0 0; font-size: 14px;">Portal Login Guru</p>
      </div>

      <!-- login section -->
      <section class="login-section">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>Login Guru</h2>
            </div>
            
            <div class="row justify-content-center">
               <div class="col-md-6">
                  <div class="login-container">
                     
                     {{-- Alert Messages --}}
                     @if (session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                        </div>
                     @endif
                     
                     @if (session('error'))
                        <div class="alert alert-danger">
                           {{ session('error') }}
                        </div>
                     @endif

                     @if ($errors->any())
                        <div class="alert alert-danger">
                           <ul style="margin: 0; padding-left: 20px;">
                              @foreach ($errors->all() as $error)
                                 <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                     @endif

                     <!-- FORM SEDERHANA - SAMA DENGAN LOGIN SISWA -->
                     <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        
                        <div class="input-group">
                           <label for="nisn">NIP</label>
                           <input type="text" 
                                  id="nisn" 
                                  name="nisn" 
                                  placeholder="Masukkan NIP" 
                                  required>
                        </div>
                        
                        <div class="input-group">
                           <label for="password">Password</label>
                           <input type="password" 
                                  id="password" 
                                  name="password" 
                                  placeholder="Masukkan password" 
                                  required>
                        </div>
                        
                        <button type="submit" class="login-btn">
                           Login
                        </button>
                        
                        <div class="back-link">
                           <a href="{{ route('beranda') }}">
                              <i class="fa fa-arrow-left"></i> Kembali ke Beranda
                           </a>
                        </div>
                     </form>
                     
                  </div>
               </div>
            </div>
         </div>
      </section>
      
      <!-- footer -->
      <div style="background-color: #335C67; color: #FFF3B0; padding: 15px 0; text-align: center;">
         <p>Tio Ezekiel@2025 Fakultas Keguruan dan Ilmu Pendidikan</p>
      </div>
      
   </body>
</html>