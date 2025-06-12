<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengaturanKKM extends Model
{
    use HasFactory;

    protected $table = 'pengaturan_kkm';

    protected $fillable = [
        'nama_kuis',
        'judul_kuis',
        'nilai_kkm',
        'is_active',
        'deskripsi'
    ];

    protected $casts = [
        'nilai_kkm' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    /**
     * Get KKM untuk kuis tertentu
     */
    public static function getKkmByNamaKuis($namaKuis)
    {
        $setting = self::where('nama_kuis', $namaKuis)
                      ->where('is_active', true)
                      ->first();
        
        return $setting ? $setting->nilai_kkm : 70; // Default 70 jika tidak ada setting
    }

    /**
     * Get semua KKM yang aktif
     */
    public static function getAllActiveKkm()
    {
        return self::where('is_active', true)
                   ->pluck('nilai_kkm', 'nama_kuis')
                   ->toArray();
    }

    /**
     * Check apakah nilai memenuhi KKM
     */
    public static function isLulus($namaKuis, $nilai)
    {
        $kkm = self::getKkmByNamaKuis($namaKuis);
        return $nilai >= $kkm;
    }

    /**
     * Get status text berdasarkan KKM
     */
    public static function getStatusText($namaKuis, $nilai)
    {
        return self::isLulus($namaKuis, $nilai) ? 'Tuntas' : 'Belum Tuntas';
    }

    /**
     * Get status class untuk CSS berdasarkan KKM
     */
    public static function getStatusClass($namaKuis, $nilai)
    {
        return self::isLulus($namaKuis, $nilai) ? 'success' : 'danger';
    }

    /**
     * Update KKM untuk kuis tertentu
     */
    public static function updateKkm($namaKuis, $nilaiKkm)
    {
        return self::updateOrCreate(
            ['nama_kuis' => $namaKuis],
            ['nilai_kkm' => $nilaiKkm]
        );
    }

    /**
     * Get formatted nilai KKM
     */
    public function getFormattedKkmAttribute()
    {
        return number_format($this->nilai_kkm, 1);
    }

    /**
     * Scope untuk KKM aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get KKM mapping untuk semua kuis aktif
     */
    public static function getKkmMapping()
    {
        return self::active()
                   ->get()
                   ->pluck('nilai_kkm', 'nama_kuis')
                   ->toArray();
    }

    /**
     * Get statistik ketuntasan untuk kuis tertentu
     */
    public static function getStatistikKetuntasan($namaKuis)
    {
        $kkm = self::getKkmByNamaKuis($namaKuis);
        
        $totalSiswa = HasilKuis::where('nama_kuis', $namaKuis)->count();
        $siswaTuntas = HasilKuis::where('nama_kuis', $namaKuis)
                                ->where('nilai', '>=', $kkm)
                                ->count();
        $siswaBelumTuntas = $totalSiswa - $siswaTuntas;
        
        $persentaseTuntas = $totalSiswa > 0 ? round(($siswaTuntas / $totalSiswa) * 100, 2) : 0;
        
        return [
            'kkm' => $kkm,
            'total_siswa' => $totalSiswa,
            'siswa_tuntas' => $siswaTuntas,
            'siswa_belum_tuntas' => $siswaBelumTuntas,
            'persentase_tuntas' => $persentaseTuntas
        ];
    }
}