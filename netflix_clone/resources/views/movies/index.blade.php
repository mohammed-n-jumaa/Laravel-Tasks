@extends('layouts.app')

@section('title', 'الأفلام المتاحة')

@section('content')
<div class="container mx-auto p-8 bg-gray-900 text-white rounded">
    <h1 class="text-4xl font-bold text-center mb-8">الأفلام المتاحة</h1>

    @foreach ($categories as $category)
    <div class="mb-12">
        <!-- اسم الكاتيجوري -->
        <h2 class="text-2xl font-bold text-center mb-4">{{ $category->name }}</h2>

        <!-- السلايدر الخاص بكل كاتيجوري -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($category->movies as $movie)
                <div class="swiper-slide">
                    <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                        <img src="{{ $movie->image }}" alt="{{ $movie->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-bold mb-2">{{ $movie->title }}</h2>
                            <p class="text-sm text-gray-400 mb-4">{{ $movie->description }}</p>
                            <a href="{{ route('movies.show', $movie->id) }}" 
                               class="text-red-500 font-semibold hover:underline">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- أزرار التنقل -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

            <!-- النقاط -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @endforeach
</div>
@endsection
