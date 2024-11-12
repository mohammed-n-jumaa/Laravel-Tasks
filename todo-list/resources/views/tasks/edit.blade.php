@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Edit Task</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="task">Task</label>
                    <input type="text" name="task" id="task" class="form-control" value="{{ $task->task }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
