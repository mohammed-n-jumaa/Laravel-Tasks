<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Task List</h1>

        <!-- Add New Task -->
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST" class="form-inline">
                    @csrf
                    <input type="text" name="title" class="form-control mr-2" placeholder="Add a new task" required>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>

        <!-- Display Task List -->
        <ul class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <form action="{{ route('tasks.update', $task) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" name="is_completed" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                            <span class="{{ $task->is_completed ? 'text-muted text-decoration-line-through' : '' }}">
                                {{ $task->title }}
                            </span>
                        </form>
                    </div>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
