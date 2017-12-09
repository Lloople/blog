<template>
    <table-component
        :data="fetchData"
        :show-caption="false"
        filter-placeholder="Search posts..."
        table-class="table-component-table"
        ref="table"
    >
        <table-column show="category" label="Category" header-class="text-left hidden md:table-cell" cell-class="hidden md:table-cell"></table-column>
        <table-column show="title" label="Title" header-class="text-left"></table-column>
        <table-column show="tags" label="Tags" header-class="text-left hidden md:table-cell" cell-class="hidden md:table-cell"></table-column>
        <table-column show="published_at" label="Date" header-class="text-left"></table-column>
        <table-column show="url" label="" cell-class="text-center">
            <template slot-scope="row">
                <a :href="`${row.url_edit}`" class="button text-xs bg-green">
                    <span class="fas fa-fw fa-pencil-alt"></span>
                </a>
                <a :href="`${row.url}`" target="_blank" class="button text-xs bg-blue">
                    <span class="fas fa-fw fa-eye"></span>
                </a>
                <a :href="`${row.url_delete}`" @click="confirmDelete(row, $event)" class="button text-xs bg-red">
                    <span class="fas fa-fw fa-trash"></span>
                </a>
            </template>
        </table-column>
    </table-component>
</template>

<script>
    require('babel-regenerator-runtime');

    import axios from 'axios';

    var previousFilter = '';
    
    export default {
        methods: {
            async fetchData({ page, filter, sort }) {
                if (filter != previousFilter) {
                    page = 0;
                }

                previousFilter = filter;

                const response = await axios.get('/backend/resources/posts?page='+page+'&q='+filter, { page, filter });

                return {
                    data: response.data.data,
                    pagination : {
                        totalPages: response.data.meta.last_page,
                        currentPage: page,
                        count: response.data.meta.total
                    }
                }
            },
            async confirmDelete(row, ev) {
                ev.preventDefault();
                if (confirm("Are you sure you want to delete the post '"+row.title+"'? This action cannot be undone")) {
                    await axios.delete(row.url_delete);

                    this.$refs.table.refresh();
                }
            }
        }
    }
</script>