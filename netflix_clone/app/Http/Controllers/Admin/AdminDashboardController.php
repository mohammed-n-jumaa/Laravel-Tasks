<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Actor;

class AdminDashboardController extends Controller
{
    // عرض لوحة تحكم الأدمن
    public function index()
    {
        // جلب إحصائيات لعرضها في لوحة التحكم
        $moviesCount = Movie::count();
        $categoriesCount = Category::count();
        $genresCount = Genre::count();
        $actorsCount = Actor::count();

        // تمرير البيانات إلى الـ View
        return view('admin.dashboard', compact('moviesCount', 'categoriesCount', 'genresCount', 'actorsCount'));
    }
}
