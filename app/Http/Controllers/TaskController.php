<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   public function dashboard(Request $request)
{
    $tasks = Task::where('user_id', $request->user()->id);

    return response()->json([
        'total_task' => $tasks->count(),
        'selesai' => (clone $tasks)->where('is_done', 1)->count(),
        'belum' => (clone $tasks)->where('is_done', 0)->count(),
    ]);
} 
    public function index(Request $request)
    {
    $query = Task::where('user_id', $request->user()->id);

    // FILTER STATUS
    if ($request->has('is_done')) {
        $query->where('is_done', $request->is_done);
    }

    if ($request->has('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $task = Task::create([
            'user_id' => $request->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'Matkul' => $request->Matkul,
            'deadline' => $request->deadline,
        ]);

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('user_id', $request->user()->id)->findOrFail($id);
        $task->update($request->all());

        return response()->json($task);
    }

    public function destroy(Request $request, $id)
    {
        $task = Task::where('user_id', $request->user()->id)->findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task dihapus']);
    }

    public function show(Request $request, $id)
{
    $task = Task::where('user_id', $request->user()->id)
                ->findOrFail($id);

    return response()->json($task);
}
}