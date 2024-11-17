<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل {{ $movie->title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white">
    <header class="bg-gray-900 p-4">
        <h1 class="text-2xl font-bold">تعديل فيلم</h1>
    </header>
    <main class="p-8">
        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium">عنوان الفيلم</label>
                <input type="text" name="title" id="title" class="w-full p-2 rounded bg-gray-700 text-white" value="{{ $movie->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">الوصف</label>
                <textarea name="description" id="description" rows="3" class="w-full p-2 rounded bg-gray-700 text-white">{{ $movie->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="thumbnail" class="block text-sm font-medium">رابط الصورة</label>
                <input type="text" name="thumbnail" id="thumbnail" class="w-full p-2 rounded bg-gray-700 text-white" value="{{ $movie->thumbnail }}" required>
            </div>
            <div class="mb-4">
                <label for="video_url" class="block text-sm font-medium">رابط الفيديو</label>
                <input type="text" name="video_url" id="video_url" class="w-full p-2 rounded bg-gray-700 text-white" value="{{ $movie->video_url }}" required>
            </div>
            <button type="submit" class="w-full bg-red-600 p-2 rounded font-bold hover:bg-red-700">تحديث الفيلم</button>
        </form>
    </main>
</body>
</html>
