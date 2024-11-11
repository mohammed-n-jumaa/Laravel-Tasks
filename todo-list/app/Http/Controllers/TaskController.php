<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // وظيفة عرض المهام والتحقق من صلاحيات الأدمن باستخدام الرمز
    public function index(Request $request)
    {
        $isAdmin = $request->input('admin_code') === '1234'; // رمز الإدمن للتحقق
        $tasks = Task::all();
        return view('tasks.index', compact('tasks', 'isAdmin'));
    }

    // وظيفة إضافة مهمة جديدة
    public function store(Request $request)
    {
        $request->validate(['task' => 'required|string']); // التحقق من صحة المدخلات

        Task::create([
            'task' => $request->task,
        ]);

        return redirect()->back();
    }

    // وظيفة حذف مهمة، متاحة للأدمن فقط
    public function destroy(Task $task)
{
    $task->delete();
    return redirect()->back();
}


    // وظيفة تغيير حالة إكمال المهمة، متاحة للأدمن فقط
    public function toggleComplete(Task $task)
    {
        $task->is_completed = !$task->is_completed;
        $task->save();
    
        return redirect()->back();
    }
}
