<template>
    <div>
        <multiselect
                v-model="value"
                tag-placeholder="Add this as new tag"
                placeholder="Search or add a tag"
                :options="options"
                :multiple="true"
                :taggable="true"
                @tag="addTag">
        </multiselect>
        <input v-for="value in this.value" type="hidden" :name="`${inputname}[]`" :value="value">
    </div>


</template>

<script>
    import Multiselect from 'vue-multiselect'

    export default {
        name: 'tags-input',
        components: {
            'multiselect': Multiselect
        },
        props: ['inputname', 'options', 'value'],
        methods   : {
            addTag(newTag) {
                this.options.push(newTag);
                this.value.push(newTag);
            }
        },

    }
</script>