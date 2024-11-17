@extends('admin.layout')

@section('content')
    <h1>Edit Actor</h1>
    <form action="{{ route('admin.actors.update', $actor->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Actor Name:</label>
        <input type="text" name="name" id="name" value="{{ $actor->name }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
