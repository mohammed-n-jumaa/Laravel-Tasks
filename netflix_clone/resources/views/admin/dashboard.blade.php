@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Sidebar -->
    <div class="w-1/4 bg-black text-white h-screen p-4">
        <ul>
            <li class="mb-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 rounded hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                    لوحة التحكم
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.movies.index') }}" class="block py-2 px-4 rounded hover:bg-gray-800 {{ request()->routeIs('admin.movies.*') ? 'bg-gray-800' : '' }}">
                    إدارة الأفلام
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.categories.index') }}" class="block py-2 px-4 rounded hover:bg-gray-800 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-800' : '' }}">
                    إدارة الفئات
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.genres.index') }}" class="block py-2 px-4 rounded hover:bg-gray-800 {{ request()->routeIs('admin.genres.*') ? 'bg-gray-800' : '' }}">
                    إدارة الأنواع
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.actors.index') }}" class="block py-2 px-4 rounded hover:bg-gray-800 {{ request()->routeIs('admin.actors.*') ? 'bg-gray-800' : '' }}">
                    إدارة الممثلين
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="block py-2 px-4 text-red-500 hover:bg-gray-800"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    تسجيل الخروج
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="w-3/4 p-10">
        <h1 class="text-3xl font-bold text-white mb-6">لوحة تحكم الأدمن</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            <!-- عدد الأفلام -->
            <div class="bg-blue-500 text-white rounded-lg shadow-lg p-6 text-center">
                <h2 class="text-lg font-semibold">عدد الأفلام</h2>
                <p class="text-4xl font-bold">{{ $moviesCount }}</p>
            </div>
            <!-- عدد الفئات -->
            <div class="bg-green-500 text-white rounded-lg shadow-lg p-6 text-center">
                <h2 class="text-lg font-semibold">عدد الفئات</h2>
                <p class="text-4xl font-bold">{{ $categoriesCount }}</p>
            </div>
            <!-- عدد الأنواع -->
            <div class="bg-yellow-500 text-white rounded-lg shadow-lg p-6 text-center">
                <h2 class="text-lg font-semibold">عدد الأنواع</h2>
                <p class="text-4xl font-bold">{{ $genresCount }}</p>
            </div>
            <!-- عدد الممثلين -->
            <div class="bg-red-500 text-white rounded-lg shadow-lg p-6 text-center">
                <h2 class="text-lg font-semibold">عدد الممثلين</h2>
                <p class="text-4xl font-bold">{{ $actorsCount }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
