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
            component: require('./components/enterprises/EnterprisesComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Enterprises' }
                ]
            }
        },
        {
            path: '/users',
            name: 'users',
            component: require('./components/users/UsersComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Users' }
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
                    { name: 'Clients' }
                ]
            }
        },
        {
            path: '/establishments',
            name: 'establishments',
            component: require('./components/establishments/EstablishmentsComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Establishments' }
                ]
            }
        }, {
            path: '/establishment-types',
            name: 'establishments_types',
            component: require('./components/establishment_types/EstablishmentTypesComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Establishments types' }
                ]
            }
        },
        {
            path: '/indicators',
            name: 'indicators',
            component: require('./components/indicators/IndicatorsComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Indicators' }
                ]
            }
        },
        {
            path: '/group/indicators',
            name: 'indicator_groups',
            component: require('./components/indicators_group/IndicatorsGroupComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Indicator groups' }
                ]
            }
        },
        {
            path: '/surveys',
            name: 'surveys',
            component: require('./components/surveys/SurveysComponent').default,
            meta: {
                breadcrumb: [
                    { name: 'Home', link: '/' },
                    { name: 'Surveys' }
                ]
            }
        },
        {
            path: '*',
            component: require('./view/404').default
        }
    ],
    mode: 'history'
});
