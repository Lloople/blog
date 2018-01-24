@extends('frontend.layouts.app')

@section('content')
    @component('frontend.components.title')
        Recent posts
    @endcomponent

    <div class="flex flex-wrap posts-list">
        @foreach($posts as $post)
            <div class="w-4/5 mx-auto">
                @include('frontend.components.post-list.post', ['post' => $post, 'positionLeft' => $loop->index % 2 == 0])
            </div>
        @endforeach
        
    </div>
    <div class="mb-8">
        {{ $posts->links('frontend.components.pagination') }}
    </div>
@endsection
