import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
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
            path: '/users',
            name: 'users',
            component: require('./view/Users').default
        },
        {
            path: '/clients',
            name: 'clients',
            component: require('./view/Clients').default
        },
        {
            path: '/establishments',
            name: 'establishments',
            component: require('./view/Establishments').default
        },
        {
            path: '*',
            component: require('./view/404').default
        }
    ],
    mode: 'history'
});
