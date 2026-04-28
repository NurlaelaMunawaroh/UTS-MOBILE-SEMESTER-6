<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Deadline;      
use App\Models\Notifikasi;    
use Carbon\Carbon;            

class CekDeadline extends Command
{
    protected $signature = 'app:cek-deadline';
    protected $description = 'Cek deadline H-1 dan buat notifikasi';

    public function handle()
    {
        $besok = Carbon::tomorrow();

        $data = Deadline::whereDate('tanggal_deadline', $besok)
            ->where('notif_h1', false)
            ->get();

        foreach ($data as $d) {
            Notifikasi::create([
                'judul' => 'Reminder Tugas',
                'pesan' => 'Tugas "' . $d->judul_tugas . '" deadline besok!'
            ]);

            $d->update(['notif_h1' => true]);
        }
    }
}