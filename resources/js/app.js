
require('./bootstrap');

window.Vue = require('vue');

Vue.component('App', require('./components/App.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));

import VueSimpleAlert from "vue-simple-alert";
Vue.use(VueSimpleAlert);
import router from './routes';

const app = new Vue({
    el: '#app',
    router,
    VueSimpleAlert
});
