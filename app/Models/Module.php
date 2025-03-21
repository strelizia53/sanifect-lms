<?php

// app/Models/Module.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'cover_image', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
