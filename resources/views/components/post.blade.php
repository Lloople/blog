<div class=" w-full lg:flex mb-4 min-w-full">
    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
    </div>
    <div class="w-full bg-grey-lighter rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
        <div class="mb-8">
            <div class="text-black font-bold text-xl mb-2">{{ $post->title }}</div>
            <p class="text-grey-darker text-base">{{ str_limit($post->body, 200) }}</p>
        </div>
        <div class="flex items-center">
            <div class="text-sm">
                <p class="text-grey-dark">{{ date('d/m/Y') }}</p>
            </div>
        </div>
    </div>
</div>