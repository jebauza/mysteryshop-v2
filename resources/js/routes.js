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
            path: '/enterprises',
            name: 'enterprises',
            component: require('./view/Enterprises').default
        },
        {
            path: '/users',
            name: 'users',
            component: require('./view/Users').default
        },
        {
            path: '*',
            component: require('./view/404').default
        }
    ],
    mode: 'history'
});
