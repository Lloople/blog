@extends('layouts.app')

<?php /** @var \App\Models\Post $post */ ?>

@section('title', $post->title)

@section('content')
    <h3 class="title text-{{ app('theme')->title }}">{{ $post->title }}</h3>
    
    @if ($post->thumbnail != '')
        <img class="mr-auto ml-auto w-2/4 rounded mb-4 mt-4 flex" src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
    @endif
    
    <div class="p-4 text-{{ app('theme')->text }}">
        {!! $post->body_markdown !!}
    </div>
@endsection

@section('extra-headers')
    <meta property="og:title" content="{{ $post->title }} | murze.be"/>
    <meta property="og:description" content="{{ str_limit($post->body, 120) }}"/>
    
    @foreach($post->tags as $tag)
    <meta property="article:tag" content="{{ $tag->name }}"/>
    @endforeach
    <meta property="article:published_time" content="{{ $post->published_at->toIso8601String() }}"/>
    <meta property="og:updated_time" content="{{ $post->updated_at->toIso8601String() }}"/>
    
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="{{ str_limit($post->body, 120) }}"/>
    <meta name="twitter:title" content="{{ $post->title }} | {{ config('blog.domain') }}"/>
    <meta name="twitter:site" content="{{ config('blog.twitter_username') }}"/>
    <meta name="twitter:image" content="{{ $post->thumbnail }}"/>
    <meta name="twitter:creator" content="{{ config('blog.twitter_username') }}"/>
@endsection
