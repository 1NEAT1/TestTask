import Vue from 'vue';

require('./bootstrap');

window.Vue = require('vue');

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

Vue.component('show-component', require('./components/ShowComponent.vue'));
Vue.component('create-component', require('./components/CreateComponent.vue'));
Vue.component('email-component', require('./components/EmailComponent.vue'));


const app = new Vue({
    el: '#app'
});
