<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>لوحة التحكم</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">الرئيسية</a></li>
            <li><a href="{{ route('admin.movies.index') }}">إدارة الأفلام</a></li>
            <li><a href="{{ route('admin.categories.index') }}">إدارة الفئات</a></li>
            <li><a href="{{ route('admin.genres.index') }}">إدارة الأنواع</a></li>
            <li><a href="{{ route('admin.actors.index') }}">إدارة الممثلين</a></li>
        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
