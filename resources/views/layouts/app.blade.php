<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name')) </title>

    @yield('extra-headers')
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-{{ app('theme')->background }} h-screen">
<div id="app">
    @include('components.navbar')
    
    <div class="flex flex-wrap">
        <div class="shadow-md mb-8 md:w-5/6 sm:w-full md:ml-auto md:mr-auto p-4 bg-{{ app('theme')->container_background }} rounded">
            <div class="flex flex-wrap">
                <div class="md:w-4/5 sm:w-full">
                    @yield('content')
                </div>
                <div class="w-4/5 mx-auto lg:w-1/5">
                    <div class="flex flex-wrap">
                    
                    @include('sidebar.featured_posts')
                    @include('sidebar.categories')
                    @include('sidebar.tags')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.algolia = {
        app_id: "{{ config('scout.algolia.id') }}",
        search_key: "{{ config('scout.algolia.secret') }}"
    }
</script>
<script src="{{ asset('js/app.js') }}"></script>

@yield('scripts')
</body>
</html>
