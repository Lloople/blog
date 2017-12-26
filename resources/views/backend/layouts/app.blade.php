<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="antialiased">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', config('app.name')) </title>
    
    @yield('extra-headers')
    <link href="{{ mix('/css/backend.css') }}" rel="stylesheet">
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
                @auth
                <div class="nav-container lg:w-3/4 lg:text-left">
                    <a class="nav-item {{ request()->routeIs('backend.posts*') ? 'active' : '' }}" href="{{ route('backend.posts.index') }}">
                        Posts
                    </a>
                    <a class="nav-item {{ request()->routeIs('backend.categories*') ? 'active' : '' }}" href="{{ route('backend.categories.index') }}">
                        Categories
                    </a>
                    <a class="nav-item {{ request()->routeIs('backend.tags.index') ? 'active' : '' }}" href="{{ route('backend.tags.index') }}">
                        Tags
                    </a>
                    <a class="nav-item {{ request()->routeIs('backend.themes*') ? 'active' : '' }}" href="{{ route('backend.themes.index') }}">
                        Themes
                    </a>
                </div>
                <div class="nav-container lg:w-1/4 lg:text-right">
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="nav-item uppercase">
                            Logout
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </nav>
    <blog-notifications :duration="6000"></blog-notifications>
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

@yield('resource')
<script src="{{ mix('/js/manifest.js') }}"></script>
<script src="{{ mix('/js/vendor.js') }}"></script>
<script src="{{ mix('/js/backend.js') }}"></script>

<script>
    const notifications = {!! json_encode(\Lloople\Notificator\Notificator::toArray()) !!};

    window.onload = () => {
        notifications.forEach((notification) => {
            const notificationType = notification.type[0].toUpperCase() + notification.type.substring(1);
            
            const type = 'add' + notificationType + 'Notification';
            
            app.__vue__.$emit(type, notification.message);
        });
    };
</script>

@yield('scripts')
</body>
</html>
