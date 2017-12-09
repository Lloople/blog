@extends('frontend.layouts.app')

<?php /** @var \App\Models\Post $post */ ?>

@section('title', $post->title)

@section('content')
    <div class="w-4/5 mx-auto">
        <h3 class="title text-{{ app('theme')->title }}">{{ $post->title }}</h3>
    </div>
    
    <div class="w-4/5 mx-auto">
        <div class="post lg:flex">
            <div class="w-full p-4 flex flex-col justify-between leading-normal">
                <span class="post-date">{{ $post->published_at->format('d/m/Y H:i') }}</span>
                
                <div class="mb-4 post-content">
                    {!! $post->body_markdown !!}
                </div>
                <span class="post-date">
                    @foreach($post->tags as $tag)
                        <a href="{{ $tag->url }}" class="no-underline lowercase text-sm text-{{ app('theme')->text }}">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </span>
            </div>
        </div>

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
    <meta name="twitter:image" content="{{ url('img/thumbnail.jpg') }}"/>
    <meta name="twitter:creator" content="{{ config('blog.twitter_username') }}"/>
@endsection
