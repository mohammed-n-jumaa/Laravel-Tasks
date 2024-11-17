<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\ActorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// الصفحة الرئيسية - عرض قائمة الأفلام مباشرة
Route::get('/', [MoviesController::class, 'index'])->name('movies.index');

// التوجيهات المحمية بواسطة "auth"
Route::middleware('auth')->group(function () {

    // التوجيهات الخاصة بالمستخدم العادي
    Route::middleware('role:user')->group(function () {
        Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');
        Route::get('/movies/{id}', [MoviesController::class, 'show'])->name('movies.show');
    });

    // التوجيهات الخاصة بالأدمن فقط
    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        // لوحة تحكم الأدمن
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // إدارة الأفلام
        Route::resource('movies', MovieController::class);

        // إدارة الفئات
        Route::resource('categories', CategoryController::class);

        // إدارة الأنواع
        Route::resource('genres', GenreController::class);

        // إدارة الممثلين
        Route::resource('actors', ActorController::class);
    });

    // التوجيهات المشتركة بين الأدمن والمستخدم
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// تضمين التوجيهات الخاصة بالمصادقة
require __DIR__.'/auth.php';
