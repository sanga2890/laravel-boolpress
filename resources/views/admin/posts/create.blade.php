@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Create new post</h1>
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Text</label>
                        <textarea type="text" name="content" id="text" class="form-control">{{ old('content')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Text</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select category</option>
                            @foreach ($category_list as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>

                            @endforeach

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>

                </form>

            </div>

        </div>

    </div>

@endsection
