<template>
    <table-component
        :data="fetchData"
        filter-input-class="table-component-search"
        show-caption="false"
        sort-by="published_at"
        filter-placeholder="Search posts..."
        table-class="table-component-table"
    >
        <table-column show="title" label="Title"></table-column>
        <table-column show="published_at" label="Published Date" data-type="date:DD/MM/YYYY"></table-column>
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

                this.removeCurrentActivePage();


                const response = await axios.get('/api/posts?page='+page+'&q='+filter, { page, filter });
                this.setPageActive();

                return {
                    data: response.data.data,
                    pagination : {
                        totalPages: response.data.last_page,
                        currentPage: page,
                        count: response.data.count
                    }
                }
            },

            removeCurrentActivePage() {
                document.querySelectorAll('ul.pagination>li>a').forEach((pageBtn) => {
                    pageBtn.classList.remove('text-white', 'bg-black', 'rounded', 'shadow');
                });
            },
            setPageActive() {
                let activePage = document.querySelector('ul.pagination>li.active>a');

                if (activePage) {
                    activePage.classList.add('text-white', 'bg-black', 'rounded', 'shadow');
                }
            }
        }
    }
</script>