@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="text-center">إضافة فيلم جديد</h1>
    <form action="{{ route('admin.movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">عنوان الفيلم</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea name="description" class="form-control" id="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">رابط الصورة</label>
            <input type="url" name="thumbnail" class="form-control" id="thumbnail" required>
        </div>
        <div class="mb-3">
            <label for="video_url" class="form-label">رابط الفيديو</label>
            <input type="url" name="video_url" class="form-control" id="video_url" required>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">الفئة</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="genres" class="form-label">الأنواع</label>
            <select name="genres[]" id="genres" class="form-control" multiple>
                @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="actors" class="form-label">الممثلين</label>
            <select name="actors[]" id="actors" class="form-control" multiple>
                @foreach($actors as $actor)
                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">إضافة</button>
    </form>
</div>
@endsection
