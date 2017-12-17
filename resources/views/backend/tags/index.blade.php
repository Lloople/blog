@extends('backend.layouts.app')

@section('content')
   
    <table-resource></table-resource>
@endsection

@section('resource')
    <script>
        window.resource = {
            resource: 'tags',
            actions: {
                edit: false,
                delete: true
            },
            columns : [
                {
                    show: 'id',
                    label :'#',
                    headerClass : 'text-left'
                },
                {
                    show: 'name',
                    label: 'Name',
                    headerClass: 'text-left'
                }
            ]
        }
    </script>
@endsection