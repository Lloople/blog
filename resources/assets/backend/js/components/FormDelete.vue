<template>
    <form name="deleteForm" method="POST" :action=" action ">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" :value="token">
    </form>
</template>

<script>
    export default {
        name: "form-delete",
        props: {
            action : ''
        },
        data() {
            return {
                token: window.axios.defaults.headers.common['X-CSRF-TOKEN']
            }
        },
        mounted() {
            this.$root.$on('deleteFormSubmit', () => {
                if (confirm("Are you sure you want to delete this item? This action cannot be undone.")) {
                    document.deleteForm.submit();
                }
            });
        }
    }
</script>