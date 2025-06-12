<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_kuis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nama_kuis'); // 'kuis1', 'kuis2', etc
            $table->integer('total_soal');
            $table->integer('jawaban_benar');
            $table->integer('jawaban_salah');
            $table->decimal('nilai', 5, 2); // Nilai dalam format 0.00 - 100.00
            $table->json('detail_jawaban')->nullable(); // Menyimpan detail jawaban user
            $table->integer('waktu_pengerjaan')->nullable(); // Dalam detik
            $table->timestamp('tanggal_kuis');
            $table->timestamps();
            
            // Index untuk performa
            $table->index(['user_id', 'nama_kuis']);
            $table->index('tanggal_kuis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_kuis');
    }
};