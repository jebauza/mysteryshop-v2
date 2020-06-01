
require('./bootstrap');

window.Vue = require('vue');

require('./components/layouts/AppComponent');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('main-header', require('./components/MainHeader.vue').default);


Vue.component('pagination', require('laravel-vue-pagination'));
import router from './routes';

const app = new Vue({
    el: '#app',
    router
});
