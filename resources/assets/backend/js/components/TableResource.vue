<template>
    <table-component
        :data="fetchData"
        :show-caption="false"
        filter-placeholder="Search..."
        table-class="table-component-table"
        ref="table"
    >
        <slot></slot>
    </table-component>
</template>

<script>
    require('babel-regenerator-runtime');

    import axios from 'axios';

    var previousFilter = '';
    
    export default {
        props: {
            resource: ''
        },
        methods: {
            async fetchData({ page, filter, sort }) {
                if (filter != previousFilter) {
                    page = 0;
                }

                previousFilter = filter;

                const response = await axios.get('/backend/resources/'+this.resource+'?page='+page+'&q='+filter, { page, filter });

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
                if (confirm("Are you sure you want to delete the item? This action cannot be undone")) {
                    await axios.delete(row.url_delete);

                    if (! response.data.result) {
                        alert(response.data.message);
                    } else {
                        this.$refs.table.refresh();
                        window.notifications.push({
                            type: success,
                            message: response.data.message
                        })
                    }
                }
            }
        }
    }
</script>