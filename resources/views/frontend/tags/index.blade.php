@extends('frontend.layouts.app')

@section('title', 'Tags List')

@section('content')
    @component('frontend.components.title')
        Tags List
    @endcomponent
    
    <div class="flex flex-wrap posts-list">
        <div class="md:w-4/5 ml-auto mr-auto">
            @foreach($tags as $tag)
                <a href="{{ $tag->url }}" class=" no-underline p-8 bg-{{ app('theme')->tags_list_background }} m-4 md:w-auto rounded-lg inline-flex">
                    <span class="m-auto text-{{ app('theme')->tags_list_text }} text-lg"># {{ $tag->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
