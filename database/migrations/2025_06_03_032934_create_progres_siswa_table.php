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
        Schema::create('progres_siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_aktivitas'); // contoh: 'pengolahan-data-1'
            $table->string('judul_aktivitas'); // contoh: 'Pengolahan Data 1'
            $table->enum('status', ['incomplete', 'completed'])->default('incomplete');
            $table->integer('skor')->nullable(); // skor yang didapat
            $table->integer('total_soal')->nullable(); // total soal dalam aktivitas
            $table->timestamp('tanggal_mulai')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->json('detail_jawaban')->nullable(); // menyimpan detail jawaban siswa
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Unique constraint untuk mencegah duplikasi aktivitas per siswa
            $table->unique(['user_id', 'nama_aktivitas']);
            
            // Index untuk performa
            $table->index(['user_id', 'status']);
            $table->index('nama_aktivitas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progres_siswa');
    }
};