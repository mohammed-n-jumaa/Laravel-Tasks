<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #000;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
            display: block;
            padding: 15px 20px;
            font-size: 16px;
            border-left: 5px solid transparent;
            transition: all 0.3s ease-in-out;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: #333;
            border-left: 5px solid #e50914;
            color: #e50914;
        }

        .sidebar h2 {
            text-align: center;
            margin: 0 0 20px 0;
            color: #e50914;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .content h1 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .card {
            background-color: #1c1c1c;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            color: #e50914;
            font-size: 24px;
        }

        .card p {
            font-size: 20px;
            margin: 10px 0 0 0;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #333;
        }

        table th {
            background-color: #444;
        }

        table tr:nth-child(even) {
            background-color: #2b2b2b;
        }

        .btn-add {
            background-color: #e50914;
            color: #fff;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-bottom: 15px;
            display: inline-block;
        }

        .btn-add:hover {
            background-color: #b0060f;
        }

        .btn-edit {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: #fff;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-delete:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>NETFLIX</h2>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">لوحة التحكم</a>
        <a href="{{ route('admin.movies.index') }}" class="{{ request()->routeIs('admin.movies.*') ? 'active' : '' }}">إدارة الأفلام</a>
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">إدارة الفئات</a>
        <a href="{{ route('admin.genres.index') }}" class="{{ request()->routeIs('admin.genres.*') ? 'active' : '' }}">إدارة الأنواع</a>
        <a href="{{ route('admin.actors.index') }}" class="{{ request()->routeIs('admin.actors.*') ? 'active' : '' }}">إدارة الممثلين</a>
        <a href="{{ route('logout') }}" class="text-danger"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            تسجيل الخروج
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
