<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Task model to represent tasks in the database
class Task extends Model
{
    protected $fillable = ['task', 'is_completed'];
}
