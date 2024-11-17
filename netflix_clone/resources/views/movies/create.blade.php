@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center my-4">إضافة فيلم جديد</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">عنوان الفيلم</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">الوصف</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">رابط الصورة</label>
            <input type="text" class="form-control" id="thumbnail" name="thumbnail" required>
        </div>
        <div class="mb-3">
            <label for="video_url" class="form-label">رابط الفيديو</label>
            <input type="text" class="form-control" id="video_url" name="video_url" required>
        </div>
        <div class="mb-3">
            <label for="genres" class="form-label">التصنيفات</label>
            <select class="form-select" id="genres" name="genres[]" multiple required>
                @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="categories" class="form-label">الفئات</label>
            <select class="form-select" id="categories" name="categories[]" multiple required>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="actors" class="form-label">الممثلين</label>
            <select class="form-select" id="actors" name="actors[]" multiple required>
                @foreach ($actors as $actor)
                <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">إضافة الفيلم</button>
    </form>
</div>
@endsection
