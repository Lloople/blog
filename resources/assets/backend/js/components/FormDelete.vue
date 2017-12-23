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
                document.deleteForm.submit();
            });
        }
    }
</script>