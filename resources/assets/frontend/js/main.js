require('../../js/bootstrap');

window.Vue = require('vue');

Vue.component('instant-search', require('./components/InstantSearch.vue'));

// TODO: put highlight.js somehow ¯\_(ツ)_/¯

const app = new Vue({
    el: '#app'
});