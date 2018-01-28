@extends('frontend.layouts.app')

@section('title', 'Categories List')

@section('content')
    @component('frontend.components.title')
        Categories List
    @endcomponent

    <div class="flex flex-wrap">
        <div class="lg:w-4/5 ml-auto mr-auto">
            @foreach($categories as $category)
                <a href="{{ $category->url }}" class=" no-underline p-8 bg-{{ app('theme')->categories_list_background }} m-4 md:w-auto rounded-lg inline-flex">
                    <span class="m-auto text-{{ app('theme')->categories_list_text }} text-lg">{{ $category->name }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
