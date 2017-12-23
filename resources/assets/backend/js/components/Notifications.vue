<template>
    <div class="alert-container w-full md:w-1/3">
        <div v-for="notification in this.notifications"
             @click="removeNotification(notification)"
             :class="'alert alert-'+notification.type">
            <p>{{ notification.message }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'blog-notifications',
        props: {
            duration: {
                default: 5000,
                type: Number
            }
        },
        data () {
            return {
                notifications: []
            };
        },
        methods: {
            removeNotification (notification)
            {
                const index = this.notifications.indexOf(notification);

                if (index >= 0) {
                    this.notifications.splice(index, 1);
                }
            },
            addNotification (type, message)
            {
                const notification = { type, message };

                this.notifications.push(notification);

                setTimeout(() => {
                    this.removeNotification(notification);
                }, this.duration);
            }
        },
        mounted() {
            this.$root.$on('addSuccessNotification', (message) => {
                this.addNotification('success', message);
            });

            this.$root.$on('addErrorNotification', (message) => {
                this.addNotification('error', message);
            });
        }
    }
</script>