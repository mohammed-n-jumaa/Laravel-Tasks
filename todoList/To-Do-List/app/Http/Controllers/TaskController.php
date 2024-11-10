<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // عرض قائمة المهام
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // إضافة مهمة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Task::create(['title' => $request->title]);
        return redirect()->back();
    }

    // تحديث حالة المهمة (اكتملت أم لا)
    public function update(Request $request, Task $task)
    {
        // تأكد من أن القيمة العددية ترسل للحقل
        $task->update([
            'is_completed' => $request->has('is_completed') ? 1 : 0,
        ]);
    
        return redirect()->back();
    }
    

    // حذف مهمة
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
