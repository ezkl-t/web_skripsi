<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ProgresSiswa extends Model
{
    use HasFactory;

    protected $table = 'progres_siswa';

    protected $fillable = [
        'user_id',
        'nama_aktivitas',
        'judul_aktivitas',
        'status',
        'skor',
        'total_soal',
        'tanggal_mulai',
        'tanggal_selesai',
        'detail_jawaban'
    ];

    protected $casts = [
        'detail_jawaban' => 'array',
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime'
    ];

    /**
     * Relasi ke model User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk filter berdasarkan status
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeIncomplete($query)
    {
        return $query->where('status', 'incomplete');
    }

    /**
     * Scope untuk filter berdasarkan aktivitas
     */
    public function scopeByAktivitas($query, $namaAktivitas)
    {
        return $query->where('nama_aktivitas', $namaAktivitas);
    }

    /**
     * Get persentase progres
     */
    public function getPersentaseAttribute()
    {
        if ($this->status === 'completed') {
            return 100;
        }
        
        if ($this->total_soal && $this->skor) {
            return round(($this->skor / $this->total_soal) * 100, 2);
        }
        
        return 0;
    }

    /**
     * Get formatted status
     */
    public function getStatusFormatAttribute()
    {
        return $this->status === 'completed' ? 'Selesai' : 'Belum Selesai';
    }

    /**
     * Get waktu pengerjaan
     */
    public function getWaktuPengerjaanAttribute()
    {
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            $mulai = Carbon::parse($this->tanggal_mulai);
            $selesai = Carbon::parse($this->tanggal_selesai);
            
            $durasi = $selesai->diff($mulai);
            
            if ($durasi->h > 0) {
                return $durasi->h . ' jam ' . $durasi->i . ' menit';
            } else {
                return $durasi->i . ' menit ' . $durasi->s . ' detik';
            }
        }
        
        return null;
    }

    /**
     * Static method untuk mencatat progres
     */
    public static function catatProgres($userId, $namaAktivitas, $judulAktivitas, $skor, $totalSoal, $detailJawaban = null)
    {
        $status = ($skor === $totalSoal) ? 'completed' : 'incomplete';
        
        return self::updateOrCreate(
            [
                'user_id' => $userId,
                'nama_aktivitas' => $namaAktivitas
            ],
            [
                'judul_aktivitas' => $judulAktivitas,
                'status' => $status,
                'skor' => $skor,
                'total_soal' => $totalSoal,
                'tanggal_mulai' => now(),
                'tanggal_selesai' => $status === 'completed' ? now() : null,
                'detail_jawaban' => $detailJawaban
            ]
        );
    }

    /**
     * Get progres per kelas
     */
    public static function getProgresByKelas($kelas = null)
    {
        $query = self::with('user');
        
        if ($kelas) {
            $query->whereHas('user', function($q) use ($kelas) {
                $q->where('kelas', $kelas);
            });
        }
        
        return $query->get();
    }

    /**
     * Get statistik progres
     */
    public static function getStatistikProgres($namaAktivitas = null)
    {
        $query = self::query();
        
        if ($namaAktivitas) {
            $query->where('nama_aktivitas', $namaAktivitas);
        }
        
        return [
            'total_siswa' => $query->count(),
            'selesai' => $query->where('status', 'completed')->count(),
            'belum_selesai' => $query->where('status', 'incomplete')->count(),
            'rata_rata_skor' => $query->avg('skor')
        ];
    }
}