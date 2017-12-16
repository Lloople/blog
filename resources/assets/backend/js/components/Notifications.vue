<template>
    <div class="alert-container w-full md:w-1/3">
        <div v-for="notification in this.notifications" @click="removeNotification(notification)" class="alert"
             :class="'alert-'+notification.type">
            <p>{{ notification.message }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'blog-notifications',
        data() {
            return {
                notifications: window.notifications
            };
        },
        methods: {
            removeNotification(notification) {
                window.notifications.splice(window.notifications.indexOf(notification), 1);
            }
        }
    }
</script>