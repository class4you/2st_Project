import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import BoardComponent from './components/BoardComponent.vue';
import store from './store';

const routes = [
    {
        path: '/',
        component: MainComponent,
    },
    {
        path: '/registration',
        component: RegistrationComponent,
    },
    {
        path: '/board',
        component: BoardComponent
    },
    {
        path: '/test',
        component: TestComponent,
    },
    {
        path: '/:path*',
        component: MainComponent,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;



