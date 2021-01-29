<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'body', 'category_id'];

    // protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class); //one to many
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
