@extends('backend.layouts.app')

@section('content')
    <div class="mt-4">
        <a class="no-underline rounded p-4 text-black shadow bg-grey-lighter" href="{{ route('backend.categories.create') }}">
            Create a category
        </a>
    </div>
    <table-resource resource="categories">
        <table-column show="name" label="Name" header-class="text-left"></table-column>
        <table-column show="active" label="Active" header-class="text-center" cell-class="text-center">
            <template slot-scope="row">
                <span class="fa" :class="[ row.active ? 'fa-check text-green' : 'fa-remove text-red' ]"></span>
            </template>
        </table-column>
        <table-column show="created_at" label="Created At" header-class="text-left"></table-column>
        <table-column show="url" label="" cell-class="text-center">
            <template slot-scope="row">
                <a :href="`${row.url_edit}`" class="button text-xs bg-green">
                    <span class="fa fa-fw fa-pencil"></span>
                </a>
                <a :href="`${row.url_delete}`" @click="confirmDelete(row, $event)" class="button text-xs bg-red">
                    <span class="fa fa-fw fa-trash"></span>
                </a>
            </template>
        </table-column>
    </table-resource>
@endsection