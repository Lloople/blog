<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name')) </title>
    
    @yield('extra-headers')
    
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
    @yield('styles')
</head>
<body class="bg-grey-lighter h-screen">
<div id="app">
    <nav class="bg-black h-12 shadow mb-8">
        <div class="container mx-auto h-full">
            <div class="flex items-center justify-center h-12">
                <div class="mr-6">
                    <a href="{{ route('posts.index') }}" class="no-underline text-white">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="flex-1 text-right">
                    @foreach($navbarMenu as $menu)
                        <a class="navbar-link {{ $menu->active ? 'navbar-link-active' : '' }}" href="{{ $menu->url }}">{{ $menu->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>
    <div class="flex flex-wrap">
        <div class="shadow-md mb-8 md:w-5/6 sm:w-full md:ml-auto md:mr-auto p-4 bg-white rounded">
            <div class="flex flex-wrap">
                <div class="md:w-4/5 sm:w-full">
                    @yield('content')
                </div>
                <div class="md:w-1/5 sm:w-full">
        
                    @include('sidebar.featured_posts')
                    @include('sidebar.categories')
                    @include('sidebar.tags')
    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>