require('../../js/bootstrap');

window.Vue = require('vue');

Vue.component('instant-search', require('./components/InstantSearch.vue'));

const navbar = new Vue({
    el: '#navbar',
});