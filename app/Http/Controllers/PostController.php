<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::get();
        // $posts = Post::paginate(5);
        // $posts = Post::latest()->simplePaginate(5);

        // $posts = Post::take(5)->get();
        return view('posts.index', [
            'posts' => Post::latest()->simplePaginate(6),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // First Step
        // $post = new Post;
        // $post->title = $request->title;
        // $post->slug = \Str::slug($request->title);
        // $post->body = $request->body;

        // $post->save();

        // Second Step setting guarded(private) or fillable(public)
        // 1
        // Post::create([
        //     'title' => $request->title,
        //     'slug' => \Str::slug($request->title),
        //     'body' => $request->body,
        // ]);

        // 2
        // Post::create($request->all());

        // 3
        $post = $request->all();
        $post['slug'] = \Str::slug($request->title);
        Post::create($post);

        return redirect()->to('posts');
        // return redirect()->to('posts/create'); or
        // return back();
    }
}
