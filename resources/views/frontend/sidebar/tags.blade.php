@if ($tags->count())
    <div class="mb-8 md:w-1/2 lg:w-full w-full">
        <h3 class="title text-{{ app('theme')->title }}">Tags</h3>
        @foreach($tags as $tag)
            <a class="no-underline text-{{ app('theme')->text }} m-l-2 lowercase mb-4" href="{{ $tag->url }}">
                #{{ $tag->name }}
            </a>
        @endforeach
        <div class="text-sm p-1 mb-1">
            <a class="no-underline text-{{ app('theme')->text }}" href="{{ route('tags.index') }}">
                See all tags
            </a>
        </div>
    </div>
@endif
