@extends('frontend.layouts.app')

@section('title', $tag)

@section('content')
    @component('frontend.components.title')
        #{{ $tag }}
    @endcomponent
    
    <div class="flex flex-wrap posts-list">
        @forelse($posts as $post)
            <div class="w-4/5 ml-auto mr-auto">
                @include('frontend.components.post-list.post', ['post' => $post, 'positionLeft' => $loop->index % 2 == 0])
            </div>
        @empty
            <div class="w-4/5 ml-auto mr-auto">
                <h1 class="text-center title text-grey mt-8">No posts found by this tag...</h1>
                <h1 class="text-center" style="font-size: 100px;">🤷‍♂️</h1>
            </div>
        @endforelse
    </div>
@endsection
