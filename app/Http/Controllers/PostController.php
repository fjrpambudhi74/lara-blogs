<?php

namespace App\Http\Controllers;

use App\Models\{Category, Post, Tag};
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
        return view('posts.create', [
            'post' => new Post(),
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
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

        // Validate
        // 1
        // $request->validate([
        //     'title' => 'required|min:3',
        //     'body' => 'required',
        // ]);

        // 2
        $attr = $this->validateRequest();
        $attr['category_id'] = request('category');

        // 3
        // $post = $request->all();
        // $post['slug'] = \Str::slug($request->title);
        // Post::create($post);

        // 4
        $attr['slug'] = \Str::slug($request->title);
        $post = Post::create($attr);

        $post->tags()->attach(request('tags'));

        session()->flash('success', 'The Post was created');

        return redirect()->to('');
        // return redirect()->to('posts/create'); or
        // return back();
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'categories' => Category::get(),
            'tags' => Tag::get(),
        ]);
    }

    public function update(Post $post)
    {
        // dd($post);
        // Validate
        $attr = $this->validateRequest();

        // Update title and body
        $post->update($attr);

        // Message when success
        session()->flash('success', 'The Post was updated');

        // redirect
        return redirect()->to('posts');

        // Post::create($attr);
    }

    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required|min:3',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'array|required'
        ]);
    }

    public function destroy(Post $post)
    {
        // dd($post);
        $post->delete();

        session()->flash('success', 'The Post was updated');

        return redirect()->to('posts');
    }
}
