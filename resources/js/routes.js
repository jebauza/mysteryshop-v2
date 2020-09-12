import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./view/Home').default,
            meta: {
                breadcrumb: [
                    { name: 'Home' }
                ]
            }
        },
        {
            path: '/enterprises',
            name: 'enterprises',
            component: require('./components/enterprises/EnterprisesComponent').default
        },
        {
            path: '/users',
            name: 'users',
            component: require('./components/users/UsersComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Usuarios' }
                ]
            }
        },
        {
            path: '/clients',
            name: 'clients',
            component: require('./components/clients/ClientsComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Clientes' }
                ]
            }
        },
        {
            path: '/establishments',
            name: 'establishments',
            component: require('./components/establishments/EstablishmentsComponent').default
        },
        {
            path: '/indicators',
            name: 'indicators',
            component: require('./components/indicators/IndicatorsComponent').default
        },
        {
            path: '/group/indicators',
            name: 'indicator_groups',
            component: require('./components/indicators_group/IndicatorsGroupComponent').default
        },
        {
            path: '/surveys',
            name: 'surveys',
            component: require('./components/surveys/SurveysComponent').default
        },
        {
            path: '*',
            component: require('./view/404').default
        }
    ],
    mode: 'history'
});
