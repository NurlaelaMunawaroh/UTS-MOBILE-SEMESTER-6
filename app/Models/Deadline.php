<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul;
use App\Models\Jadwal;

class Deadline extends Model
{
    protected $fillable = [
        'matkul_id',
        'jadwal_id',
        'judul_tugas',
        'tanggal_deadline',
        'deskripsi',
        'status',
        'notif_h1'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}