@extends('backend.layouts.app')

@section('title', config('app.name') . ' - ' . $view->title)

@section('content')
    <h1>{{ $view->title }}</h1>
    
    <form method="POST" action="{{ $view->action }}">
        {{ method_field($view->method) }}
        {{ csrf_field() }}
        
        {!! $view->inputText('name', 'Name') !!}

        {!! $view->inputCheckbox('active', 'Active') !!}
        
        <div class="form-horizontal-field float-right">
            <button class="button text-lg bg-green p-4 float-right mr-2">
                <span class="fa fa-save fa-fw"></span>
            </button>
    
            <button-delete></button-delete>
            
        </div>
    </form>

    <form-delete action="{{ route('backend.categories.destroy', $view->model) }}"></form-delete>
    
@endsection