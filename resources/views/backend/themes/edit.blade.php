@extends('backend.layouts.app')

@section('title', config('app.name') . ' - ' . $view->title)

@section('content')
    <h1>{{ $view->title }}</h1>
    
    <form method="POST" action="{{ $view->action }}">
        {{ method_field($view->method) }}
        {{ csrf_field() }}
        
        @include('backend.partials.form.text', [
            'name' => 'name',
            'value' => $view->model->name
        ])
        
        @include('backend.partials.form.checkbox', [
            'name' => 'selected',
            'label' => 'Active',
            'checked' => $view->model->selected
        ])
    
        <h2>Main layout</h2>
        @include('backend.partials.form.text', [
            'name' => 'background',
            'label' => 'Background color',
            'value' => $view->model->background
        ])
    
        @include('backend.partials.form.text', [
            'name' => 'container_background',
            'label' => 'Container background color',
            'value' => $view->model->container_background
        ])
    
        @include('backend.partials.form.text', [
            'name' => 'title',
            'label' => 'Title color',
            'value' => $view->model->title
        ])
    
        @include('backend.partials.form.text', [
            'name' => 'text',
            'label' => 'Text color',
            'value' => $view->model->text
        ])
        
        <h2>Menu</h2>
        @include('backend.partials.form.text', [
            'name' => 'menu_item_text',
            'label' => 'Item text color',
            'value' => $view->model->menu_item_text
        ])
        
        @include('backend.partials.form.text', [
            'name' => 'menu_item_background',
            'label' => 'Item background color',
            'value' => $view->model->menu_item_background
        ])
    
        @include('backend.partials.form.text', [
            'name' => 'menu_item_active_text',
            'label' => 'Active item text color',
            'value' => $view->model->menu_item_active_text
        ])
    
        @include('backend.partials.form.text', [
            'name' => 'menu_item_active_background',
            'label' => 'Active item background color',
            'value' => $view->model->menu_item_active_background
        ])

        <h2>Categories</h2>
        @include('backend.partials.form.text', [
            'name' => 'categories_list_text',
            'label' => 'Text color',
            'value' => $view->model->categories_list_text
        ])
    
        @include('backend.partials.form.text', [
            'name' => 'categories_list_background',
            'label' => 'Background color',
            'value' => $view->model->categories_list_background
        ])
        
        <h2>Tags</h2>
        @include('backend.partials.form.text', [
            'name' => 'tags_list_text',
            'label' => 'Text color',
            'value' => $view->model->tags_list_text
        ])
        @include('backend.partials.form.text', [
            'name' => 'tags_list_background',
            'label' => 'Background color',
            'value' => $view->model->tags_list_background
        ])
    
        <div class="form-horizontal-field float-right">
            <button class="button text-lg bg-green p-4 float-right mr-2">
                <span class="fa fa-save fa-fw"></span>
            </button>
    
            @if($view->model->exists)
                <button-delete></button-delete>
            @endif
            
        </div>
    </form>

    @if($view->model->exists)
        <form-delete action="{{ route('backend.themes.destroy', $view->model) }}"></form-delete>
    @endif
    
@endsection