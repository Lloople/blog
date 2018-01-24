@extends('frontend.layouts.app')

@section('content')
    @component('frontend.components.title')
        About me
        @endcomponent
    
    {{ $information }}
@endsection