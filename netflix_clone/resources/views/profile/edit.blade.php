@extends('layouts.app')

@section('title', 'تعديل الملف الشخصي')

@section('content')
<div class="container mx-auto p-8 bg-gray-800 text-white rounded">
    <h1 class="text-3xl font-bold mb-6">تعديل الملف الشخصي</h1>

    <!-- عرض رسالة نجاح عند تحديث الملف الشخصي -->
    @if (session('status') === 'profile-updated')
        <div class="bg-green-600 text-white p-4 rounded mb-6">
            تم تحديث ملفك الشخصي بنجاح.
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <!-- حقل الاسم -->
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium">الاسم الكامل</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full bg-gray-700 text-white p-2 rounded @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- حقل البريد الإلكتروني -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium">البريد الإلكتروني</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full bg-gray-700 text-white p-2 rounded @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- زر الحفظ -->
        <div class="flex justify-end">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white p-2 rounded">
                حفظ التغييرات
            </button>
        </div>
    </form>

    <!-- زر حذف الحساب -->
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4 text-red-500">حذف الحساب</h2>
        <p class="mb-4">عند حذف حسابك، سيتم إزالة جميع بياناتك بشكل دائم.</p>

        <form method="POST" action="{{ route('profile.destroy') }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white p-2 rounded">
                حذف الحساب
            </button>
        </form>
    </div>
</div>
@endsection
