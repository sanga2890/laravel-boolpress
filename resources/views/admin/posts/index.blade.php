@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="d-flex justify-content-between align-items-center create">
                    <h1>Post List</h1>
                    <a class="btn btn-primary" href="{{ route('admin.posts.create')}}">New post</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Categoria</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($post_list as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>{{ $post->category->name ?? '-' }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('admin.posts.show', ['post' => $post->id]) }}">Info</a>
                                    <a class="btn btn-secondary" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">Edit</a>
                                    <form  class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input  type="submit" class="btn btn-danger" value="Delete">
                                    </form>

                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td>
                                    <h2>"0" posts</h2>
                                </td>
                            </tr>


                        @endforelse
                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
