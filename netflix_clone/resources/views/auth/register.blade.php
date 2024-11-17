<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black text-white flex items-center justify-center h-screen">
    <div class="w-full max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-center">إنشاء حساب جديد</h1>
        <form action="{{ route('register') }}" method="POST" class="bg-gray-800 p-8 rounded-lg shadow-lg">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">الاسم الكامل</label>
                <input type="text" name="name" id="name" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">كلمة المرور</label>
                <input type="password" name="password" id="password" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="w-full p-2 rounded bg-gray-700 text-white" required>
            </div>
            <button type="submit" class="w-full bg-red-600 p-2 rounded font-bold hover:bg-red-700">إنشاء حساب</button>
        </form>
        <p class="mt-4 text-center">
            لديك حساب بالفعل؟ <a href="{{ route('login') }}" class="text-red-500 underline">تسجيل الدخول</a>
        </p>
    </div>
</body>
</html>
