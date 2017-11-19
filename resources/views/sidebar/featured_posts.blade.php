@if ($postsFeatured->count())
    <div class="mb-8">
        <h3 class="mb-4 uppercase">Featured Posts</h3>
        @foreach($postsFeatured as $postFeatured)
            <div class="border-l-4 text-sm p-4 mb-4 text-grey-lighter">
                <a class="no-underline text-blue-darkest" href="{{ route('posts.show', $postFeatured->slug) }}">{{ $postFeatured->title }}</a>
            </div>
        @endforeach
    </div>
@endif