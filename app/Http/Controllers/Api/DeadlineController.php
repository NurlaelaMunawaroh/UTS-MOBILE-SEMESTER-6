<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deadline;
use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    // 🔹 GET semua data
    public function index()
    {
        return response()->json(
            Deadline::with(['matkul','jadwal'])->get()
        );
    }

    // 🔹 POST tambah data
    public function store(Request $request)
    {
        $data = $request->validate([
            'matkul_id' => 'required',
            'jadwal_id' => 'nullable',
            'judul_tugas' => 'required',
            'tanggal_deadline' => 'required|date',
            'deskripsi' => 'nullable'
        ]);

        // otomatis status awal
        $data['status'] = 'belum';

        $deadline = Deadline::create($data);

        return response()->json($deadline, 201);
    }

    // 🔹 GET detail
    public function show($id)
    {
        return response()->json(
            Deadline::with(['matkul','jadwal'])->findOrFail($id)
        );
    }

    // 🔹 UPDATE data (status / lainnya)
    public function update(Request $request, $id)
    {
        $deadline = Deadline::findOrFail($id);

        $data = $request->validate([
            'status' => 'in:belum,selesai'
        ]);

        $deadline->update($data);

        return response()->json($deadline);
    }

    // 🔹 DELETE
    public function destroy($id)
    {
        Deadline::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }

    // 🔥 TOGGLE STATUS (fitur tambahan)
    public function updateStatus($id)
    {
        $deadline = Deadline::findOrFail($id);

        $deadline->status = $deadline->status == 'belum' ? 'selesai' : 'belum';
        $deadline->save();

        return response()->json([
            'message' => 'Status berhasil diubah',
            'data' => $deadline
        ]);
    }
}