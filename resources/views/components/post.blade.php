<div class="post lg:flex">
    <div class="post-thumbnail lg:h-auto lg:w-48 lg:rounded-t-none lg:rounded-l" style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
    </div>
    <div class="post-body lg:rounded-b-none lg:rounded-r">
        <div class="mb-8">
            <div class="post-title">{{ $post->title }}</div>
            <p class="post-resume">{{ str_limit($post->body, 200) }}</p>
        </div>
        <div class="flex items-center">
            <div class="text-sm">
                <p class="text-grey-dark">{{ date('d/m/Y') }}</p>
            </div>
        </div>
    </div>
</div>