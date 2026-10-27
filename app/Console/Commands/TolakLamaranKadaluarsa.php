<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Lamaran;
use Carbon\Carbon;

class TolakLamaranKadaluarsa extends Command
{
    protected $signature = 'lamaran:tolak-kadaluarsa';
    protected $description = 'Menolak lamaran yang tidak direspons perusahaan dalam 3 minggu';

    public function handle()
    {
        $batasWaktu = Carbon::now()->subMinutes(1);

        $jumlah = Lamaran::where('status', 'diproses')
            ->where('created_at', '<=', $batasWaktu)
            ->update(['status' => 'ditolak']);

        $this->info("Selesai: {$jumlah} lamaran otomatis ditolak.");
        return Command::SUCCESS;
    }
}