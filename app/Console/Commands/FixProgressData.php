<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProgresSiswa;

class FixProgressData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:progress-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix existing progress data to match the correct activity names';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Fixing progress data...');
        
        // Mapping untuk memperbaiki nama aktivitas yang mungkin salah
        $activityMapping = [
            'pengumpulan-data-1' => 'Pengumpulan Data 1',
            'pengolahan-data-1' => 'Pengolahan Data 1',
        ];
        
        // Update judul_aktivitas yang salah
        foreach ($activityMapping as $namaAktivitas => $judulAktivitas) {
            $updated = ProgresSiswa::where('nama_aktivitas', $namaAktivitas)
                ->where('judul_aktivitas', '!=', $judulAktivitas)
                ->update(['judul_aktivitas' => $judulAktivitas]);
                
            if ($updated > 0) {
                $this->info("Updated {$updated} records for {$namaAktivitas} with correct judul_aktivitas");
            }
        }
        
        // Tampilkan data yang ada
        $allProgress = ProgresSiswa::select('nama_aktivitas', 'judul_aktivitas')
            ->distinct()
            ->get();
            
        $this->info("\nCurrent unique activities in database:");
        $this->table(['Nama Aktivitas', 'Judul Aktivitas'], $allProgress);
        
        // Hitung statistik per siswa
        $siswaStats = ProgresSiswa::selectRaw('user_id, COUNT(DISTINCT nama_aktivitas) as total_aktivitas, 
                                               SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed')
            ->groupBy('user_id')
            ->with('user:id,name,nisn,kelas')
            ->get();
            
        $this->info("\nProgress statistics per student:");
        $headers = ['Nama', 'NISN', 'Kelas', 'Aktivitas Selesai', 'Total Aktivitas', 'Persentase'];
        $rows = $siswaStats->map(function($stat) {
            $persentase = $stat->total_aktivitas > 0 
                ? round(($stat->completed / $stat->total_aktivitas) * 100, 2) . '%'
                : '0%';
                
            return [
                $stat->user->name ?? 'Unknown',
                $stat->user->nisn ?? '-',
                $stat->user->kelas ?? '-',
                $stat->completed,
                $stat->total_aktivitas,
                $persentase
            ];
        });
        
        $this->table($headers, $rows);
        
        // Hitung statistik per aktivitas
        $stats = ProgresSiswa::selectRaw('nama_aktivitas, COUNT(*) as total, 
                                          SUM(CASE WHEN status = "completed" THEN 1 ELSE 0 END) as completed')
            ->groupBy('nama_aktivitas')
            ->get();
            
        $this->info("\nActivity completion statistics:");
        $this->table(['Aktivitas', 'Total Siswa', 'Selesai', 'Persentase'], 
            $stats->map(function($stat) {
                $persentase = $stat->total > 0 
                    ? round(($stat->completed / $stat->total) * 100, 2) . '%'
                    : '0%';
                    
                return [
                    $stat->nama_aktivitas,
                    $stat->total,
                    $stat->completed,
                    $persentase
                ];
            })
        );
        
        $this->info('Done!');
    }
}