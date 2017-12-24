<template>
    <div id="search-posts" class="relative">
        <input placeholder="Search..." type="text" class="search-input lg:w-auto" v-model="query" v-on:input="search">
        <div v-if="query.length" class="search-results lg:mx-0 lg:pin-r">
            <div v-if="results.length">
                <ul class="list-reset">
                    <li v-for="result in results">
                        <a class="search-results-result" :href="'/posts/'+result.slug" v-html="result._highlightResult.title.value"></a>
                    </li>
                </ul>
            </div>
            <div v-else>
                <ul class="list-reset">
                    <li>
                        <p class="search-results-result">
                            No posts found
                        </p>
                    </li>
                </ul>
            </div>
            <div class="lg:mx-0 lg:pin-r p-2">
                <img src="img/algolia_search.svg" alt="Search by Algolia">
            </div>
        </div>
    </div>
</template>

<script>
    import algoliasearch from 'algoliasearch';

    export default {

        data() {
            return {
                query: '',
                results: []
            }
        },

        created() {
            const client = algoliasearch(window.algolia.app_id, window.algolia.search_key);

            this.index = client.initIndex('posts');
        },

        methods: {
            search(e) {
                this.index.search({
                    query: this.query
                }, (error, response) => {
                    this.results = response.hits;
                })
            }
        }
    }
</script>