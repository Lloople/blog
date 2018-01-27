@extends('backend.layouts.app')

@section('title', config('app.name') . ' - ' . $view->title)

@section('content')
    <h1>{{ $view->title }}</h1>
    
    <form method="POST" action="{{ $view->action }}">
        {{ method_field($view->method) }}
        {{ csrf_field() }}
        
        @include('backend.partials.form.text', [
            'name' => 'title',
            'value' => old('title', $view->model->title),
        ])
        
        @include('backend.partials.form.datetime', [
            'name' => 'published_at',
            'label' => 'Publish Date',
            'value' => old('published_at', $view->published_at)
        ])
        
        @include('backend.partials.form.select', [
            'name' => 'category',
            'options' => $view->categories,
            'selected' => $view->model->category_id
        ])
    
        @include('backend.partials.form.tags-input', [
            'name' => 'tags',
            'selected' => old('tags', $view->currentTags),
            'options' => $view->tags
        ])
        
        @include('backend.partials.form.checkbox', [
            'name' => 'featured',
            'checked' => $view->model->featured
        ])
    
        @include('backend.partials.form.checkbox', [
            'name' => 'visible',
            'checked' => $view->model->visible
        ])
        
        <div class="form-horizontal-field">
            <div class="w-full md:w-1/5">
                <label for="body" class="form-horizontal-label">Body</label>
            </div>
            <div class="w-full md:w-3/5">
                <post-edit content="{{ old('body', $view->model->body) }}"></post-edit>
                @if ($errors->has('body'))
                    <p class="text-red block">{{ implode('<br>', $errors->get('body')) }}</p>
                @endif
            </div>
        </div>
        
        <div class="form-horizontal-field float-right">
            <button class="button text-lg bg-green p-4 float-right mr-2">
                <span class="fa fa-save fa-fw"></span>
            </button>
            @if($view->model->exists)
    
                <a target="_blank" class="button text-lg bg-blue p-4 float-right mr-2" href="{{ $view->model->url }}">
                    <span class="fa fa-eye fa-fw"></span>
                </a>
                <button-delete></button-delete>
            @endif
        </div>
    </form>

    @if($view->model->exists)
        <form-delete action="{{ route('backend.posts.destroy', $view->model) }}"></form-delete>
    @endif

@endsection

