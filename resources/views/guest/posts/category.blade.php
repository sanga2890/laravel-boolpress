@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Post in category: {{ $category->name }}</h1>
                <ul>
                    @foreach ($posts as $post)
                        <a href="{{ route('this.post', ['slug' => $post->slug])}}"> <li>{{ $post->title }}</li></a>
                    @endforeach
                </ul>
        </div>
    </div>
</div>
@endsection
