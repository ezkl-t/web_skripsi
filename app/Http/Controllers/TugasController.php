<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TugasController extends Controller
{
    //
    public function showTugas1_0(){
        return view('tugas/stimulus-1');
    }
    
    public function showTugas1()
    {
        // Data untuk drag and drop
    $komponen = [
        'kulit' => 'Kulit',
        'selb' => 'Sel B',
        'histamin' => 'Histamin',
        'selt' => 'Sel T Sitotoksik',
        'netralisasi' => 'Netralisasi',
    ];

    $fungsi = [
        'kulit' => 'Menghalangi masuknya patogen',
        'selb' => 'Memproduksi antibodi',
        'histamin' => 'Memicu pelebaran pembuluh darah',
        'selt' => 'Menghancurkan sel terinfeksi',
        'netralisasi' => 'Menonaktifkan antigen',
    ];


        return view('tugas/pengolahan-data-1',  compact('komponen', 'fungsi'));
    }

    public function showTugas1_1() {
        return view('tugas/identifikasi-masalah-1');
    }

    public function showTugas1_2() {
        return view('tugas/pengumpulan-data-1');
    }

    public function showTugas1_4() {
        return view('tugas/verifikasi-1');
    }
    public function showTugas1_5() {
        return view('tugas/kesimpulan-1');
    }

    public function showTugas2_0(){
        return view('tugas/stimulus-2');
    }
    
    public function showTugas2() {
        return view('tugas/identifikasi-masalah-2');
    }
    public function showTugas2_2(){
        return view('tugas/pengumpulan-data-2');
    }

    public function showTugas2_3(){
        return view('tugas/pengolahan-data-2');
    }

    public function showTugas2_4(){
        return view('tugas/verifikasi-2');
    }

    public function showTugas2_5(){
        return view('tugas/kesimpulan-2');
    }

    public function showTugas3_1(){
        return view('tugas/stimulus-3');
    }

    public function showTugas3_2(){
        return view('tugas/identifikasi-masalah-3');
    }
    public function showTugas3_3(){
        return view('tugas/pengumpulan-data-3');
    }
    
    public function showTugas3_4(){
        return view('tugas/pengolahan-data-3');
    }

    public function showTugas3_5(){
        return view('tugas/verifikasi-3');
    }

    public function showTugas3_6(){
        return view('tugas/kesimpulan-3');
    }
}
