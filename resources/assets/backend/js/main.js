require('../../js/bootstrap');

window.Vue = require('vue');

import { TableComponent, TableColumn } from 'vue-table-component';

Vue.component('table-component', TableComponent);
Vue.component('table-column', TableColumn);
Vue.component('posts-table', require('./components/PostsTable'));
Vue.component('post-edit', require('./components/PostEdit'));

const app = new Vue({
    el: '#app'
});