<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\{Category, Post, Tag};
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Auth for all page
    // public function __construct()
    // {
    //     $this->middleware('auth')->except(['index', 'show']);
    // }

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

    public function store(PostRequest $request)
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
        // $attr = $this->validateRequest();
        $attr = $request->all();

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

    public function update(PostRequest $request, Post $post)
    {
        // dd($post);
        // Validate
        // $attr = $this->validateRequest();

        $attr = $request->all();

        $attr['category_id'] = request('category');

        // Update title and body
        $post->update($attr);

        // Delete tag in form & database
        $post->tags()->sync(request('tags'));

        // Message when success
        session()->flash('success', 'The Post was updated');

        // redirect
        return redirect()->to('');

        // Post::create($attr);
    }

    public function destroy(Post $post)
    {
        // dd($post);

        // delete post with tag relation
        $post->tags()->detach();

        $post->delete();

        session()->flash('success', 'The Post was updated');

        return redirect()->to('');
    }

    // public function validateRequest()
    // {
    //     return request()->validate([
    //         'title' => 'required|min:3',
    //         'body' => 'required',
    //         'category' => 'required',
    //         'tags' => 'array|required'
    //     ]);
    // }
}
