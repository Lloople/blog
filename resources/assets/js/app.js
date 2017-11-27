require('./bootstrap');

window.Vue = require('vue');

import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

Vue.component('algolia-instantsearch', require('./components/InstantSearch.vue'));

const app = new Vue({
    el: '#app'
});