@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Edit post</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
                <form action="{{ route('admin.posts.update', ['post' => $post_list->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $post_list->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Text</label>
                        <textarea type="text" name="content" class="form-control" id="text">{{ old('content', $post_list->content) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Text</label>
                        <select class="form-control" name="category_id">
                            <option value="">Select category</option>
                            @foreach ($category_list as $category)
                                <option
                                    {{ old('category_id', $post_list->category_id) == $category->id ? 'selected' : ''}}
                                    value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @foreach ($tags as $tag)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input
                                    @if ($errors->any())
                                        {{ in_array($tag->id, old('tag_id', [])) ? 'checked' : '' }}
                                    @else
                                        {{ $post_list->tags->contains($tag) ? 'checked' : '' }} 
                                    @endif
                                    name="tag_id[]" class="form-check-input" type="checkbox" value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>

                </form>

            </div>

        </div>

    </div>

@endsection
