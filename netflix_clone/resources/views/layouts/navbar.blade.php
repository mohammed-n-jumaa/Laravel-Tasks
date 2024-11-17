<nav class="bg-gray-900 p-4 flex justify-between items-center">
    <div>
        <!-- شعار Netflix -->
        <a href="{{ route('movies.index') }}" class="text-red-600 text-2xl font-bold">Netflix</a>
    </div>
    <div>
        @guest
            <!-- إذا لم يكن المستخدم مسجلاً الدخول -->
            <a href="{{ route('login') }}" class="text-white mr-4">تسجيل الدخول</a>
            <a href="{{ route('register') }}" class="text-white">إنشاء حساب</a>
        @else
            <!-- إذا كان المستخدم مسجلاً الدخول -->
            <span class="text-white mr-4">مرحباً، {{ Auth::user()->name }}</span>
            <a href="{{ route('profile.edit') }}" class="text-blue-400 mr-4">الملف الشخصي</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-500">تسجيل الخروج</button>
            </form>
        @endguest
    </div>
</nav>
