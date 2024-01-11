import { createWebHistory, createRouter } from 'vue-router';
import AppComponent from '../components/AppComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import TestComponent from '../components/TestComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardInsertComponent from '../components/BoardInsertComponent.vue';
import BoardDetailComponent from '../components/BoardDetailComponent.vue';
import BoardUpdateComponent from '../components/BoardUpdateComponent.vue';
import ClassBoardDetailComponent from '../components/ClassBoardDetailComponent.vue';
import ClassDatailWatchComponent from '../components/ClassDatailWatchComponent.vue';
import UserMyPageComponent from '../components/UserMyPageComponent.vue';
import LoadingComponent from '../components/LoadingComponent.vue';
import AdminMainComponent from '../components/AdminMainComponent.vue';
import AdminUserDataComponent from '../components/AdminUserDataComponent.vue';
import AdminBoardCommunityDataComponent from '../components/AdminBoardCommunityDataComponent.vue';
import AdminUserClassDataComponent from '../components/AdminUserClassDataComponent.vue';
import AdminUserStateDataComponent from '../components/AdminUserStateDataComponent.vue';
import AdminBoardQuestionDataComponent from '../components/AdminBoardQuestionDataComponent.vue';
import AdminBoardReportDataComponent from '../components/AdminBoardReportDataComponent.vue';
import AdminLoginComponent from '../components/AdminLoginComponent.vue';
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
    // {
    //     path: '/board/:page',
    //     component: BoardComponent,
    //     name: 'board-page'
    // },
    {
        path: '/boardinsert',
        name: 'BoardInsert',
        component: BoardInsertComponent,
    },
    {
        path: '/boardupdate/:BoardID',
        name: 'BoardUpdate',
        component: BoardUpdateComponent,
        props: true
    },
    {
        path: '/classboarddetail/:ClassID',
        // name: 'classboarddetail',
        component: ClassBoardDetailComponent,
        props: true
    },
    {
        path: '/boarddetail/:BoardID',
        // name: 'classboarddetail',
        component: BoardDetailComponent,
        props: true
    },
    // {
    //     path: '/classBoardMain/:ClassLanguageName',
    //     component: ClassBoardMainComponent,
    //     props: true,
    // },
    {
        path: '/usermypage',
        component: UserMyPageComponent,
    },
    {
        path: '/classwatch/:ClassID',
        component: ClassDatailWatchComponent,
        props: true
    },
    {
        path: '/loading',
        component: LoadingComponent,
    },
    {
        path: '/adminlogin',
        component: AdminLoginComponent,
    },
    {
        path: '/adminmain',
        component: AdminMainComponent,
    },
    {
        path: '/adminuserdata',
        component: AdminUserDataComponent,
    },
    {
        path: '/adminuserclassdata',
        component: AdminUserClassDataComponent,
    },
    {
        path: '/adminuserstatedata',
        component: AdminUserStateDataComponent,
    },
    {
        path: '/adminboardquestiondata',
        component: AdminBoardQuestionDataComponent,
    },
    {
        path: '/adminboardcommunitydata',
        component: AdminBoardCommunityDataComponent,
    },
    {
        path: '/adminboardreportdata',
        component: AdminBoardReportDataComponent,
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

router.beforeEach((to, from, next) => {
    
    const userId = localStorage.getItem('UserID');

    if (!userId) {
        // 사용자 아이디가 없는 경우
        if (to.path === '/usermypage' || to.path === '/boardinsert' || to.path.startsWith('/boardupdate/') || to.path.startsWith('/classwatch/')) {
            next('/');
        } else {
            // 다른 경우에는 정상적으로 진행
            next();
        }
    } else {
        // 사용자 아이디가 있는 경우는 정상적으로 진행
        next();
    }

});

router.beforeEach((to, from, next) => {
    
    const instructorId = localStorage.getItem('InstructorID');

    if (!instructorId) {
        if (to.path === '/adminmain' || to.path === '/adminuserdata' || to.path === '/adminuserclassdata' || to.path === '/adminuserstatedata' || to.path === '/adminboardquestiondata' || to.path === '/adminboardcommunitydata' || to.path === '/adminboardreportdata') {
            next('/adminlogin');
        } else {
            // 다른 경우에는 정상적으로 진행
            next();
        }
    } else {
        next();
    }
});


export default router;
