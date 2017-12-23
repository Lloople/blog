require('../../js/bootstrap');

window.Vue = require('vue');

import { TableComponent, TableColumn } from 'vue-table-component';

Vue.component('table-component', TableComponent);
Vue.component('table-column', TableColumn);

Vue.component('table-resource', require('./components/TableResource'));

Vue.component('post-edit', require('./components/PostEdit'));
Vue.component('form-delete', require('./components/FormDelete'));
Vue.component('button-delete', require('./components/ButtonDelete'));

Vue.component('blog-notifications', require('./components/Notifications'));

const app = new Vue({
    el: '#app'
});