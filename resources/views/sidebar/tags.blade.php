@if ($tags->count())
    <div class="mb-8">
        <h3 class="mb-4 uppercase">Tags</h3>
        @foreach($tags as $tag)
            <a class="no-underline text-grey-darkest m-l-2 lowercase" href="{{ route('homepage') }}#{{ $tag->slug }}">
                #{{ $tag->name }}
            </a>
        @endforeach
    </div>
@endif