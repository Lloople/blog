@extends('frontend.layouts.app')

@section('content')
    @component('frontend.components.title')
        About me
    @endcomponent

    <div class="lg:w-4/5 mx-auto">
        {{ $information }}
    </div>
@endsection