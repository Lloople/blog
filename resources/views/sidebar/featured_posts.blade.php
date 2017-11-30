@if ($postsFeatured->count())
    <div class="mb-8 w-1/3 lg:w-full">
        <h3 class="title text-{{ app('theme')->title }}">Featured Posts</h3>
        @foreach($postsFeatured as $postFeatured)
            <div class="border-l-4 text-sm p-4 mb-4 border-grey-darkest">
                <a class="no-underline text-{{ app('theme')->text }}"
                   href="{{ $postFeatured->url }}">
                    {{ $postFeatured->title }}
                </a>
            </div>
        @endforeach
    </div>
@endif
