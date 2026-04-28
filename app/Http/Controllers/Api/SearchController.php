<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matkul;
use App\Models\Jadwal;
use App\Models\Deadline;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->q;

        if (!$keyword) {
            return response()->json([
                'message' => 'Masukkan keyword pencarian'
            ], 400);
        }

        // 🔍 MATKUL
        $matkul = Matkul::where(function($q) use ($keyword) {
            $q->where('nama_matkul', 'like', "%$keyword%")
              ->orWhere('kode_matkul', 'like', "%$keyword%");
        })->get();

        // 🔍 JADWAL + RELASI MATKUL
        $jadwal = Jadwal::with('matkul')
            ->where(function($q) use ($keyword) {
                $q->where('hari', 'like', "%$keyword%")
                  ->orWhere('ruangan', 'like', "%$keyword%");
            })
            ->orWhereHas('matkul', function($q) use ($keyword){
                $q->where('nama_matkul', 'like', "%$keyword%");
            })
            ->get();

        // 🔍 DEADLINE + RELASI
        $deadline = Deadline::with(['matkul','jadwal'])
            ->where(function($q) use ($keyword) {
                $q->where('judul_tugas', 'like', "%$keyword%");
            })
            ->orWhereHas('matkul', function($q) use ($keyword){
                $q->where('nama_matkul', 'like', "%$keyword%");
            })
            ->get();

        // 🔍 USER / PROFIL
        $user = User::where(function($q) use ($keyword) {
            $q->where('name', 'like', "%$keyword%")
              ->orWhere('email', 'like', "%$keyword%");
        })->get();

        return response()->json([
            'matkul' => $matkul,
            'jadwal' => $jadwal,
            'deadline' => $deadline,
            'user' => $user
        ]);
    }
}