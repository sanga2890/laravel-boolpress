@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Edit post</h1>
                <form action="{{ route('admin.posts.update', ['post' => $post_list->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $post_list->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <textarea type="text" name="content" class="form-control" value="{{ old('content', $post_list->content) }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>

                </form>

            </div>

        </div>

    </div>

@endsection
