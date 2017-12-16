@extends('backend.layouts.app')

@section('content')
    <div class="mt-4">
        <a class="no-underline rounded p-4 text-black shadow bg-grey-lighter" href="{{ route('backend.posts.create') }}">
            Create a post
        </a>
    </div>
    <table-resource resource="posts">
        <table-column show="category" label="Category" header-class="text-left hidden md:table-cell" cell-class="hidden md:table-cell"></table-column>
        <table-column show="title" label="Title" header-class="text-left"></table-column>
        <table-column show="tags" label="Tags" header-class="text-left hidden md:table-cell" cell-class="hidden md:table-cell"></table-column>
        <table-column show="published_at" label="Date" header-class="text-left"></table-column>
        <table-column show="url" label="" cell-class="text-center">
            <template slot-scope="row">
                <a :href="`${row.url_edit}`" class="button text-xs bg-green">
                    <span class="fa fa-fw fa-pencil"></span>
                </a>
                <a :href="`${row.url}`" target="_blank" class="button text-xs bg-blue">
                    <span class="fa fa-fw fa-eye"></span>
                </a>
                <a :href="`${row.url_delete}`" @click="parent.confirmDelete(row, $event)" class="button text-xs bg-red">
                    <span class="fa fa-fw fa-trash"></span>
                </a>
            </template>
        </table-column>
    </table-resource>
@endsection