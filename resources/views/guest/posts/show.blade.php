@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1> {{ $post_list->title }}</h1>
                <p> {{ $post_list->content }}</p>
                <p> Categoria:
                    @if ($post_list->category)
                        <a href="{{ route('category', ['slug' => $post_list->category->slug ?? '-'])}}">{{ $post_list->category->name ?? '-' }}</a> </p>
                    @else
                        -
                    @endif
            </div>
        </div>
    </div>
@endsection
