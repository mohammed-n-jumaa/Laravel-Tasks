@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">To-Do List</h1>

    <!-- زر التحويل بين وضع الأدمن والمستخدم -->
    <form action="{{ route('tasks.index') }}" method="GET" class="text-center mb-4">
        <div class="input-group" style="max-width: 300px; margin: 0 auto;">
            <input type="text" name="admin_code" class="form-control" placeholder="Enter admin code (optional)" aria-label="Admin Code">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">Switch Role</button>
            </div>
        </div>
    </form>

    <!-- نموذج إضافة مهمة جديدة -->
    <div class="card mb-4">
        <div class="card-header">Add a New Task</div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST" class="form-inline">
                @csrf
                <div class="form-group mr-2" style="flex: 1;">
                    <input type="text" name="task" class="form-control w-100" placeholder="Task name" required>
                </div>
                <button type="submit" class="btn btn-success">Add Task</button>
            </form>
        </div>
    </div>

    <!-- قائمة المهام -->
    <div class="card">
        <div class="card-header">Tasks</div>
        <div class="card-body">
            @if($tasks->isEmpty())
                <p class="text-center">No tasks available.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Task</th>
                            <th>Status</th>
                            @if($isAdmin)
                                <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->task }}</td>
                                <td>
                                    @if($task->is_completed)
                                        <span class="badge badge-success">Completed</span>
                                    @else
                                        <span class="badge badge-warning">Pending</span>
                                    @endif
                                </td>
                                @if($isAdmin)
                                    <td>
                                        <form action="{{ route('tasks.toggle', $task) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-primary">
                                                {{ $task->is_completed ? 'Undo' : 'Complete' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
