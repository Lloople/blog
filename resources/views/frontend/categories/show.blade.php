@extends('frontend.layouts.app')

<?php /** @var \App\Models\Category $category */ ?>

@section('title', $category->name)

@section('content')
    @component('frontend.components.title')
        {{ $category->name }}
    @endcomponent

    <div class="flex flex-wrap">
        @forelse($posts as $post)
                @include('frontend.components.post-list')
        @empty
            <div class="w-4/5 ml-auto mr-auto">
                <h1 class="text-center title text-grey mt-8">This category is empty...</h1>
                <h1 class="text-center" style="font-size: 100px;">🤷‍♂️</h1>
            </div>
        @endforelse
    </div>
@endsection
