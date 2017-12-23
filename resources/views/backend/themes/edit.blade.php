@extends('backend.layouts.app')

@section('title', config('app.name') . ' - ' . $view->title)

@section('content')
    <h1>{{ $view->title }}</h1>
    
    <form method="POST" action="{{ $view->action }}">
        {{ method_field($view->method) }}
        {{ csrf_field() }}
        
        {!! $view->inputText('name', 'Name') !!}
        {!! $view->inputCheckbox('selected', 'Active') !!}
        
    
        <h2>Main layout</h2>
        {!! $view->inputText('background', 'Background color') !!}
        {!! $view->inputText('container_background', 'Container background color') !!}
        {!! $view->inputText('title', 'Title text color') !!}
        {!! $view->inputText('text', 'Text color') !!}

        <h2>Menu</h2>
        {!! $view->inputText('menu_item_text', 'Item text color') !!}
        {!! $view->inputText('menu_item_background', 'Item background color') !!}
        {!! $view->inputText('menu_item_active_text', 'Active item text color') !!}
        {!! $view->inputText('menu_item_active_background', 'Active item background color') !!}

        <h2>Categories</h2>
        {!! $view->inputText('categories_list_text', 'Text color') !!}
        {!! $view->inputText('categories_list_background', 'Background color') !!}
    
        <h2>Tags</h2>
        {!! $view->inputText('tags_list_text', 'Text color') !!}
        {!! $view->inputText('tags_list_background', 'Background color') !!}
    
        <div class="form-horizontal-field float-right">
            <button class="button text-lg bg-green p-4 float-right mr-2">
                <span class="fa fa-save fa-fw"></span>
            </button>
    
            <button-delete></button-delete>
            
        </div>
    </form>

    <form-delete action="{{ route('backend.themes.destroy', $view->model) }}"></form-delete>
    
@endsection