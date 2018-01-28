@extends('frontend.layouts.app')

@section('content')
    @component('frontend.components.title')
        Recent posts
    @endcomponent

    <div class="flex flex-wrap">
        @each('frontend.components.post-list', $posts, 'post')
    </div>
    
    <div class="mb-8">
        {{ $posts->links('frontend.components.pagination') }}
    </div>
@endsection
