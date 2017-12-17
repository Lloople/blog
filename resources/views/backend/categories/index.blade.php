@extends('backend.layouts.app')

@section('content')
    <div class="mt-4">
        <a class="no-underline rounded p-4 text-black shadow bg-grey-lighter" href="{{ route('backend.categories.create') }}">
            Create a category
        </a>
    </div>
    <table-resource></table-resource>
@endsection

@section('resource')
    <script>
        window.resource = {
            resource: 'categories',
            actions: {
                edit: true,
                delete: true
            },
            columns: [
                {
                    show: 'id',
                    label :'#',
                    headerClass : 'text-left w-8'
                },
                {
                    show: 'name',
                    label: 'Name',
                    headerClass: 'text-left'
                },
                {
                    show: 'active',
                    label: 'Active',
                    type: 'boolean',
                    headerClass: 'text-left'
                },
                {
                    show: 'created_at',
                    label: 'Created At',
                    headerClass: 'text-left'
                }
            ]
        }
    </script>
@endsection