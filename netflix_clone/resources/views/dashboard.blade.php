@extends('layouts.app')

@section('title', 'لوحة تحكم الأدمن')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">لوحة تحكم الأدمن</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold">عدد الأفلام</h2>
            <p class="text-3xl font-bold">{{ $moviesCount }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold">عدد الفئات</h2>
            <p class="text-3xl font-bold">{{ $categoriesCount }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold">عدد الأنواع</h2>
            <p class="text-3xl font-bold">{{ $genresCount }}</p>
        </div>
        <div class="bg-white shadow rounded-lg p-6 text-center">
            <h2 class="text-xl font-semibold">عدد الممثلين</h2>
            <p class="text-3xl font-bold">{{ $actorsCount }}</p>
        </div>
    </div>
</div>
@endsection
