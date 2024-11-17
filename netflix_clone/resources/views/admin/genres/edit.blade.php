@extends('admin.layout')

@section('content')
    <h1>Edit Genre</h1>
    <form action="{{ route('admin.genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="name">Genre Name:</label>
        <input type="text" name="name" id="name" value="{{ $genre->name }}" required>
        <button type="submit">Update</button>
    </form>
@endsection
