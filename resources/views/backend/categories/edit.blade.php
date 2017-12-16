@extends('backend.layouts.app')

@section('title', config('app.name') . ' - ' . $view->title)

@section('content')
    <h1>{{ $view->title }}</h1>
    
    <form method="POST" action="{{ $view->action }}">
        {{ method_field($view->method) }}
        {{ csrf_field() }}
        <div class="form-horizontal-field ">
            <div class="w-full md:w-1/5">
                <label for="name" class="form-horizontal-label">Name</label>
            </div>
            <input id="name" name="name" class="w-full md:w-3/5 form-input" value="{{ old('name', $view->category->name) }}">
        </div>
    
    
        <div class="form-horizontal-field">
            <div class="w-full md:w-1/5">
                <label for="active" class="form-horizontal-label">Active</label>
            </div>
            <div class="w-full md:w-3/5 form-checkbox">
                <input type="checkbox" id="active" name="active" {{ old('active', $view->category->active) ? 'checked' : '' }}>
            </div>
        </div>
        
        <div class="form-horizontal-field float-right">
            <button class="button text-lg bg-green p-4 float-right mr-2">
                <span class="fa fa-save fa-fw"></span>
            </button>
    
            <button-delete></button-delete>
            
        </div>
    </form>

    <form-delete action="{{ route('backend.categories.destroy', $view->category) }}"></form-delete>
    
@endsection