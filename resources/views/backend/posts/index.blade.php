@extends('backend.layouts.app')

@section('content')
    <div class="mt-4">
        <a class="no-underline rounded p-4 text-black shadow bg-grey-lighter" href="{{ route('backend.posts.create') }}">
            Create a post
        </a>
    </div>
    <table-resource></table-resource>
@endsection

@section('resource')
    <script>
        window.resource = {
            resource: 'posts',
            actions: {
                edit  : true,
                delete: true
            },
            columns: [
                {
                    show: 'id',
                    label :'#',
                    headerClass : 'text-left'
                },
                {
                    show       : 'category',
                    label      : 'Category',
                    headerClass: 'text-left hidden md:table-cell',
                    cellClass  : 'hidden md:table-cell'
                },
                {
                    show       : 'title',
                    label      : 'Title',
                    headerClass: 'text-left'
                },
                {
                    show       : 'tags',
                    label      : 'Tags',
                    headerClass: 'text-left hidden md:table-cell',
                    cellClass  : 'hidden md:table-cell'
                },
                {
                    show       : 'published_at',
                    label      : 'Date',
                    headerClass: 'text-left',
                }
            ]
        };
    </script>
@endsection