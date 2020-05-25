
require('./bootstrap');

window.Vue = require('vue');

require('./components/layouts/AppComponent');
Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/* import Router from 'vue-router';
Vue.use(Router)

const router = new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./view/Home').default
        },
        {
            path: '/prueba',
            name: 'prueba',
            component: require('./view/Prueba').default
        },
        {
            path: '*',
            component: require('./view/404').default
        }
    ]
}); */

import router from './routes';

const app = new Vue({
    el: '#app',
    router
});
