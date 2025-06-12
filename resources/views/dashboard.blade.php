<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pertahanan Tubuh</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    </style>
</head>
<body>
    
    @extends('layout.app')
    @section('content')
    
    <!-- Content Area -->
    <div class="content-area p-4">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-white shadow-sm mb-4">
            <div class="container-fluid">
                {{-- <button class="btn btn-outline-secondary me-2" id="collapseNavigation">
                    <i class="bi bi-list"></i>
                </button> --}}
                <h1 class="navbar-brand mb-0" id="pageTitle">Sistem Pertahanan Tubuh</h1>
            </div>
        </nav>

        <!-- Main Content Container -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card content-card" id="contentContainer">
                        <div class="card-body" id="contentBody">
                            <h2 class="card-title text-primary mb-4">Selamat Datang</h2>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const contentArea = document.querySelector('.content-area');
            const collapseNavigationBtn = document.getElementById('collapseNavigation');
            const toggleSidebarBtn = document.getElementById('toggleSidebar');
            const contentBody = document.getElementById('contentBody');
            const pageTitle = document.getElementById('pageTitle');

            // Home Button
            const homeButton = document.getElementById('homeButton');
            homeButton.addEventListener('click', function(e) {
                e.preventDefault();
                loadContent('home');
            });

            // Navigation Collapse/Expand
            collapseNavigationBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
            });

            // Content Loading Function
            function loadContent(contentType) {
                // Simulasi loading konten (ganti dengan metode aktual seperti fetch)
                const contentMap = {
                    'home': {
                        title: 'Sistem Pertahanan Tubuh',
                        content: `
                        <p class="materi">
                            Pada akhir fase F, peserta didik memiliki kemampuan mendeskripsikan struktur sel serta bioproses yang terjadi, seperti transpor membran dan pembelahan sel; menganalisis keterkaitan struktur organ pada sistem organ dengan fungsinya, serta kelainan atau gangguan yang muncul pada sistem organ tersebut; memahami fungsi enzim dan mengenal proses metabolisme yang terjadi dalam tubuh; serta memiliki kemampuan menerapkan konsep pewarisan sifat, pertumbuhan dan perkembangan, mengevaluasi gagasan baru mengenai evolusi, dan inovasi teknologi biologi.   
                        </p>
                        <div class="row">
                            <div class="col-md-8">
                                    <div class="alert alert-info">
                                        <h4 class="alert-heading">Kompetensi Dasar</h4>
                                        <ol>
                                            <li>Menganalisis keterkaitan peran antar komponen penyusun sistem pertahanan tubuh pada manusia.</li>
                                            <li>Menyelidiki peran dan proses sistem tubuh dan kaitannya dengan penyakit.</li>
                                        </ol>
                                    </div>
                                    <div class="alert alert-info">
                                        <h4 class="alert-heading">Tujuan Pembelajaran</h4>
                                        <ol>
                                            <li>Mendeskripsikan komponen sel, jaringan dan organ yang menyusun sistem pertahanan tubuh</li>
                                            <li>Mengidentifikasi mekanisme pertahanan tubuh dalam merespon infeksi patogen</li>
                                            <li>Memproses data hasil pengamatan yang menunjukkan keterkaitan struktur dan fungsi komponen penyusun sistem pertahanan tubuh manusia</li>
                                            <li>Mendeskripsikan gangguan sistem pertahanan tubuh dan interaksi antara antigen dan antibodi, serta berbagai jenis imunitas</li>
                                        </ol>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">Petunjuk Penggunaan Modul</h5>
                                            <ul class="list-unstyled">
                                                <li>Petunjuk untuk siswa</li>
                                                <li>Petunjuk untuk guru</li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `
                    },
                    'pendahuluan-1': {
                        title: 'Stimulus Mekanisme Sistem Pertahanan Tubuh',
                        content: `
                            <h2 class="text-primary mb-4">Pertahanan Nonspesifik, Internal Spesifik, dan Respon Imun</h2>

                                <p class="materi">Imunitas adalah kemampuan tubuh secara alami untuk melawan mikroorganisme atau racun yang masuk ke dalam jaringan dan organ tubuh. Sistem imun memiliki berbagai fungsi, seperti melindungi tubuh dari benda asing, membersihkan sel-sel mati, memperbaiki jaringan yang rusak, serta mencegah pertumbuhan sel kanker dan tumor. Respon imun muncul akibat reaksi yang melibatkan koordinasi antara sel-sel dan molekul terhadap mikroba dan zat lainnya. Sistem imun terdiri dari dua jenis, yaitu sistem imun alami atau non-spesifik (innate) dan sistem imun adaptif atau spesifik (acquired). Kedua sistem ini memiliki peran dan fungsi yang berbeda, masing-masing dengan kelebihan dan kekurangannya, namun keduanya bekerja sama dengan erat.
                                Pertahanan nonspesifik melibatkan kulit, selaput lendir, air mata, dan sekresi asam lambung. Kulit adalah penghalang fisik utama terhadap patogen. Kelenjar minyak dan keringat di kulit menghasilkan zat yang membantu melawan mikroba. Selain itu, lendir di saluran pernapasan berperan menangkap partikel asing, seperti debu dan mikroorganisme, sehingga mereka tidak dapat memasuki tubuh lebih dalam.
                                </p>

                                <h4>a. Pertahanan yang Terdapat di Permukaan Tubuh</h4>
                                <h5>a)	Pertahanan Fisik</h5>
                                <img src="{{ asset('img/penampang_kulit.png') }}" alt="penampang_kulit">
                                <p class="materi">Lapisan pelindung yang menutupi permukaan tubuh berfungsi sebagai pembatas antara tubuh dan lingkungan eksternal. Jaringan epitel yang melapisi saluran pernapasan, pencernaan, serta berbagai organ lainnya menjadi penghalang fisik yang ampuh dalam mencegah atau mengurangi kemungkinan masuknya patogen ke dalam tubuh.</p>
                                
                                <h5>b)	Pertahanan Mekanis</h5>
                                <p class="materi">Pertahanan tubuh secara mekanis dilakukan oleh rambut hidung dan silia pada trakea. Rambut hidung berfungsi menyaring udara yang dihirup dari partikel-partikel berbahaya maupun mikrobia. Adapun silia yang terdapat pada trakea berfungsi menyapu partikel-partikel berbahaya yang terperangkap dalam lendir agar dapat dikeluarkan dari tubuh.</p>

                                <h5>c) Pertahanan Kimiawi</h5>
                                <p class="materi">Pertahanan kimia dilakukan melalui pengeluaran berbagai senyawa kimia oleh kelenjar tubuh untuk mengurangi jumlah patogen yang masuk. Contohnya adalah sekresi Asam Klorida di lambung untuk membunuh patogen yang mungkin masuk bersama makanan; lendir di saluran pernapasan yang berfungsi menangkap debu dan patogen; serta lisozim, enzim yang mampu merusak dinding sel bakteri, yang ditemukan dalam air mata, air liur, dan keringat.
                                Pertahanan Kimiawi meliputi enzim yang ada dalam air mata dan air liur, seperti lisozim, yang menghancurkan dinding sel bakteri. Asam lambung di perut juga bertindak sebagai pelindung kimiawi dengan membunuh patogen yang masuk melalui makanan.
                                </p>

                                <h5>d) Pertahanan Biologis</h5>
                                <p class="materi">Pertahanan tubuh secara biologis dilakukan oleh populasi bakteri tidak berbahaya yang hidup di kulit dan membran mukosa. Bakteri-bakteri tersebut melindungi tubuh dengan cara berkompetisi dengan bakteri patogen dalam memperoleh nutrisi.
                                </p>

                                <h4>b)	Respons Peradangan</h4>
                                <img src="{{ asset('img/inflamasi.png') }}" alt="inflamasi">

                                <h5>a) Jaringan Mengalami Luka </h5>
                                <p class="materi">Adanya kerusakan jaringan mengakibatkan patogen mampu melewati pertahanan tubuh untuk menginfeksi sel-sel tubuh. Jaringan yang terinfeksi akan merangsang mastosit mengeluarkan histamin dan prostaglandin.</p>

                                <h5>b)	Terjadi Pelebaran Pembuluh Darah</h5>
                                <p class="materi">Adanya kerusakan jaringan mengakibatkan patogen mampu melewati pertahanan tubuh untuk menginfeksi sel-sel tubuh. Jaringan yang terinfeksi akan merangsang mastosit mengeluarkan histamin dan prostaglandin.</p>

                                <h5>c)	Sel-Sel Fagosit Kemudian Memakan Patogen</h5>
                                <p class="materi">Inflamasi berfungsi mencegah infeksi menyebar ke jaringan lain serta mempercepat proses penyembuhan. Reaksi tersebut juga berfungsi sebagai sinyal adanya bahaya dan sebagai perintah agar sel darah putih (neutrofil dan monosit) melakukan fagositosis terhadap mikrobia yang menginfeksi tubuh.</p>

                                <h4>2. Pertahanan Internal Spesifik</h4>
                                <img src="{{ asset('img/struktur_antibodi.jpg') }}" alt="struktur_antibodi">

                            <div class="alert alert-info">
                                <h4>Komponen Utama</h4>
                                <ul>
                                    <li>A.	Mekanisme Sistem Pertahanan Tubuh</li>
                                    <li>B.	Komponen Sistem Pertahanan Tubuh</li>
                                    <li>C.	Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh</li>
                                </ul>
                            </div>
                        `
                    }
                    ,'identifikasi-masalah-1': {
                        title: 'Identifikasi Masalah',
                        content: `
                            <div class="alert alert-info">
                                <h4>Identifikasi Masalah</h4>
                                <p class"materi">"Rina terluka saat mengupas buah. Luka tersebut awalnya memerah, bengkak, dan bernanah. Namun setelah 7 hari, luka mengering dan sembuh. Tiga bulan kemudian, Rina terpapar bakteri yang sama, tetapi tubuhnya tidak menunjukkan gejala infeksi."</p>
                                
                                <form action="#">
                                    <p><label for="identifikasi-masalah">Berdasarkan informasi di atas, selidiki apa saja sistem pertahanan tubuh yang terlibat!</label></p>
                                    <textarea id="identifikasi-masalah" name="identifikasi-masalah" rows="4" cols="50"></textarea>
                                    <br>
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        `
                    },
                    'pengumpulan-data-1': {
                        title: 'Pengumpulan Data',
                        content: `
                            <div class="alert alert-info">
                                <h4>Pengumpulan Data</h4>
                                <p class"materi">Tuliskan apa saja yang kalian temukan dari kasus Rina berdasarkan aspek berikut!</p>
                                <ul>
                                    <li>Luka memerah, bengkak, dan bernanah</li>
                                    <li>Terpapar bakteri yang sama tapi tidak menunjukkan gejala infeksi</li>
                                </ul>
                                <form action="#">
                                    <p><label for="pengumpulan-data"></label></p>
                                    <textarea id="pengumpulan-data" name="pengumpulan-data" rows="4" cols="50"></textarea>
                                    <br>
                                    <input type="submit" value="Submit">
                                </form>
                            </div>
                        `
                    },
                    'pengolahan-data-1': {
                        title: 'Pengolahan Data',
                        content: `
                            <div class="alert alert-info">
                                <h4>Pengolahan Data</h4>
                                <p class"materi">"Rina terluka saat mengupas buah. Luka tersebut awalnya memerah, bengkak, dan bernanah. Namun setelah 7 hari, luka mengering dan sembuh. Tiga bulan kemudian, Rina terpapar bakteri yang sama, tetapi tubuhnya tidak menunjukkan gejala infeksi."</p>
                                
                                <form action="#">
                                    <label for="pengolahan-data-1-no-1">Bagaimana bakteri dihadang oleh sistem non-spesifik sehingga Rina tidak terinfeksi dua kali?</label><br>
                                    <input type="text" id="pengolahan-data-1-jawaban" name="pengolahan-data-1-jawaban" ><br>
                                    <label for="pengolahan-data-1-no-2">Bagaimana sistem spesifik mengenali dan mengingat bakteri?</label><br>
                                    <input type="text" id="pengolahan-data-1-no-2" name="pengolahan-data-1-no-2"><br><br>
                                    <input type="submit" value="Submit">
                                </form> 
                            </div>
                        `
                    },
                    'verifikasi-1': {
                        title: 'Verifikasi',
                        content: `
                            <div class="alert alert-info">
                                <h4>Verifikasi</h4>
                                <p class"materi">Dari pembelajaran yang telah kamu lakukan, dapat diketahui bahwa terdapat beberapa mekanisme sistem pertahanan tubuh terhadap penyakit. Salah satu contoh dari kerja sistem pertahanan itu dapat dilihat dari kasus yang terjadi kepada Rina pada kegiatan sebelumnya.</p>
                                <p class"materi">Sekarang kerjakan tabel berikut dengan men-ceklis pada ciri-ciri mekanisme pertahanan tubuh yang sesuai berdasarkan apa saja yang telah kamu pelajari pada materi ini..</p>

                                <p>Memori Imun</p>
                                <form>
                                    <input type="radio" id="nonspesifik" name="verifikasi_spesifik" value="Nonspesifik">
                                    <label for="nonspesifik">Nonspesifik</label><br>
                                    <input type="radio" id="spesifik" name="verifikasi_spesifik" value="Spesifik">
                                    <label for="spesifik">Spesifik</label><br>
                                    
                                </form>
                                <br>
                                <p>Cepat Merespon</p>
                                <form>
                                    <input type="radio" id="nonspesifik" name="verifikasi_spesifik" value="Nonspesifik">
                                    <label for="nonspesifik">Nonspesifik</label><br>
                                    <input type="radio" id="spesifik" name="verifikasi_spesifik" value="Spesifik">
                                    <label for="spesifik">Spesifik</label><br>
                                
                                </form>
                                <br>
                                <p>Kekhususan</p>
                                <form>
                                    <input type="radio" id="nonspesifik" name="verifikasi_spesifik" value="Nonspesifik">
                                    <label for="nonspesifik">Nonspesifik</label><br>
                                    <input type="radio" id="spesifik" name="verifikasi_spesifik" value="Spesifik">
                                    <label for="spesifik">Spesifik</label><br>
                                    
                                </form>
                            </div>
                        `
                    },
                    'kuis-1': {
                        title: 'Kuis 1',
                        content: `
                            1.	Antigen adalah partikel unik dari patogen yang dapat memicu respons imun. Antigen dapat berupa protein, glikoprotein, lipid, atau zat lain yang dihasilkan oleh patogen. Antigen berfungsi untuk .....<br>
                            a.	menghasilkan sel darah putih<br>
                            b.	memicu respons imun<br>
                            c.	menghancurkan sel kanker<br>
                            d.	menyaring partikel asing<br>
                            e.	menghasilkan histamin<br>
                            <br>
                            2.	Salah satu contoh pertahanan nonspesifik adalah ....<br>
                            a.	antibodi<br>
                            b.	sel t pembunuh<br>
                            c.	kulit<br>
                            d.	sel b plasma<br>
                            e.	limfosit<br>
                            <br>
                            3.	Sistem pertahanan nonspesifik disebut sebagai pertahanan pertama tubuh karena ...<br>
                            a.	melibatkan pembentukan antibodi<br>
                            b.	bekerja secara spesifik terhadap patogen tertentu<br>
                            c.	melibatkan sel t dan sel b<br>
                            d.	melindungi tubuh dari semua jenis patogen tanpa memerlukan identifikasi spesifik<br>
                            e.	hanya aktif setelah patogen masuk ke dalam tubuh<br>
                            <br>
                            4.	Sel T sitotoksik menghancurkan sel yang terinfeksi dengan cara ....<br>
                            a.	menghasilkan antibodi yang menetralisir patogen<br>
                            b.	melepaskan protein perforin yang membentuk lubang pada membran sel terinfeksi<br>
                            c.	memakan patogen melalui proses fagositosis<br>
                            d.	menghasilkan histamin yang menyebabkan peradangan<br>
                            e.	mengikat antigen dan mengaktifkan sistem komplemen<br>
                            <br>
                            5.	Jika seseorang terkena infeksi virus, sistem imun spesifik akan berperan dengan cara ....<br>
                            a.	kulit menghalangi masuknya virus ke dalam tubuh<br>
                            b.	sel T pembunuh menyerang sel tubuh yang terinfeksi virus<br>
                            c.	asam lambung membunuh virus yang masuk melalui makanan<br>
                            d.	rambut hidung menyaring partikel virus dari udara<br>
                            e.	lisozim dalam air mata menghancurkan dinding sel virus<br>
                            <br>
                            6.	Seorang pasien mengalami peradangan pada luka di kulitnya. Mekanisme inflamasi terjadi karena .... <br>
                            a.	sel B plasma menghasilkan antibodi untuk melawan patogen<br>
                            b.	sel T pembantu mengaktifkan makrofag untuk melakukan fagositosis<br>
                            c.	mastosit mengeluarkan histamin yang menyebabkan pelebaran pembuluh darah dan peningkatan permeabilitas<br>
                            d.	antibodi mengikat antigen dan mengaktifkan sistem komplemen<br>
                            e.	sel T supresor menghentikan respons imun setelah infeksi selesai<br>
                            <br>
                            7.	 Fungsi utama antibodi adalah ....<br>
                            a.	menghasilkan sel darah putih<br>
                            b.	mengikat antigen dan menetralisir patogen<br>
                            c.	menghasilkan histamin untuk memicu peradangan<br>
                            d.	menghancurkan sel kanker secara langsung<br>
                            e.	menyaring partikel asing di saluran pernapasan<br>
                            <br>
                            8.	Perbedaan utama antara kekebalan humoral dan kekebalan seluler adalah ....<br>
                            a.	kekebalan humoral melibatkan sel T, sedangkan kekebalan seluler melibatkan sel B<br>
                            b.	kekebalan humoral menghasilkan antibodi, sedangkan kekebalan seluler menghancurkan sel yang terinfeksi<br>
                            c.	kekebalan humoral hanya melindungi dari bakteri, sedangkan kekebalan seluler melindungi dari virus<br>
                            d.	kekebalan humoral bersifat nonspesifik, sedangkan kekebalan seluler bersifat spesifik<br>
                            e.	kekebalan humoral melibatkan sel darah merah, sedangkan kekebalan seluler melibatkan sel darah putih<br>
                            <br>
                            9.	Jika seseorang divaksinasi, mekanisme kekebalan yang terjadi adalah ....<br>
                            a.	sistem pertahanan nonspesifik langsung menghancurkan patogen<br>
                            b.	sel B pengingat mengingat antigen dan memicu respons imun lebih cepat jika terpapar patogen yang sama di masa depan<br>
                            c.	sel T supresor menghentikan respons imun setelah vaksinasi<br>
                            d.	asam lambung membunuh patogen yang masuk melalui makanan<br>
                            e.	lisozim dalam air liur menghancurkan dinding sel patogen<br>
                            <br>
                            10.	 Salah satu contoh pertahanan kimiawi pada sistem pertahanan nonspesifik adalah ....<br>
                            a.	rambut hidung<br>
                            b.	lisozim dalam air mata<br>
                            c.	sel B pembunuh<br>
                            d.	antibodi<br>
                            e.	sel B plasma<br>

                        `
                    },
                    'pendahuluan-2': {
                        title: 'Pendahuluan & Stimulus',
                        content: `
                            <h2 class="text-primary mb-4">Komponen Sistem Pertahanan Tubuh</h2>

                                <p class="materi">Sistem pertahanan tubuh organisme tingkat tinggi terutama mamalia bertumpu pada sel-sel darah putih (leukosit). Leukosit dibentuk di dalam sumsum tulang oleh sebuah jaringan meristematik yang disebut stem cells (sel induk darah). Leukosit secara umum dapat dibedakan menjadi dua bentuk yaitu fagosit dan limfosit.
                                </p>
                                <img src="{{ asset('img/diferensiasi_sel_darah.png') }}" alt="diferensiasi_sel_darah_induk">

                                <h4>1. Sel Epitel</h4>
                                <p class="materi">Sel epitel merupakan garis pertahanan pertama tubuh saat terjadi infeksi, baik oleh antigen maupun mikroorganisme. Fungsi utama sel epitel adalah memberikan perlindungan melalui mekanisme kimiawi, mekanik, dan biologis. Sel-sel ini banyak ditemukan pada kulit, saluran pencernaan, paru-paru, serta pada mata, hidung, dan mulut.</p>

                                <h4>2.	Fagosit</h4>
                                <p class="materi">Fagosit, yang secara harfiah berarti "sel pemakan", berfungsi dengan cara menghancurkan patogen melalui proses pencernaan di dalam sel. Sel fagosit diproduksi di sumsum tulang, terutama pada tulang panjang. Setelah diproduksi, sel-sel ini disimpan di sumsum tulang sebelum dilepaskan ke dalam aliran darah dan cairan limfa, sehingga mereka dapat beredar ke seluruh tubuh untuk melaksanakan tugasnya.
                                Selama perkembangannya, fagosit terbentuk dari beberapa jenis sel yang berbeda, namun dalam respon imun tubuh, ada dua tipe fagosit yang paling sering ditemukan, yaitu neutrofil dan makrofag.

                                <h5>a.	Neutrofil</h5>
                                <p class="materi">Neutrofil menjalankan fungsi fagositiknya dengan menempel pada patogen. Membran sel neutrofil kemudian membentuk kantung vesikula yang mengurung patogen (fagosom) dan membawanya masuk ke dalam sel melalui proses endositosis. Enzim pencernaan yang diproduksi oleh Badan Golgi akan dilepaskan ke dalam lisosom. Lisosom ini kemudian menyatu dengan fagosom, membentuk vakuola fagositik atau vakuola makanan, dan menghancurkan patogen di dalamnya. Proses ini secara keseluruhan disebut fagositosis.</p>
                                <img src="{{ asset('img/tahapan_fagosit.png') }}" alt="tahapan fagosit">
                                
                                <h5>b. Makrofag</h5>
                                <p class="materi">Makrofag memiliki ukuran yang lebih besar dibandingkan neutrofil. Alih-alih bergerak bebas di dalam pembuluh darah, makrofag cenderung tinggal di organ-organ tertentu seperti paru-paru, hati, limpa, ginjal, dan nodus limfa. 
                                Makrofag tidak sepenuhnya menghancurkan patogen, melainkan memecahnya menjadi partikel kecil yang berfungsi sebagai sampel antigen. Partikel antigen ini kemudian ditempatkan di permukaan membran sel makrofag, sehingga dapat dikenali oleh limfosit. 
                                Dengan cara ini, antigen tetap dapat dikenali dan bertindak sebagai sinyal yang menandakan adanya kebutuhan bantuan untuk memicu respon imun spesifik lainnya. Karena kemampuannya menampilkan antigen di permukaan sel, makrofag disebut sebagai sel penyaji antigen (Antigen-Presenting Cells/APCs).
                                </p>
                                <img src="{{ asset('img/makrofag.png') }}" alt="makrofag">
                                
                                <h4>3.	Limfosit</h4>
                                <p class="materi">Limfosit adalah jenis sel darah putih yang memiliki peran penting dalam sistem pertahanan tubuh, terutama dalam respon imun adaptif spesifik. Ada dua jenis limfosit, yang keduanya terbentuk sejak sebelum kelahiran di sumsum tulang janin.<br>
                                • Limfosit B (sel B) tetap berada di sumsum tulang sampai matang, kemudian menyebar ke seluruh tubuh, terutama di nodus limfa dan limpa (organ yang terletak di sisi kiri lambung).<br>
                                • Limfosit T (sel T) meninggalkan sumsum tulang untuk menuju timus, tempat mereka berkumpul dan matang. Timus adalah kelenjar yang terletak di rongga dada, tepat di bawah tulang dada (sternum). Ukurannya meningkat dua kali lipat antara masa lahir hingga pubertas, namun setelah pubertas, ukurannya mulai mengecil.
                                </p>

                                <h5>a.	Limfosit B (Sel B)</h5>
                                <p class="materi">Limfosit B berperan dalam respon imun dengan memproduksi antibodi. Setiap sel B yang telah teraktivasi akan membentuk kelompok kecil atau klon, di mana setiap klon menghasilkan jenis antibodi yang spesifik.</p>
                                <img src="{{ asset('img/mekanisme_limfosit.png') }}" alt="mekanisme limfosit">

                                <p class="materi"></p>
                                // <h5>a)	Pertahanan Fisik</h5>
                                

                        `
                    },'identifikasi-masalah-2': {
                        title: 'Identifikasi Masalah',
                        content: `
                            <div class="alert alert-info">
                                <h4>Identifikasi Masalah</h4>
                                <p class"materi">Kalian telah mempelajari dua tipe limfosit yang sangat berperan penting dalam sistem pertahanan tubuh internal spesifik. Untuk memastikan Kalian dapat memahami dengan baik, tentukan karakteristik pada salah satu atau kedua tipe limfosit dengan melengkapi kolom di bawah ini! Berikan tanda centang (√) jika cirinya sesuai atau tanda silang (×) jika ciri tidak sesuai, pada salah satu atau kedua kolom yang tersedia!</p>
                                <p class="materi">Berdasarkan informasi di atas, selidiki apa saja sistem pertahanan tubuh yang terlibat!</label></p>

                                <p>Membentuk sel sitotoksik</p>
                                <form>
                                    <input type="radio" id="selB" name="selB" value="selB">
                                    <label for="selB">Sel B</label><br>
                                    <input type="radio" id="selT" name="selT" value="selT">
                                    <label for="selT">Sel T</label><br>
                                    <br>
                                </form>
                                <p>Membentuk sel memori</p>
                                <form>
                                    <input type="radio" id="selB" name="selB" value="selB">
                                    <label for="selB">Sel B</label><br>
                                    <input type="radio" id="selT" name="selT" value="selT">
                                    <label for="selT">Sel T</label><br>
                                    <br>
                                </form>
                                <p>Melakukan fagitosis</p>
                                <form>
                                    <input type="radio" id="selB" name="selB" value="selB">
                                    <label for="selB">Sel B</label><br>
                                    <input type="radio" id="selT" name="selT" value="selT">
                                    <label for="selT">Sel T</label><br>
                                    <br>
                                </form>
                                <p>Membentuk antibodi</p>
                                <form>
                                    <input type="radio" id="selB" name="selB" value="selB">
                                    <label for="selB">Sel B</label><br>
                                    <input type="radio" id="selT" name="selT" value="selT">
                                    <label for="selT">Sel T</label><br>
                                    <br>
                                </form>
                                <p>Menjadi sel penyaji antigen</p>
                                <form>
                                    <input type="radio" id="selB" name="selB" value="selB">
                                    <label for="selB">Sel B</label><br>
                                    <input type="radio" id="selT" name="selT" value="selT">
                                    <label for="selT">Sel T</label><br>
                                    <br>
                                </form>
                                <p>Membentuk sel plasma</p>
                                <form>
                                    <input type="radio" id="selB" name="selB" value="selB">
                                    <label for="selB">Sel B</label><br>
                                    <input type="radio" id="selT" name="selT" value="selT">
                                    <label for="selT">Sel T</label><br>
                                    <br>
                                </form>
                            </div>
                        `
                    },
                    'kuis-2': {
                        title: 'Kuis 2',
                        content: `
                            1.	Sel darah putih yang berperan dalam sistem pertahanan tubuh terutama dibentuk di ....<br>
                            a.	hati<br>
                            b.	sumsum tulang<br>
                            c.	limpa<br>
                            d.	ginjal<br>
                            e.	paru-paru<br>
                            <br>
                            2.	Sel epitel merupakan garis pertahanan pertama tubuh dan banyak ditemukan di ....<br>
                            a.	sumsum tulang<br>
                            b.	kulit, saluran pencernaan, dan paru-paru<br>
                            c.	darah dan cairan limfa<br>
                            d.	hati dan ginjal<br>
                            e.	otak dan sumsum tulang belakang<br>
                            <br>
                            3.	Proses fagositosis dilakukan oleh neutrofil dengan cara ....<br>
                            a.	menghasilkan antibodi<br>
                            b.	melepaskan histamin<br>
                            c.	membentuk fagosom dan menghancurkan patogen<br>
                            d.	mengaktifkan sistem komplemen<br>
                            e.	menghasilkan sel memori<br>
                            <br>
                            4.	Makrofag berperan sebagai sel penyaji antigen (APCs) dengan cara ....<br>
                            a.	menghancurkan patogen sepenuhnya<br>
                            b.	memecah patogen menjadi partikel kecil dan menampilkannya di permukaan sel<br>
                            c.	menghasilkan antibodi spesifik<br>
                            d.	melepaskan histamin untuk memicu peradangan<br>
                            e.	mengaktifkan sel t pembunuh secara langsung<br>
                            <br>
                            5.	Jika seseorang terinfeksi virus, sel T pembunuh akan merespons dengan cara ....<br>
                            a.	menghasilkan antibodi<br>
                            b.	menghancurkan sel yang terinfeksi virus<br>
                            c.	melepaskan histamin<br>
                            d.	mengaktifkan sistem komplemen<br>
                            e.	membentuk fagosom<br>
                            <br>
                            6.	Sel Natural Killer (NK) termasuk dalam kelompok ....<br>
                            a.	sel darah merah<br>
                            b.	sel epitel<br>
                            c.	limfosit<br>
                            d.	sel mast<br>
                            e.	sel komplemen<br>
                            <br>
                            7.	Sel eosinofil berperan dalam melindungi tubuh dari ....<br>
                            a.	virus<br>
                            b.	bakteri<br>
                            c.	parasit besar seperti cacing tambang<br>
                            d.	sel kanker<br>
                            e.	sel tubuh yang rusak<br>
                            <br>
                            8.	Jika terjadi reaksi alergi, sel mast akan melepaskan ....<br>
                            a.	Antibodi<br>
                            b.	histamin<br>
                            c.	enzim lisozim<br>
                            d.	protein komplemen<br>
                            e.	sel T pembunuh<br>
                            <br>
                            9.	Sistem komplemen terdiri dari sekelompok protein yang berperan dalam ....<br>
                            a.	menghasilkan sel darah merah<br>
                            b.	menghancurkan antigen asing<br>
                            c.	menghasilkan sel epitel<br>
                            d.	mengaktifkan sel mast<br>
                            e.	menghasilkan histamin<br>
                            <br>
                            10.	Jika sistem komplemen diaktifkan, reaksi berantai yang terjadi dapat menyebabkan ....<br>
                            a.	pembentukan sel darah merah<br>
                            b.	kerusakan membran sel antigen<br>
                            c.	produksi histamin<br>
                            d.	pembentukan sel epitel<br>
                            e.	aktivasi sel mast<br>
                            <br>


                        `
                    },
                    'pendahuluan-3': {
                        title: 'Pendahuluan & Stimulus',
                        content: `
                            <h2 class="text-primary mb-4">C.	Jenis-Jenis Kekebalan dan Gangguan pada Sistem Pertahanan Tubuh </h2>

                                <h4>1.	Jenis-Jenis Kekebalan Tubuh</h4>
                                <img src="{{ asset('img/perbedaan_kekebalan.jpg') }}" alt="perbedaan kekebalan">
                                <p class="materi">Sel epitel merupakan garis pertahanan pertama tubuh saat terjadi infeksi, baik oleh antigen maupun mikroorganisme. Fungsi utama sel epitel adalah memberikan perlindungan melalui mekanisme kimiawi, mekanik, dan biologis. Sel-sel ini banyak ditemukan pada kulit, saluran pencernaan, paru-paru, serta pada mata, hidung, dan mulut.</p>

                                <h5>a.	Kekebalan Aktif</h5>
                                <p class="materi">Kekebalan aktif merupakan kekebalan yang dihasilkan oleh tubuh itu sendiri. Kekebalan ini dapat diperoleh secara alami dan secara buatan. Kekebalan aktif alami diperoleh setelah seseorang mengalami sakit akibat infeksi suatu kuman penyakit. Setelah sembuh dari sakit, orang tersebut akan menjadi kebal terhadap penyakit tersebut. Sebagai contoh, orang yang pernah sakit campak tidak akan terkena penyakit tersebut untuk kedua kalinya. 
                                Adapun kekebalan aktif buatan diperoleh melalui imunisasi misalnya dengan pemberian vaksin (vaksinasi). Vaksin merupakan siapan antigen yang diberikan secara oral (melalui mulut) atau melalui suntikan untuk merangsang mekanisme pertahanan tubuh terhadap patogen. Vaksin dapat berupa suspensi mikroorganisme yang telah dilemahkan atau dimatikan. Vaksin juga dapat berupa toksoid atau ekstrak antigen dari suatu patogen yang telah dilemahkan. Vaksin yang dimasukkan ke tubuh akan menstimulasi pembentukan antibodi untuk melawan antigen. Akibatnya, tubuh akan menjadi kebal terhadap penyakit jika suatu saat penyakit tersebut menyerang.
                                /p>

                                <h5>b.	Kekebalan Pasif</h5>
                                <p class="materi">Kekebalan pasif merupakan kekebalan yang diperoleh setelah menerima antibodi dari luar. Kekebalan ini dapat diperoleh secara alami dan buatan. Kekebalan pasif alami dapat ditemukan pada bayi setelah menerima antibodi dari ibunya melalui plasenta saat masih berada di dalam kandungan. Jenis kekebalan ini juga dapat diperoleh dengan pemberian air susu pertama (kolostrum) yang mengandung banyak antibodi. 
                                Sementara itu, kekebalan pasif buatan diperoleh dengan cara menyuntikkan antibodi yang diekstrak dari satu individu ke tubuh orang lain sebagai serum. Kekebalan pasif ini berlangsung singkat, tetapi berguna untuk penyembuhan secara cepat. Contoh pemberian serum antibisa ular kepada orang yang dipatuk ular berbisa.
                                </p>

                                <h4>2. Gangguan pada Sistem Pertahanan Tubuh</h4>
                                <p class="materi">Sistem pertahanan tubuh dapat mengalami gangguan mulai dari yang ringan seperti alergi hingga kasus yang serius seperti penyakit autoimunitas dan penyakit defisiensi kekebalan.</p>
                                
                                <h5>a.	Alergi</h5>
                                <p class="materi">Alergi atau hipersensitivitas adalah suatu respons imun yang berlebihan terhadap suatu senyawa yang masuk ke tubuh. Senyawa yang dapat menimbulkan alergi disebut alergen. Alergen dapat berupa debu, serbuk sari, gigitan serangga, rambut kucing, dan jenis makanan tertentu misal udang. 
                                Proses terjadinya alergi diawali dengan masuknya alergen ke tubuh. Alergen tersebut akan merangsang sel-sel B plasma untuk menyekresikan antibodi IgE. Alergen yang masuk ke tubuh pertama kali tidak akan menimbulkan gejala alergi. Namun, IgE yang terbentuk akan berikatan dengan mastosit. Akibatnya, ketika alergen masuk ke tubuh untuk kedua kalinya, alergen akan terikat pada IgE yang telah berikatan dengan mastosit. Keadaan ini mengakibatkan mastosit melepaskan histamin yang berperan dalam proses pembesaran dan peningkatan permeabilitas pembuluh darah (inflamasi). Respons inflamasi ini mengakibatkan timbulnya gejala alergi, misal bersin, kulit terasa gatal, mata berair, hidung berlendir, dan kesulitan bernapas. Pemberian antihistamin dapat menghentikan gejala alergi.
                                </p>

                                <h5>b.	Autoimunitas</h5>
                                <p class="materi">Autoimunitas merupakan gangguan pada sistem pertahanan tubuh saat antibodi yang diproduksi justru menyerang sel-sel tubuh sendiri karena tidak mampu membedakan sel tubuh sendiri dengan sel asing. Autoimunitas dapat disebabkan oleh gagalnya proses pematangan sel T di kelenjar timus. Autoimunitas dapat mengakibatkan beberapa kelainan yaitu diabetes melitus, myasthenia gravis, addison’s disease, lupus, dan radang sendi.</p>

                                <h5>c.	HIV – AIDS</h5>
                                <p class="materi">AIDS (Acquired Immunodeficiency Syndrome) merupakan kumpulan berbagai penyakit yang disebabkan oleh melemahnya sistem kekebalan tubuh. Penyakit ini disebabkan oleh infeksi HIV (Human Immunodeficiency Virus). Struktur HIV dapat dilihat pada Gambar 11.8. Virus tersebut menyerang sel T pembantu yang berfungsi menstimulasi pembentukan jenis sel T lainnya dan sel B plasma. Hal ini mengakibatkan kemampuan tubuh melawan kuman penyakit menjadi berkurang. 
                                <br> 
                                <img src="{{ asset('img/struktur_hiv.png') }}" alt="struktur hiv">
                                <br> 
                                Sel T pembantu menjadi target utama HIV karena pada permukaan selnya terdapat molekul CD4 sebagai reseptor. Infeksi dimulai ketika molekul glikoprotein (gp120) yang terdapat pada permukaan HIV menempel ke reseptor CD4 pada permukaan sel T pembantu. Virus tersebut kemudian masuk ke sel T pembantu secara endositosis dan memulai replikasi (memperbanyak diri). Selanjutnya, virus-virus baru keluar dari sel T yang terinfeksi secara eksositosis atau dengan cara melisiskan sel.
                                </p>
                                
                        `
                    },
                    'kuis-3': {
                        title: 'Kuis 3',
                        content: `
                            1.  Kekebalan aktif adalah kekebalan yang dihasilkan oleh ....<br>
                            a.	antibodi dari luar tubuh<br>
                            b.	tubuh itu sendiri<br>
                            c.	pemberian serum<br>
                            d.	plasenta ibu<br>
                            e.	kolostrum<br>
                            <br>
                            2.	 Kekebalan pasif alami dapat diperoleh melalui ....<br>
                            a.	vaksinasi<br>
                            b.	pemberian serum<br>
                            c.	plasenta ibu<br>
                            d.	infeksi penyakit<br>
                            e.	imunisasi<br>
                            <br>
                            3.	 Kekebalan aktif buatan dapat diperoleh melalui ....<br>
                            a.	pemberian kolostrum<br>
                            b.	pemberian serum antibisa ular<br>
                            c.	vaksinasi<br>
                            d.	plasenta ibu<br>
                            e.	infeksi alami<br>
                            <br>
                            4.	 Alergi terjadi karena respons imun yang berlebihan terhadap ....<br>
                            a.	virus<br>
                            b.	bakteri<br>
                            c.	alergen<br>
                            d.	sel kanker<br>
                            e.	sel tubuh sendiri<br>
                            <br>
                            5.	Jika seseorang mengalami alergi, gejala seperti bersin dan gatal-gatal terjadi karena ....<br>
                            a.	produksi antibodi IgE<br>
                            b.	pelepasan histamin oleh mastosit<br>
                            c.	serangan sel T pembunuh<br>
                            d.	aktivasi sistem komplemen<br>
                            e.	infeksi virus<br>
                            <br>
                            6.	Autoimunitas adalah gangguan sistem pertahanan tubuh di mana antibodi menyerang ....<br>
                            a.	virus<br>
                            b.	bakteri<br>
                            c.	sel tubuh sendiri<br>
                            d.	alergen<br>
                            e.	sel kanker<br>
                            <br>
                            7.	HIV menyerang sel T pembantu karena sel tersebut memiliki ....<br>
                            a.	reseptor CD4<br>
                            b.	antibodi IgE<br>
                            c.	histamin<br>
                            d.	sel mast<br>
                            e.	protein komplemen<br>
                            <br>
                            8.	Jika seseorang terinfeksi HIV, sistem kekebalan tubuh akan melemah karena ....<br>
                            a.	sel B plasma tidak dapat menghasilkan antibodi<br>
                            b.	sel T pembantu dihancurkan oleh virus<br>
                            c.	sel mast melepaskan histamin<br>
                            d.	sistem komplemen tidak aktif<br>
                            e.	sel NK menyerang sel tubuh sendiri<br>
                            <br>
                            9.	Kekebalan pasif buatan dapat diperoleh melalui ....<br>
                            a.	vaksinasi<br>
                            b.	pemberian serum<br>
                            c.	infeksi alami<br>
                            d.	plasenta ibu<br>
                            e.	kolostrum<br>
                            <br>
                            10.	Jika seseorang terkena penyakit autoimun seperti lupus, sistem kekebalan tubuh akan ....<br>
                            a.	menyerang sel tubuh sendiri<br>
                            b.	menghasilkan antibodi ige<br>
                            c.	melepaskan histamin<br>
                            d.	menghancurkan virus hiv<br>
                            e.	mengaktifkan sistem komplemen<br>
                            <br>


                        `
                    },
                    'evaluasi-1': {
                        title: 'Evaluasi',
                        content: `
                            1.	Perhatikan pernyataan-pernyataan berikut! 
                            1) Respons kekebalan humoral melibatkan peran sel B pengingat. 
                            2) Respons kekebalan humoral melibatkan makrofag untuk melawan antigen. 
                            3) Respons kekebalan seluler menghancurkan antigen dengan melibatkan makrofag. 4) Respons kekebalan seluler menyerang antigen dengan membentuk antibodi. Pernyataan yang tepat mengenai sistem kekebalan tubuh ditunjukkan oleh nomor .... 

                            <br>                        
                            a. 1) dan 2)
                            <br>  
                            b. 1) dan 3) 
                            <br> 
                            c. 2) dan 3)
                            <br> 
                            d. 2) dan 4) 
                            <br> 
                            e. 3) dan 4) 
                            <br>
                            <br>

                            2.	Perhatikan grafik perubahan konsentrasi sel T pada penderita AIDS berikut!
                            
                            Pernyataan berikut yang sesuai dengan grafik adalah . . . 
                            <br>                        
                            a. Jumlah sel T berkurang seiring bertambahnya waktu infeksi.<br>
                            b. Jumlah sel T bertambah seiring bertambahnya waktu infeksi.<br>
                            c. Infeksi virus HIV tidak memengaruhi jumlah sel T dalam darah.<br>
                            d. Pada awal infeksi HIV, jumlah sel T turun drastis.<br>
                            e. Seiring bertambahnya waktu infeksi, jumlah sel T semakin normal<br>
                            <br>
                            3.	Perhatikan tabel berikut! 
                            
                            Pasangan yang tepat antara jenis limfosit dengan fungsinya ditunjukkan oleh nomor ....
                            <br> 
                            a. I dan III <br>
                            b. I dan V <br>
                            c. II dan IV<br>
                            d. II dan V <br>
                            e. III dan IV <br>
                            <br>
                            4.	Antibodi ini banyak ditemukan dalam keringat dan berfungsi untuk mencegah infeksi pada epitelium. Gambar yang menunjukkan struktur antibodi yang dimaksud yaitu . . . 

                            <br>
                            Jawaban: d
                            5.	Protein komplemen berperan penting dalam sistem pertahanan tubuh. Senyawa ini membunuh bakteri penginfeksi dengan cara ....
                            <br>
                            a. menimbulkan respons peradangan (inflamasi)<br>
                            b. merangsang limfosit untuk membentuk antibodi<br>
                            c. membentuk lubang pada membran plasma bakteri<br>
                            d. menonaktifkan antigen pada permukaan sel bakteri<br>
                            e. memberikan sinyal pada makrofag untuk memfagosit bakteri<br>
                            <br>
                            6.	Ketika ada patogen dari jenis yang sama menyerang tubuh, sel B pengingat akan menstimulasi sel B pembelah untuk membentuk sel B plasma. Selanjutnya, sel B plasma akan membentuk antibodi untuk melawan patogen tersebut. Peristiwa tersebut menunjukkan mekanisme ....
                            <br>
                            a. respons imun primer<br>
                            b. respons imun seluler<br>
                            c. respons imun sekunder<br>
                            d. respons pertahanan spesifik<br>
                            e. respons pertahanan nonspesifik<br>
                            <br>
                            7.	Perhatikan pernyataan-pernyataan berikut! 
                            1) Enzim lisozim diproduksi untuk menghidrolisis dinding sel bakteri. 
                            2) Partikel berbahaya diperangkap dalam lendir. 
                            3) Mastosit mengeluarkan histamin dan prostaglandin. 
                            4) Sel-sel fagosit memakan patogen. 
                            5) Interferon mencegah virus bereplikasi. 
                            Pernyataan yang berhubungan dengan reaksi inflamasi ditunjukkan oleh nomor ....
                            <br>
                            a. 1) dan 2) <br>
                            b. 1) dan 3) <br>
                            c. 2) dan 3)<br>
                            d. 3) dan 4) <br>
                            e. 4) dan 5) <br>
                            <br>
                            8.	Alergi merupakan respons imun yang berlebihan terhadap senyawa yang masuk ke tubuh. Untuk menghentikan gejala alergi dapat dilakukan dengan pemberian . . . .
                            <br> 
                            a. vitamin <br>
                            b. penisilin <br>
                            c. parasetamol<br>
                            d. antihistamin <br>
                            e. antiinterferon <br>
                            <br>
                            9.	Lupus merupakan penyakit autoimunitas yang terjadi akibat . . . .
                            <br> 
                            a. antibodi menyerang otot lurik <br>
                            b. serangan virus terhadap sel T <br>
                            c. antibodi menyerang kelenjar adrenal <br>
                            d. antibodi menyerang sel-sel penyusun sendi <br>
                            e. peradangan oleh senyawa kimia hasil sekresi sel fagosit<br>
                            <br>
                            10.	Tubuh memproduksi berbagai jenis antibodi karena ...
                            <br> 
                            a. antibodi tidak dapat bekerja untuk kedua kalinya <br>
                            b. antigen pada setiap patogen bersifat spesifik <br>
                            c. beberapa antibodi ditujukan untuk satu jenis antigen <br>
                            d. satu jenis antigen dapat mengalahkan beberapa antibodi <br>
                            e. setelah melawan antigen, antibodi langsung dikeluarkan oleh tubuh<br>

                                
                        `
                    }
                    // Tambahkan mapping konten lainnya
                };

                const selectedContent = contentMap[contentType] || {
                    title: 'Konten Tidak Ditemukan',
                    content: '<p>Maaf, konten belum tersedia.</p>'
                };

                // Update konten
                pageTitle.textContent = selectedContent.title;
                contentBody.innerHTML = selectedContent.content;
            }

            // Tambahkan event listener untuk link konten
            document.querySelectorAll('.content-link').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const contentType = this.getAttribute('data-content');
                    loadContent(contentType);
                });
            });
        });
    </script>
    @endsection
</body>
</html>