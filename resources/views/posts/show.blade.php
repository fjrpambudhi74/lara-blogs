@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <p>{{ $post->title }}</p>
    </div>
@endsection