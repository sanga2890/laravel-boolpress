@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1> {{ $post_list->title }}</h1>
                <p> {{ $post_list->content }}</p>
                <p> Categoria:
                    @if ($post_list->category)
                        <a href="{{ route('category', ['slug' => $post_list->category->slug ?? '-'])}}">{{ $post_list->category->name ?? '-' }}</a>
                </p>
                    @else
                        -
                    @endif
                <p>Tags:
                    @forelse ($post_list->tags as $tag)
                        {{ $tag->name }}{{$loop->last ? '' : ', '}}
                    @empty
                        -
                    @endforelse
                </p>
            </div>
        </div>
    </div>
@endsection
