<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class HasilKuis extends Model
{
    use HasFactory;

    protected $table = 'hasil_kuis';

    protected $fillable = [
        'user_id',
        'nama_kuis',
        'total_soal',
        'jawaban_benar',
        'jawaban_salah',
        'nilai',
        'detail_jawaban',
        'waktu_pengerjaan',
        'tanggal_kuis',
    ];

    protected $casts = [
        'detail_jawaban' => 'array',
        'tanggal_kuis' => 'datetime',
        'nilai' => 'decimal:2',
    ];

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get formatted nilai
     */
    public function getFormattedNilaiAttribute()
    {
        return number_format($this->nilai, 2);
    }

    /**
     * Get persentase benar
     */
    public function getPersentaseBenarAttribute()
    {
        return $this->total_soal > 0 ? round(($this->jawaban_benar / $this->total_soal) * 100, 2) : 0;
    }

    /**
     * Get formatted waktu pengerjaan
     */
    public function getFormattedWaktuAttribute()
    {
        if (!$this->waktu_pengerjaan) return '-';
        
        $minutes = floor($this->waktu_pengerjaan / 60);
        $seconds = $this->waktu_pengerjaan % 60;
        
        return sprintf('%02d:%02d', $minutes, $seconds);
    }

    /**
     * Get status nilai (A, B, C, D, E)
     */
    public function getGradeAttribute()
    {
        if ($this->nilai >= 90) return 'A';
        if ($this->nilai >= 80) return 'B';
        if ($this->nilai >= 70) return 'C';
        if ($this->nilai >= 60) return 'D';
        return 'E';
    }

    /**
     * Get status lulus/tidak lulus BERDASARKAN KKM
     */
    public function getStatusAttribute()
    {
        return PengaturanKKM::getStatusText($this->getKuisType(), $this->nilai);
    }

    /**
     * Get status class untuk CSS berdasarkan KKM
     */
    public function getStatusClassAttribute()
    {
        return PengaturanKKM::getStatusClass($this->getKuisType(), $this->nilai);
    }

    /**
     * Check apakah nilai memenuhi KKM
     */
    public function isTuntas()
    {
        return PengaturanKKM::isLulus($this->getKuisType(), $this->nilai);
    }

    /**
     * Get KKM untuk kuis ini
     */
    public function getKkm()
    {
        return PengaturanKKM::getKkmByNamaKuis($this->getKuisType());
    }

    /**
     * Convert nama_kuis ke tipe kuis untuk mapping KKM
     */
    private function getKuisType()
    {
        $namaKuis = strtolower($this->nama_kuis);
        
        // Mapping nama kuis yang ada di database ke tipe KKM
        $mapping = [
            'kuis 1' => 'kuis1',
            'kuis1' => 'kuis1',
            'quiz 1' => 'kuis1',
            'kuis_1' => 'kuis1',
            
            'kuis 2' => 'kuis2',
            'kuis2' => 'kuis2',
            'quiz 2' => 'kuis2',
            'kuis_2' => 'kuis2',
            
            'kuis 3' => 'kuis3',
            'kuis3' => 'kuis3',
            'quiz 3' => 'kuis3',
            'kuis_3' => 'kuis3',
            
            'evaluasi' => 'evaluasi',
            'ujian' => 'evaluasi',
            'evaluasi akhir' => 'evaluasi',
        ];

        // Cek exact match dulu
        if (isset($mapping[$namaKuis])) {
            return $mapping[$namaKuis];
        }

        // Cek partial match
        foreach ($mapping as $pattern => $type) {
            if (strpos($namaKuis, $pattern) !== false) {
                return $type;
            }
        }

        // Default fallback
        return 'kuis1';
    }

    /**
     * Get badge class berdasarkan status ketuntasan
     */
    public function getKetuntasanBadgeAttribute()
    {
        return $this->isTuntas() ? 'badge-success' : 'badge-danger';
    }

    /**
     * Get text ketuntasan
     */
    public function getKetuntasanTextAttribute()
    {
        return $this->isTuntas() ? 'Tuntas' : 'Belum Tuntas';
    }

    /**
     * Scope untuk kuis tertentu
     */
    public function scopeKuis($query, $namaKuis)
    {
        return $query->where('nama_kuis', $namaKuis);
    }

    /**
     * Scope untuk user tertentu
     */
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Scope untuk hasil yang tuntas
     */
    public function scopeTuntas($query)
    {
        $kkmMapping = PengaturanKKM::getKkmMapping();
        
        return $query->where(function($q) use ($kkmMapping) {
            foreach ($kkmMapping as $namaKuis => $kkm) {
                $q->orWhere(function($subQ) use ($namaKuis, $kkm) {
                    $subQ->where('nama_kuis', 'like', '%' . $namaKuis . '%')
                         ->where('nilai', '>=', $kkm);
                });
            }
        });
    }

    /**
     * Get hasil kuis terbaru untuk user dan kuis tertentu
     */
    public static function getLatestResult($userId, $namaKuis)
    {
        return self::where('user_id', $userId)
                   ->where('nama_kuis', $namaKuis)
                   ->orderBy('tanggal_kuis', 'desc')
                   ->first();
    }

    /**
     * Hitung rata-rata nilai untuk kuis tertentu
     */
    public static function getAverageScore($namaKuis)
    {
        return self::where('nama_kuis', $namaKuis)->avg('nilai');
    }

    /**
     * Get statistik ketuntasan untuk kuis tertentu
     */
    public static function getStatistikKetuntasan($namaKuis)
    {
        return PengaturanKKM::getStatistikKetuntasan($namaKuis);
    }
}