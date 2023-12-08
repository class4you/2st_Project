import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import store from './store';

const routes = [
    {
        path: '/',
        component: AppComponent,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;