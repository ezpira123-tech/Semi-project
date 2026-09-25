<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Show all tasks
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    // Show Add Task page
    public function create()
    {
        return view('tasks.create');
    }

    // Save new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);
            return redirect()->away(
                    'https://cuddly-funicular-6v5964j7qxx934q9j-8000.app.github.dev/tasks'
                );
    }

    // Show Edit Task page
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    // Update task
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'task_name' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        $task->update([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

                    return redirect()->away(
                'https://cuddly-funicular-6v5964j7qxx934q9j-8000.app.github.dev/tasks'
            );
    }

    // Delete task
        public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()->away(
            'https://cuddly-funicular-6v5964j7qxx934q9j-8000.app.github.dev/tasks'
        );
    }
}