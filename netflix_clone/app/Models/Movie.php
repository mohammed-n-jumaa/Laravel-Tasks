<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    // تحديد الحقول المسموح بتعبئتها
    protected $fillable = ['title', 'description', 'thumbnail', 'video_url', 'category_id'];

    // علاقة الفيلم بفئة واحدة (Category)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة الفيلم بأنواع متعددة (Genres)
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    // علاقة الفيلم بممثلين متعددين (Actors)
    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    // علاقة الفيلم بقائمة المشاهدة (Watchlist)
    public function watchlist()
    {
        return $this->hasMany(Watchlist::class);
    }
}
