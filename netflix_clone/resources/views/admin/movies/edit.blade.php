@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center">تعديل فيلم</h1>
    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">عنوان الفيلم</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $movie->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" class="form-control" id="description" required>{{ $movie->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">رابط الصورة</label>
            <input type="url" name="thumbnail" class="form-control" id="thumbnail" value="{{ $movie->thumbnail }}" required>
        </div>
        <div class="mb-3">
            <label for="video_url" class="form-label">رابط الفيديو</label>
            <input type="url" name="video_url" class="form-control" id="video_url" value="{{ $movie->video_url }}" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">الفئة</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $movie->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="genres" class="form-label">الأنواع</label>
            <select name="genres[]" id="genres" class="form-control" multiple>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ in_array($genre->id, $movie->genres->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="actors" class="form-label">الممثلين</label>
            <select name="actors[]" id="actors" class="form-control" multiple>
                @foreach($actors as $actor)
                <option value="{{ $actor->id }}" {{ in_array($actor->id, $movie->actors->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection
