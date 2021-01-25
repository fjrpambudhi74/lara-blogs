<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        // $post = Post::where('slug', $slug)->first();
        // dd($post);
        return view('posts.show', compact('post'));
    }
}
