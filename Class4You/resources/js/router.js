import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardInsertComponent from '../components/BoardInsertComponent.vue';
import ClassBoardDetailComponent from '../components/ClassBoardDetailComponent.vue';
// import ClassBoardMainComponent from '../components/ClassBoardMainComponent.vue';
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
        component: BoardComponent,
    },
    {
        path: '/boardinsert',
        component: BoardInsertComponent,
    },
    {
        path: '/classboarddetail/:ClassID',
        name: 'classboarddetail',
        component: ClassBoardDetailComponent,
        props: true
    },
    // {
    //     path: '/classBoardMain/:ClassLanguageName',
    //     component: ClassBoardMainComponent,
    //     props: true,
    // },
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



