<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name')) </title>
    
    @include('frontend.components.google_analytics')

    @yield('extra-headers')
    <link href="{{ mix('/css/frontend.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-{{ app('theme')->background }} h-screen">
<div id="app">
    @include('frontend.components.navbar')
    
    <div class="flex flex-wrap">
        <div class="shadow-md mb-8 md:w-5/6 sm:w-full md:ml-auto md:mr-auto p-4 bg-{{ app('theme')->container_background }} rounded">
            <div class="flex flex-wrap">
                <div class="md:w-4/5 sm:w-full">
                    @yield('content')
                </div>
                <div class="w-4/5 mx-auto lg:w-1/5">
                    <div class="flex flex-wrap">
                    
                    @include('frontend.sidebar.featured_posts')
                    @include('frontend.sidebar.categories')
                    @include('frontend.sidebar.tags')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>
        <div>
        @if(config('blog.twitter_username') !== '')
            <a  class="no-underline" href="https://twitter.com/{{ config('blog.twitter_username') }}" target="_blank">
                <span class="fa fa-twitter fa-2x"></span>
            </a>
        @endif
    
        @if(config('blog.github_username') !== '')
            <a class="no-underline" href="https://github.com/{{ config('blog.github_username') }}" target="_blank">
                <span class="fa fa-github fa-2x"></span>
            </a>
        @endif
        </div>
    </footer>
</div>
<script>
    window.algolia = {
        app_id: "{{ config('scout.algolia.id') }}",
        search_key: "{{ config('scout.algolia.secret') }}"
    }
</script>
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/frontend.js') }}"></script>

@yield('scripts')
</body>
</html>
