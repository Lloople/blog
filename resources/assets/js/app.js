require('./bootstrap');

window.Vue = require('vue');

Vue.component('instant-search', require('./components/InstantSearch.vue'));

const app = new Vue({
    el: '#app'
});