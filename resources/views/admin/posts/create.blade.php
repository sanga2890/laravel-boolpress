@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Create new post</h1>
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    <div class="form group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <textarea type="text" name="content" class="form-control" value="{{ old('text')}}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>

                </form>

            </div>

        </div>

    </div>

@endsection
