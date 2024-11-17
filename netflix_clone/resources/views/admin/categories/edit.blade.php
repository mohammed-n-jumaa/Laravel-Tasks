@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h1>Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
