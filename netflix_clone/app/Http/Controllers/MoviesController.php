<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use App\Models\Category;
use App\Models\Actor;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    // عرض قائمة الأفلام
  // عرض قائمة الأفلام مع الكاتيجوري
public function index()
{
    // جلب جميع الكاتيجوري مع الأفلام المرتبطة بها
    $categories = Category::with('movies')->get();

    // تمرير البيانات إلى الـ View
    return view('movies.index', compact('categories'));
}


    // عرض نموذج إضافة فيلم جديد
    public function create()
    {
        $genres = Genre::all();
        $categories = Category::all();
        $actors = Actor::all();
        return view('movies.create', compact('genres', 'categories', 'actors'));
    }

    // حفظ فيلم جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|string',
            'video_url' => 'required|string',
            'genres' => 'required|array',
            'categories' => 'required|array',
            'actors' => 'required|array',
        ]);

        $movie = Movie::create($validated);

        // ربط العلاقات
        $movie->genres()->sync($validated['genres']);
        $movie->categories()->sync($validated['categories']);
        $movie->actors()->sync($validated['actors']);

        return redirect()->route('movies.index');
    }

    // عرض فيلم معين
    public function show($id)
    {
        // جلب الفيلم المحدد من قاعدة البيانات
        $movie = Movie::findOrFail($id);
    
        // إعادة عرض صفحة تفاصيل الفيلم
        return view('movies.show', compact('movie'));
    }

    // عرض نموذج تعديل فيلم
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $categories = Category::all();
        $actors = Actor::all();
        return view('movies.edit', compact('movie', 'genres', 'categories', 'actors'));
    }

    // تحديث بيانات الفيلم
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|string',
            'video_url' => 'required|string',
            'genres' => 'required|array',
            'categories' => 'required|array',
            'actors' => 'required|array',
        ]);

        $movie->update($validated);

        // تحديث العلاقات
        $movie->genres()->sync($validated['genres']);
        $movie->categories()->sync($validated['categories']);
        $movie->actors()->sync($validated['actors']);

        return redirect()->route('movies.index');
    }

    // حذف فيلم
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}
