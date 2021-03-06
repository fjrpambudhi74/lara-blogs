@extends('layouts.app', ['title' => "New Post"])

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">

            @include('partials.alert')

            <div class="card">
                <div class="card-header">
                    New Post
                </div>
                <div class="card-body">
                    <form action="/posts/store" method="POST">
                        @csrf
                        @include('partials.form', ['submit' => 'Create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop