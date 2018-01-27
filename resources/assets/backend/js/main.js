require('../../js/bootstrap');

window.Vue = require('vue');

Vue.component('table-resource', require('./components/TableResource'));
Vue.component('post-edit', require('./components/PostEdit'));
Vue.component('form-delete', require('./components/FormDelete'));
Vue.component('button-delete', require('./components/ButtonDelete'));
Vue.component('blog-notifications', require('./components/Notifications'));
Vue.component('tags-input', require('./components/Tags'));

const app = new Vue({
    el: '#app'
});