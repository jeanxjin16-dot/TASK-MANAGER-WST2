<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        Task::create($request->all());

        return response('', 302)->header('Location', '/');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        Task::findOrFail($id)->update($validated);

        return response('', 302)->header('Location', '/');
    }

    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return response('', 302)->header('Location', '/');
    }
}
