@extends('layouts.app')

@section('title', 'Pengumpulan Data')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pertahanan Tubuh - Tugas Siswa</title>
    <style>
        :root {
            --primary: #335C67;
            --secondary: #E09F3E;
            --accent: #9E2A2B;
            --light: #FFF3B0;
            --dark: #540B0E;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            /* max-width: 800px; */
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        
        .task-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 25px;
            margin-bottom: 30px;
        }
        
        .task-title {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.8rem;
            border-bottom: 2px solid var(--light);
            padding-bottom: 10px;
        }
        
        .task-instruction {
            color: var(--primary);
            background-color: rgba(255, 243, 176, 0.3);
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 1rem;
        }
        
        .question-group {
            margin-bottom: 25px;
        }
        
        .question-text {
            margin-bottom: 10px;
            display: block;
            font-size: 1.05rem;
        }
        
        .answer-input {
            border: 2px solid #ddd;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 1rem;
            transition: all 0.3s;
            margin: 5px 0;
            width: 100%;
            max-width: 400px;
        }
        
        .answer-input:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(224, 159, 62, 0.2);
        }
        
        .submit-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }
        
        .submit-btn:hover {
            background-color: var(--dark);
        }
        
        .inline-input {
            display: inline-block;
            width: auto;
            min-width: 150px;
            margin: 0 5px;
        }
        
        @media (max-width: 600px) {
            .inline-input {
                display: block;
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>
    <div class="task-container">
        <h1 class="task-title">Pengumpulan Data</h1>
        
        <div class="task-instruction">
            Isilah kolom yang kosong pada teks berikut ini berdasarkan informasi yang telah kamu dapat dari menonton video dan melaksanakan kegiatan lainnya.
        </div>
        
        <div class="question-group">
            <label class="question-text">Kekebalan aktif merupakan kekebalan yang dihasilkan oleh </label>
            <input type="text" class="answer-input inline-input" id="isian-1" name="isian-1"> 
            itu sendiri.
            Kekebalan ini dapat diperoleh secara alami dan secara 
            <input type="text" class="answer-input inline-input" id="isian-2" name="isian-2">.
            Kekebalan aktif alami diperoleh setelah seseorang mengalami sakit akibat infeksi suatu kuman penyakit.  Setelah sembuh dari sakit, orang tersebut akan menjadi
            <input type="text" class="answer-input inline-input" id="isian-3" name="isian-3">.
            terhadap penyakit tersebut. Sedangkan kekebalan pasif merupakan kekebalan yang diperoleh setelah menerima antibodi dari <input type="text" class="answer-input inline-input" id="isian-4" name="isian-4">.
            Kekebalan pasif alami dapat ditemukan pada bayi setelah menerima antibodi dari ibunya melalui plasenta saat berada di dalam <input type="text" class="answer-input inline-input" id="isian-5" name="isian-5">.
        </div>
        
        <button type="submit" class="submit-btn">Cek Jawaban</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add input validation if needed
            const inputs = document.querySelectorAll('.answer-input');
            
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = '#E09F3E';
                });
                
                input.addEventListener('blur', function() {
                    this.style.borderColor = this.value ? '#9E2A2B' : '#ddd';
                });
            });
            
            // Form submission handling
            const submitBtn = document.querySelector('.submit-btn');
            submitBtn.addEventListener('click', function() {
                let allFilled = true;
                
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        allFilled = false;
                        input.style.borderColor = '#540B0E';
                    }
                });
                
                    
            });
        });
    </script>
</body>
</html>
@endsection

{{-- <style>
    textarea {
        width: 1000px;
        height: 150px;
    }
    </style>
    <h2 class="card-title text-primary mb-4">Pengumpulan Data 3</h2>
    <h3 class="card-title text-primary mb-4">Instruksi</h3>
    <p class="materi">Isilah kolom yang kosong pada teks berikut ini berdasarkan informasi yang telah kamu dapat dari menonton video dan membaca materi sebelumnya.</p>
    
    <label for="isian-1">Kekebalan aktif merupakan kekebalan yang dihasilkan oleh </label>
    <input type="text" id="isian-1" name="isian-1"> itu sendiri.<br>
    <label for="isian-1">Kekebalan ini dapat diperoleh secara alami dan secara </label>
    <input type="text" id="isian-1" name="isian-1">. Kekebalan aktif alami diperoleh setelah seseorang mengalami sakit akibat infeksi suatu kuman penyakit. Setelah sembuh dari sakit, orang tersebut akan menjadi 
    <input type="text" id="isian-1" name="isian-1">  terhadap penyakit tersebut.
    Sedangkan kekebalan pasif merupakan kekebalan yang diperoleh setelah menerima antibodi dari 
    <input type="text" id="isian-1" name="isian-1"> . Kekebalan pasif alami dapat ditemukan pada bayi setelah menerima antibodi dari ibunya melalui plasenta saat  berada di dalam
    <br><input type="submit" value="Submit"> --}}