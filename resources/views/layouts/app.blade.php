<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'David Llop Personal Blog') }}</title>
    
    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
    @yield('styles')
</head>
<body class="bg-grey-lighter h-screen">
<div id="app">
    <nav class="bg-white h-12 shadow mb-8">
        <div class="container mx-auto h-full">
            <div class="flex items-center justify-center h-12">
                <div class="mr-6">
                    <a href="{{ url('/') }}" class="no-underline">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="flex-1 text-right">
                    {{-- Something --}}
                </div>
            </div>
        </div>
    </nav>
    
    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>