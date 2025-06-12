@extends('layouts.app')

@section('title', 'Verifikasi')
@section('pageTitle', 'Sistem Pertahanan Tubuh')

@section('content')
   <!-- Bagian Verifikasi 2 -->
<h2 class="card-title text-primary mb-4">Verifikasi 2</h2>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Sistem Pertahanan Tubuh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .drag-drop-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .drag-drop-list {
            width: 45%;
            border: 1px solid #ccc;
            padding: 10px;
            min-height: 200px;
        }
        .drag-item {
            padding: 8px;
            margin: 5px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            cursor: move;
        }
        .drop-target {
            min-height: 50px;
            border: 1px dashed #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h4 class="card-title text-primary mb-4">Instruksi</h4>
        <p class="materi">
            Setelah kamu mengamati video tadi dan mengerjakan tugas sebelumnya, selanjutnya kerjakan tugas berikut dengan cermat. 
            Klasifikasikan beberapa kategori sistem pertahanan tubuh terhadap penyakit berdasarkan komponen apa yang terlibat 
            dan fungsinya dalam menghentikan patogen!
        </p>
        <ol class="materi">
            <li class="materi">Klasifikasikan komponen pertahanan tubuh berdasarkan cara kerjanya.</li>
            
            <li class="materi">Klik dan tahan salah satu komponen dan letakkan pada kolom tabel yang tepat.</li>    
        </ol>
        


        <!-- Container untuk Drag and Drop -->
        <div class="drag-drop-container">
            <!-- Daftar Komponen -->
            <div class="drag-drop-list" id="komponen-list">
                <div class="drag-item" data-id="kulit">Cenderung tinggal di organ-organ tertentu dan tidak sepenuhnya menghancurkan patogen.</div>
                <div class="drag-item" data-id="selb">Melawan parasit besar seperti cacing tambang dan membantu mengatur serta memunculkan respon imun terhadap alergi.</div>
                <div class="drag-item" data-id="histamin">Memproduksi protein inflamasi dan melebarkan pembuluh darah.</div>
                <div class="drag-item" data-id="selt">Mengenali sel tubuh yang berubah menjadi kanker dan mencegah pertumbuhannya.</div>
                <div class="drag-item" data-id="netralisasi">Sebagian besar diproduksi oleh sel-sel hati dan akan aktif ketika ada patogen dan tidak aktif jika tidak ada patogen.</div>
            </div>

            <!-- Daftar Fungsi -->
            <div class="drag-drop-list" id="fungsi-list">
                <div class="drag-item" data-id="kulit">Makrofag</div>
                <div class="drag-item" data-id="selb">Eosinofil</div>
                <div class="drag-item" data-id="histamin">Mastosit</div>
                <div class="drag-item" data-id="selt">Limfosit T</div>
                <div class="drag-item" data-id="netralisasi">Sistem Komplemen</div>
            </div>
        </div>

        <!-- Tabel untuk Drop Target -->
        <table class="table mt-4">
            <thead>
                <tr>
                    {{-- <th>Kategori</th>    --}}
                    <th>Fungsi</th>
                    <th>Komponen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    {{-- <td>Pertahanan Nonspesifik</td> --}}
                    <td id="komponen-0" class="drop-target"></td>
                    <td id="fungsi-0" class="drop-target"></td>
                </tr>
                <tr>
                    {{-- <td>Pertahanan Spesifik</td> --}}
                    <td id="komponen-1" class="drop-target"></td>
                    <td id="fungsi-1" class="drop-target"></td>
                </tr>
                <tr>
                    {{-- <td>Proses Inflamasi</td> --}}
                    <td id="komponen-2" class="drop-target"></td>
                    <td id="fungsi-2" class="drop-target"></td>
                </tr>
                <tr>
                    {{-- <td>Jenis Limfosit</td> --}}
                    <td id="komponen-3" class="drop-target"></td>
                    <td id="fungsi-3" class="drop-target"></td>
                </tr>
                <tr>
                    {{-- <td>Mekanisme Antibodi</td> --}}
                    <td id="komponen-4" class="drop-target"></td>
                    <td id="fungsi-4" class="drop-target"></td>
                </tr>
            </tbody>
        </table>

        <button class="btn btn-primary mt-3" onclick="submitTugas()">Submit</button>
    </div>

    <!-- Library SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        // Inisialisasi Sortable untuk komponen dan fungsi
        const komponenList = document.getElementById('komponen-list');
        const fungsiList = document.getElementById('fungsi-list');

        new Sortable(komponenList, {
            group: 'shared',
            animation: 150,
            onEnd: function (evt) {
                updateDropTarget(evt);
            }
        });

        new Sortable(fungsiList, {
            group: 'shared',
            animation: 150,
            onEnd: function (evt) {
                updateDropTarget(evt);
            }
        });

        // Inisialisasi Sortable untuk drop target
        document.querySelectorAll('.drop-target').forEach(target => {
            new Sortable(target, {
                group: 'shared',
                animation: 150,
                onEnd: function (evt) {
                    updateDropTarget(evt);
                }
            });
        });

        // Fungsi untuk memperbarui drop target
        function updateDropTarget(evt) {
            const item = evt.item;
            const target = evt.to;
            if (target.classList.contains('drop-target')) {
                const id = target.id;
                const dataId = item.getAttribute('data-id');
                console.log(`Item ${dataId} ditempatkan di ${id}`);
            }
        }

        // Fungsi untuk submit tugas
        function submitTugas() {
            const data = [];
            document.querySelectorAll('.drop-target').forEach(target => {
                const items = target.querySelectorAll('.drag-item');
                items.forEach(item => {
                    data.push({
                        target: target.id,
                        item: item.getAttribute('data-id'),
                        text: item.innerText
                    });
                });
            });
            console.log('Data yang dikirim:', data);
            // Kirim data ke server menggunakan AJAX atau form submission
        }
    </script>
</body>
</html>

@endsection