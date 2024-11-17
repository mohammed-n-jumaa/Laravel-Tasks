@extends('layouts.app')

@section('title', $movie->title)

@section('content')
<div class="container mx-auto p-8 bg-gray-900 text-white rounded">
    <h1 class="text-3xl font-bold mb-6">{{ $movie->title }}</h1>
    <p class="mb-4 text-gray-400">{{ $movie->description }}</p>
    <p class="text-sm text-gray-500">
        الفئة: {{ $movie->category ? $movie->category->name : 'غير محددة' }}
    </p>
        <a href="{{ route('movies.index') }}" class="text-blue-500 underline">العودة إلى قائمة الأفلام</a>
</div>
@endsection
