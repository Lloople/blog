@extends('frontend.layouts.app')

<?php /** @var \App\Models\Category $category */ ?>

@section('title', $category->name)

@section('content')
    <h3 class="title">{{ $category->name }}</h3>

    <div class="flex flex-wrap posts-list">
        @forelse($posts as $post)
            <div class="w-4/5 ml-auto mr-auto">
                @include('frontend.components.post-list.post', ['post' => $post, 'positionLeft' => $loop->index % 2 == 0])
            </div>
        @empty
            <div class="w-4/5 ml-auto mr-auto">
                <h1 class="text-center title text-grey mt-8">This category is empty...</h1>
                <h1 class="text-center" style="font-size: 100px;">🤷‍♂️</h1>
            </div>
        @endforelse
    </div>
@endsection
