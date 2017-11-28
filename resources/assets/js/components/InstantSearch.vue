<template>
    <ais-index :search-store="searchStore">
        <ais-input></ais-input>
        <ais-results v-show="searchStore.query.length > 0">
            <template slot-scope="{ result }">
                <h2>
                    <ais-highlight :result="result" attribute-name="name"></ais-highlight>
                </h2>
            </template>
        </ais-results>
    </ais-index>
</template>

<script>
    import { createFromAlgoliaCredentials } from 'vue-instantsearch';

    const searchStore = createFromAlgoliaCredentials(window.algolia.app_id, window.algolia.search_key);

    export default {
        data() {
            return { searchStore };
        }
    }
</script>