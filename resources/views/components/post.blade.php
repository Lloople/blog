<div class="post lg:flex">
    @if ($positionLeft)
        <div class="post-thumbnail lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l" style="background-image: url('{{ $post->thumbnail }}')" title="Woman holding a mug"></div>
    @endif
    <div class="post-body lg:rounded-b-none lg:rounded-r">
        <p class="post-date">{{ $post->published_at->format('d/m/Y H:i') }}</p>
        <div class="mb-4">
            <div class="post-title">{{ $post->title }}</div>
            <p class="post-resume">{{ str_limit($post->body, 200) }}</p>
        </div>
        <p class="post-date">
            @foreach($post->tags as $tag)
                <a href="{{ route('homepage') }}#{{ $tag->slug }}" class="no-underline lowercase text-sm text-grey-darkest">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </p>
    </div>
    @if (! $positionLeft)
        <div class="post-thumbnail lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l" style="background-image: url('{{ $post->thumbnail }}')" title="Woman holding a mug"></div>
    @endif
</div>