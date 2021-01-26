@extends('layouts.app')

@section('content')
<div class="container">
    @if ($posts->count())
    <div class="d-flex justify-content-between mt-3">
        <div>
            <h3>All Post</h3>
        </div>
        <div>
            <a href="/posts/create" class="btn btn-primary">New Post</a>
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
                <div class="card-footer">
                    Published on {{ $post->created_at->diffForHumans() }}
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