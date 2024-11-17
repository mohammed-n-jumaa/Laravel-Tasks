<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Actor;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('category')->get();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        $categories = Category::all();
        $genres = Genre::all();
        $actors = Actor::all();
        return view('admin.movies.create', compact('categories', 'genres', 'actors'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|url',
            'video_url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'genres' => 'required|array',
            'actors' => 'required|array',
        ]);

        $movie = Movie::create($validated);
        $movie->genres()->sync($validated['genres']);
        $movie->actors()->sync($validated['actors']);

        return redirect()->route('admin.movies.index')->with('success', 'تمت إضافة الفيلم بنجاح');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $categories = Category::all();
        $genres = Genre::all();
        $actors = Actor::all();
        return view('admin.movies.edit', compact('movie', 'categories', 'genres', 'actors'));
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'thumbnail' => 'required|url',
            'video_url' => 'required|url',
            'category_id' => 'required|exists:categories,id',
            'genres' => 'required|array',
            'actors' => 'required|array',
        ]);

        $movie->update($validated);
        $movie->genres()->sync($validated['genres']);
        $movie->actors()->sync($validated['actors']);

        return redirect()->route('admin.movies.index')->with('success', 'تم تحديث الفيلم بنجاح');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'تم حذف الفيلم بنجاح');
    }
}
