@if ($tags->count())
    <div class="mb-8 w-1/3 lg:w-full">
        <h3 class="title">Tags</h3>
        @foreach($tags as $tag)
            <a class="no-underline text-grey-darkest m-l-2 lowercase mb-4" href="{{ $tag->url }}">
                #{{ $tag->name }}
            </a>
        @endforeach
        <div class="text-sm p-1 mb-1 text-grey-lighter">
            <a class="no-underline text-grey-darkest" href="{{ route('tags.index') }}">
                See all tags
            </a>
        </div>
    </div>
@endif