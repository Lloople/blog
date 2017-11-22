@extends('layouts.app')

@section('content')
    <div class="w-4/5 mx-auto">
        <h3 class="title">Recent Posts</h3>
    </div>

    <div class="flex flex-wrap posts-list">
        @foreach($posts as $post)
            <div class="w-4/5 mx-auto">
                @include('components.post-list.post', ['post' => $post, 'positionLeft' => $loop->index % 2 == 0])
            </div>
        @endforeach
    </div>
@endsection
