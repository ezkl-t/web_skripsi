<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';
    
    protected $fillable = [
        'pertanyaan',
        'kuis_type'
    ];

    // Relasi ke jawaban (one-to-many)
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    // Relasi ke jawaban benar (one-to-one)
    public function jawabanBenar()
    {
        return $this->hasOne(Jawaban::class)->where('is_benar', true);
    }

    // Scope untuk filter berdasarkan tipe kuis
    public function scopeByKuisType($query, $kuisType)
    {
        return $query->where('kuis_type', $kuisType);
    }

    // Scope untuk kuis 1
    public function scopeKuis1($query)
    {
        return $query->where('kuis_type', 'kuis1');
    }

    // Scope untuk kuis 2
    public function scopeKuis2($query)
    {
        return $query->where('kuis_type', 'kuis2');
    }

    // Scope untuk kuis 3
    public function scopeKuis3($query)
    {
        return $query->where('kuis_type', 'kuis3');
    }

    // Method untuk mendapatkan nomor soal berdasarkan tipe kuis
    public function getSoalNumberAttribute()
    {
        return $this->where('kuis_type', $this->kuis_type)
                    ->where('id', '<=', $this->id)
                    ->count();
    }

    // Method untuk mendapatkan total soal berdasarkan tipe kuis
    public static function getTotalSoalByType($kuisType)
    {
        return self::where('kuis_type', $kuisType)->count();
    }

    // Method untuk mendapatkan soal dengan jawaban berdasarkan tipe kuis
    public static function getSoalWithJawabanByType($kuisType)
    {
        return self::with(['jawaban', 'jawabanBenar'])
                   ->where('kuis_type', $kuisType)
                   ->orderBy('id')
                   ->get();
    }
}