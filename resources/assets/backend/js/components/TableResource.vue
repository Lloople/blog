<template>
    <table-component
        :data="fetchData"
        :show-caption="false"
        filter-placeholder="Search..."
        table-class="table-component-table"
        ref="table"
    >
        <table-column v-for="column in columns"
            :show="column.show"
            :label="column.label"
            :header-class="column.headerClass"
            :cell-class="column.cellClass"
        >
            <div v-if="column.type === 'boolean'">
                <template slot-scope="row">
                    <span class="fa" :class="[ row[column.show] ? 'fa-check text-green' : 'fa-remove text-red' ]"></span>
                </template>
            </div>


        </table-column>

        <table-column v-show="actions.edit || actions.delete" label="" cell-class="text-center">
            <template slot-scope="row">
                <a v-show="actions.edit" :href="`${row.url_edit}`" class="button text-xs bg-green">
                    <span class="fa fa-fw fa-pencil"></span>
                </a>
                <a v-show="actions.delete" :href="`${row.url_delete}`" @click="confirmDelete(row, $event)" class="button text-xs bg-red">
                    <span class="fa fa-fw fa-trash"></span>
                </a>
            </template>
        </table-column>
    </table-component>
</template>

<script>
    require('babel-regenerator-runtime');

    import axios from 'axios';

    /**
     *  <template slot-scope="row">
     <span v-show="column.type === 'boolean'" class="fa" :class="[ row[column.show] ? 'fa-check text-green' : 'fa-remove text-red' ]"></span>
     </template>
     * @type {string}
     */
    var previousFilter = '';
    
    export default {
        data() {
            return {
                resource : window.resource.resource,
                columns : window.resource.columns,
                actions : window.resource.actions
            }
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
                    const response = await axios.delete(row.url_delete);

                    if (! response.data.result) {
                        window.notifications.push({
                            type: 'error',
                            message: response.data.message
                        });
                    } else {
                        this.$refs.table.refresh();
                        window.notifications.push({
                            type: 'success',
                            message: response.data.message
                        });
                    }
                }
            }
        }
    }
</script>