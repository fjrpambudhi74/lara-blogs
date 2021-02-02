@extends('layouts.app')

@section('content')
<div class="container">
    @if ($posts->count())
    <div class="d-flex justify-content-between mt-3">
        <div>
            @isset($category)
            <h3>Category : {{ $category->name }}</h3>
            @endisset

            @isset($tag)
            <h3>Tag : {{ $tag->name }}</h3>
            @endisset

            @if(!@isset($tag) && !isset($category))
                <h3>All Post</h3>
            @endif
        </div>
        <div>
            @if(Auth::check())
                <a href="{{ route('posts.create') }}" class="btn btn-primary">New Post</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endif
        </div>
    </div>
    <div class="row mt-5">
        @foreach ($posts as $post)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                {{ $post->title }}
                </div>
                <div class="card-body">
                    <div>
                        {{ Str::limit($post->body, 100, '.') }}
                    </div>
                    <a href="/posts/{{ $post->slug }}">Read More</a>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    Published on {{ $post->created_at->diffForHumans() }}
                    @auth
                        <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                    @endauth
                </div>
            </div>

        </div>
        @endforeach


    </div>
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
    @else
        <div class="alert alert-info">
            Post Not Found
        </div>
    @endif
</div>


@stop