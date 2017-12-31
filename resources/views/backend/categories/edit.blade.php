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
            'name' => 'active',
            'checked' => $view->model->active
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
        <form-delete action="{{ route('backend.categories.destroy', $view->model) }}"></form-delete>
    @endif
    
@endsection