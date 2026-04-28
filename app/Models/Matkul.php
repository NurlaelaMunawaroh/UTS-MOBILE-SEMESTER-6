<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $fillable = [
    'kode_matkul',
    'nama_matkul',
    'sks'
];

public function jadwals()
{
    return $this->hasMany(Jadwal::class);
}

public function deadlines()
{
    return $this->hasMany(Deadline::class);
}
}
