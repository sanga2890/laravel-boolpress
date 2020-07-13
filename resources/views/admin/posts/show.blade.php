@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1>Post Details</h1>
                <h2> {{ $post_list->title }}</h2>
                <p> {{ $post_list->content }}</p>
                <p><strong>slug: </strong>
                    {{ $post_list->slug }}
                </p>
                <p><strong>Created at: </strong>
                    {{ $post_list->created_at }}
                </p>
                <p><strong>Updated at: </strong>
                    {{ $post_list->updated_at}}
                </p>
            </div>

        </div>

    </div>

@endsection
