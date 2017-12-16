@extends('backend.layouts.app')

@section('title', config('app.name') . ' - ' . $view->title)

@section('content')
    <h1>{{ $view->title }}</h1>
    
    <form method="POST" action="{{ $view->action }}">
        {{ method_field($view->method) }}
        {{ csrf_field() }}
        <div class="form-horizontal-field ">
            <div class="w-full md:w-1/5">
                <label for="title" class="form-horizontal-label">Title</label>
            </div>
            <div class="w-full md:w-3/5">
                <input id="title" name="title" class="form-input" value="{{ old('title', $view->post->title) }}">
                @if ($errors->has('title'))
                    <p class="text-red block">{{ implode('<br>', $errors->get('title')) }}</p>
                @endif
            </div>
        </div>
    
        <div class="form-horizontal-field">
            <div class="w-full md:w-1/5">
                <label for="published_at" class="form-horizontal-label">Publish Date</label>
            </div>
            <div class="w-full md:w-3/5">
                <input id="published_at" type="datetime-local" name="published_at" class="form-input" value="{{ old('published_at', $view->published_at) }}">
                @if ($errors->has('published_at'))
                    <p class="text-red block">{{ implode('<br>', $errors->get('published_at')) }}</p>
                @endif
            </div>
        </div>
    
        <div class="form-horizontal-field">
            <div class="w-full md:w-1/5">
                <label for="category" class="form-horizontal-label">Category</label>
            </div>
            <select id="category" name="category" class="w-full md:w-3/5 form-input">
                @foreach($view->categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id === $view->post->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <div class="form-horizontal-field ">
            <div class="w-full md:w-1/5">
                <label for="tags" class="form-horizontal-label">Tags</label>
            </div>
            <input id="tags" name="tags" class="w-full md:w-3/5 form-input" value="{{ old('tags', $view->post->tags->implode('name', ', ')) }}">
        </div>
    
        <div class="form-horizontal-field">
            <div class="w-full md:w-1/5">
                <label for="featured" class="form-horizontal-label">Featured</label>
            </div>
            <div class="w-full md:w-3/5 form-checkbox">
                <input type="checkbox" id="featured" name="featured" {{ old('featured', $view->post->featured) ? 'checked' : '' }}>
            </div>
        </div>
    
        <div class="form-horizontal-field">
            <div class="w-full md:w-1/5">
                <label for="visible" class="form-horizontal-label">Visible</label>
            </div>
            <div class="w-full md:w-3/5 form-checkbox">
                <input type="checkbox" id="visible" name="visible" {{ old('visible', $view->post->visible) ? 'checked' : '' }}>
            </div>
        </div>
    
        <div class="form-horizontal-field">
            <div class="w-full md:w-1/5">
                <label for="body" class="form-horizontal-label">Body</label>
            </div>
            <div class="w-full md:w-3/5">
                <post-edit content="{{ old('body', $view->post->body) }}"></post-edit>
                @if ($errors->has('body'))
                    <p class="text-red block">{{ implode('<br>', $errors->get('body')) }}</p>
                @endif
            </div>
        </div>
        
        <div class="form-horizontal-field float-right">
            <button class="button text-lg bg-green p-4 float-right mr-2">
                <span class="fa fa-save fa-fw"></span>
            </button>
            <a target="_blank" class="button text-lg bg-blue p-4 float-right mr-2" href="{{ $view->post->url }}">
                <span class="fa fa-eye fa-fw"></span>
            </a>
            <button-delete></button-delete>
        </div>
    </form>

    <form-delete action="{{ route('backend.posts.destroy', $view->post) }}"></form-delete>

@endsection

