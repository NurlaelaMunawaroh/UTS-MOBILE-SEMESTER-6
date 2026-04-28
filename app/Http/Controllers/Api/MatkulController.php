<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index()
    {
        return response()->json(Matkul::all());
    }

    public function store(Request $request)
    {
        $matkul = Matkul::create($request->all());
        return response()->json($matkul, 201);
    }

    public function show($id)
    {
        return response()->json(Matkul::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $matkul = Matkul::findOrFail($id);
        $matkul->update($request->all());
        return response()->json($matkul);
    }

    public function destroy($id)
    {
        Matkul::destroy($id);
        return response()->json(['message' => 'Deleted']);
    }
}