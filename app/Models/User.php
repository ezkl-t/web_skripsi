<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'nisn',
        'kelas',
        'level',
        'password',
        'password_plain',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'level' => 'siswa', // Default level ke siswa
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Override username field untuk authentication
     * Laravel default menggunakan 'email', kita ganti ke 'nisn'
     */
    public function getAuthIdentifierName()
    {
        return 'nisn';
    }

    /**
     * Otomatis simpan plain text dan hash password saat password di-set
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = Hash::make($value); // Hash untuk login
            $this->attributes['password_plain'] = $value;       // Simpan plain text
        }
    }

    /**
     * Scope untuk filter siswa saja
     */
    public function scopeSiswa($query)
    {
        return $query->where('level', 'siswa');
    }

    /**
     * Scope untuk filter berdasarkan kelas
     */
    public function scopeByKelas($query, $kelas)
    {
        return $query->where('kelas', $kelas);
    }

    /**
     * Get formatted name with NISN
     */
    public function getFormattedNameAttribute()
    {
        return $this->name . ' (' . $this->nisn . ')';
    }

    /**
     * Check if user is admin/guru
     */
    public function isAdmin()
    {
        return in_array($this->level, ['admin', 'guru']);
    }

    /**
     * Check if password matches (support both hashed and plain text)
     */
    public function checkPassword($password)
    {
        // Jika password di database sudah di-hash (dimulai dengan $2y$)
        if (Hash::needsRehash($this->password) === false) {
            return Hash::check($password, $this->password);
        }
        
        // Jika password masih plain text (untuk data lama)
        return $password === $this->password;
    }

    /**
     * Check if user is siswa
     */
    public function isSiswa()
    {
        return $this->level === 'siswa';
    }

    /**
     * Relasi ke hasil kuis
     */
    public function hasilKuis()
    {
        return $this->hasMany(HasilKuis::class);
    }

    /**
     * Relasi ke progres siswa
     */
    public function progresSiswa()
    {
        return $this->hasMany(ProgresSiswa::class);
    }

    /**
     * Get hasil kuis terbaru untuk kuis tertentu
     */
    public function getLatestQuizResult($namaKuis)
    {
        return $this->hasilKuis()
                    ->where('nama_kuis', $namaKuis)
                    ->orderBy('tanggal_kuis', 'desc')
                    ->first();
    }

    /**
     * Get rata-rata nilai semua kuis
     */
    public function getAverageScore()
    {
        return $this->hasilKuis()->avg('nilai');
    }

    /**
     * Check if user has completed a quiz
     */
    public function hasCompletedQuiz($namaKuis)
    {
        return $this->hasilKuis()->where('nama_kuis', $namaKuis)->exists();
    }

    /**
     * Get progres aktivitas tertentu
     */
    public function getProgresAktivitas($namaAktivitas)
    {
        return $this->progresSiswa()->where('nama_aktivitas', $namaAktivitas)->first();
    }

    /**
     * Check if user has completed aktivitas
     */
    public function hasCompletedAktivitas($namaAktivitas)
    {
        return $this->progresSiswa()
                    ->where('nama_aktivitas', $namaAktivitas)
                    ->where('status', 'completed')
                    ->exists();
    }

    /**
     * Get total aktivitas yang sudah diselesaikan
     */
    public function getTotalAktivitasSelesai()
    {
        return $this->progresSiswa()->where('status', 'completed')->count();
    }

    /**
     * Get persentase progres keseluruhan
     */
    public function getPersentaseProgresKeseluruhan($totalAktivitas = 1)
    {
        $selesai = $this->getTotalAktivitasSelesai();
        return $totalAktivitas > 0 ? round(($selesai / $totalAktivitas) * 100, 2) : 0;
    }
}