<template>
    <button type="button" @click="submitForm" class="button text-lg bg-red p-4 float-right js-button-delete">
        <span class="fa fa-trash fa-fw"></span>
    </button>
</template>

<script>
    export default {
        name: "button-delete",
        methods: {
            submitForm() {
                if (confirm("Are you sure you want to delete this item? This action cannot be undone.")) {
                    this.$root.$emit('deleteFormSubmit');
                }
            }
        }
    }
</script>