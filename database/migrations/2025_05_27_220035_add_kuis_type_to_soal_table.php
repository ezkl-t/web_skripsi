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
        Schema::table('soal', function (Blueprint $table) {
            // Tambahkan kolom kuis_type jika belum ada
            if (!Schema::hasColumn('soal', 'kuis_type')) {
                $table->string('kuis_type')->default('kuis1')->after('pertanyaan');
                $table->index('kuis_type');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soal', function (Blueprint $table) {
            if (Schema::hasColumn('soal', 'kuis_type')) {
                $table->dropIndex(['kuis_type']);
                $table->dropColumn('kuis_type');
            }
        });
    }
};