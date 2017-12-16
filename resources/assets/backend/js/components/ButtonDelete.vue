<template>
    <button type="button" @click="submitForm" class="button text-lg bg-red p-4 float-right js-button-delete">
        <span class="fa fa-trash fa-fw"></span>
    </button></template>

<script>

    export default {
        name: "button-delete",
        methods: {
            submitForm() {
                this.$root.$emit('deleteFormSubmit');
            }
        }
    }
</script>