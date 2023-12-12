import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import MainComponent from '../components/MainComponent.vue';
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
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;