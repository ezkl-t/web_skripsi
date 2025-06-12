<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Soal;

class UpdateKuis1TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update semua soal yang belum memiliki kuis_type menjadi 'kuis1'
        Soal::whereNull('kuis_type')
            ->orWhere('kuis_type', '')
            ->update(['kuis_type' => 'kuis1']);
            
        $this->command->info('Updated existing soal to have kuis_type = kuis1');
    }
}