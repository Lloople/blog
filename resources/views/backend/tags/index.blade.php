@extends('backend.layouts.app')

@section('content')
   
    <table-resource resource="tags">
        <table-column show="id" label="#" header-class="text-left"></table-column>
        <table-column show="name" label="Name" header-class="text-left"></table-column>
    
        <table-column show="url" label="" cell-class="text-center">
            <template slot-scope="row">
                <a :href="`${row.url_delete}`" @click="confirmDelete(row, $event)" class="button text-xs bg-red">
                    <span class="fa fa-fw fa-trash"></span>
                </a>
            </template>
        </table-column>
    </table-resource>
@endsection