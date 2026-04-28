<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Matkul; // penting

class Jadwal extends Model
{
    protected $fillable = [
        'matkul_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruangan'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function deadlines()
    {
    return $this->hasMany(Deadline::class);
    }
}