<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'mata_kuliah',
        'deadline',
    ];
    public function getIsDoneAttribute($value)
    {
    return $value ? 'sudah' : 'belum';
    }
}