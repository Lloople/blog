<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name')) </title>
    
    @yield('extra-headers')
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-{{ app('theme')->background }} h-screen">
<div id="app">
    <nav class="bg-{{ app('theme')->background }} lg:h-24 my-8 lg:my-0 md:w-5/6 md:mx-auto">
        <div class="mx-auto h-full">
            <div class="lg:flex items-center justify-between lg:h-24">
                <div class="lg:mr-6 block text-center">
                    <a href="{{ url('/') }}" class="no-underline w-full text-center mx-auto">
                        <img class="shadow-md rounded-full w-16" src="{{ url('img/thumbnail.jpg') }}" alt="{{ config('app.name') }}">
                    </a>
                </div>
                <div class="flex-1 lg:w-3/4 text-center lg:text-left m-8 uppercase text-sm no-underline">
                
                </div>
            </div>
        </div>
    </nav>
    
    <div class="flex flex-wrap">
        <div class="shadow-md mb-8 md:w-5/6 sm:w-full md:ml-auto md:mr-auto p-4 bg-{{ app('theme')->container_background }} rounded">
            <div class="flex flex-wrap">
                <div class="w-full">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/backend.js') }}"></script>

@yield('scripts')
</body>
</html>
