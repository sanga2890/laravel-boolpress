@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1> {{ $post_list->title }}</h1>
                <p> {{ $post_list->content }}</p>
            </div>
        </div>
    </div>
@endsection
