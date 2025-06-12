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
        Schema::create('pengaturan_kkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kuis')->unique(); // Nama kuis (kuis1, kuis2, kuis3, evaluasi)
            $table->string('judul_kuis'); // Judul yang ditampilkan
            $table->decimal('nilai_kkm', 5, 2)->default(70.00); // Nilai KKM (misal: 75.50)
            $table->boolean('is_active')->default(true); // Status aktif/nonaktif
            $table->text('deskripsi')->nullable(); // Deskripsi kuis
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaturan_kkm');
    }
};