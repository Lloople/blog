<nav class="bg-{{ app('theme')->background }} lg:h-24 my-8 lg:my-0 md:w-5/6 md:mx-auto">
    <div class="mx-auto h-full">
        <div class="lg:flex items-center justify-between lg:h-24">
            <div class="lg:mr-6 block text-center">
                <a href="{{ url('/') }}" class="no-underline w-full text-center mx-auto">
                    <img class="shadow-md rounded-full w-16" src="{{ url('img/thumbnail.jpg') }}" alt="{{ config('app.name') }}">
                </a>
            </div>
            <div class="flex-1 lg:w-3/4 text-center lg:text-left m-8 uppercase text-sm no-underline">
                @foreach($navbarMenu as $menuElement)
                    <a class="no-underline rounded p-4 text-{{ app('theme')->menu_item_text }} {{ $menuElement->active ? 'text-'.app('theme')->menu_item_active_text.' shadow-md bg-'.app('theme')->menu_item_active_background : '' }}" href="{{ $menuElement->url }}">
                        {{ $menuElement->title }}
                    </a>
                @endforeach
            </div>
            <div class="flex-1 block text-center lg:text-right">
                <instant-search></instant-search>
            </div>
        </div>
    </div>
</nav>
