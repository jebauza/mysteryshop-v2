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
            path: '/indicators',
            name: 'indicators',
            component: require('./view/Indicators').default
        },
        {
            path: '/group/indicators',
            name: 'indicator_groups',
            component: require('./view/IndicatorsGroup').default
        },
        {
            path: '/surveys',
            name: 'surveys',
            component: require('./view/Surveys').default
        },
        {
            path: '*',
            component: require('./view/404').default
        }
    ],
    mode: 'history'
});
