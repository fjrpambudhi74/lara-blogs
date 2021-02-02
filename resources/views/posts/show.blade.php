@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <div class="text-secondary">
       <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
       &middot; {{ $post->created_at->format('d F, Y') }}
       &middot;

        @foreach ($post->tags as $tag)
       <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
        @endforeach
        </div>
        <hr>
        <p>{{ $post->body }}</p>
        <div>
            @auth
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link btn-sm text-danger p-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Delete
            </button>
            @endauth

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div>
                        {{ $post->title }}
                    <div class="text-secondary my-2">
                        <small>Published : {{ $post->created_at->format('d F, Y') }}</small>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <form action="/posts/{{ $post->slug }}/delete" method="post">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection