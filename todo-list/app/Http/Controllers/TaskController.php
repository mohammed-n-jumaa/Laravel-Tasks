<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index(Request $request)
    {
        $isAdmin = $request->input('admin_code') === '1234'; 
        $tasks = Task::all();
        return view('tasks.index', compact('tasks', 'isAdmin'));
    }

    public function store(Request $request)
    {
        $request->validate(['task' => 'required|string']); 

        Task::create([
            'task' => $request->task,
        ]);

        return redirect()->back();
    }

    public function destroy(Task $task)
{
    $task->delete();
    return redirect()->back();
}


    public function toggleComplete(Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();
    
        return redirect()->back();
    }
public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}

// edit Button
public function update(Request $request, Task $task)
{
    $request->validate([
        'task' => 'required|string',
    ]);

    $task->task = $request->task;
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
}

}
