@if ($categories->count())
    <div class="mb-8 w-1/3 lg:w-full">
        <h3 class="title">Categories</h3>
        @foreach($categories as $category)
            <div class="text-sm p-1 mb-1 text-grey-lighter">
                <a class="no-underline text-grey-darkest" href="{{ route('categories.show', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </div>
        @endforeach
        <div class="text-sm p-1 mb-1 text-grey-lighter">
            <a class="no-underline text-grey-darkest" href="{{ route('categories.index') }}">
                See all categories
            </a>
        </div>
    </div>
@endif
