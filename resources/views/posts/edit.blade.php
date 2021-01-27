@extends('layouts.app', ['title' => "Update Post"])

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">

            @include('partials.alert')

            <div class="card">
                <div class="card-header">
                    Edit Post : {{ $post->title }}
                </div>
                <div class="card-body">
                    <form action="/posts/{{ $post->slug }}/edit" method="POST">
                        @method('patch')
                        @csrf
                        @include('partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop