@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap">
        <div class="md:w-4/5 sm:w-full md:ml-auto md:mr-auto p-4 bg-white rounded">
            <div class="flex flex-wrap">
                <div class="md:w-4/5 sm:w-full">
                    <div class="flex flex-wrap posts-list">
                        @foreach($posts as $post)
                            <div class="w-4/5 ml-auto mr-auto">
                                @component('components.post', ['post' => $post, 'positionLeft' => $loop->index % 2 == 0])@endcomponent
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="md:w-1/5 sm:w-full">
    
                    @include('sidebar.featured_posts')
                    @include('sidebar.categories')
                    @include('sidebar.tags')
                    
                </div>
            </div>
        </div>
        
    </div>
    
@endsection
