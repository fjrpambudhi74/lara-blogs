@extends('layouts.app', ['title' => "New Post"])

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    New Post
                </div>
                <div class="card-body">
                    <form action="{{ url("/posts/store") }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Description</label>
                            <textarea type="text" name="body" id="body" class="form-control"></textarea>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop