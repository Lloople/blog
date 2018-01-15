<template>
    <textarea name="body" id="body">{{ this.content }}</textarea>
</template>

<script>
    import SimpleMDE from 'simplemde';

    export default {
        name: "post-edit",
        props: {
            content: ''
        },
        mounted() {
            var editor = new SimpleMDE({
                element: document.querySelector('#body'),
                spellChecker: true
            });
        }
    }
</script>