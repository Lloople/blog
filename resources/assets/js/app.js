
require('./bootstrap');

window.Vue = require('vue');

Vue.component('zap-slideout', require('./components/ZapSlideout.vue'));

const app = new Vue({
    el: '#app'
});