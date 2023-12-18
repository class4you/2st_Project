require('./bootstrap.js');

import { createApp } from 'vue';
import router from './router.js';
import store from './store.js';
import AppComponent from '../components/AppComponent.vue';
import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import ClassBoardDetailComponent from '../components/ClassBoardDetailComponent.vue';


createApp({
    components: {
        AppComponent,
        HeaderComponent,
        MainComponent,
        FooterComponent,
        RegistrationComponent,
        ClassBoardDetailComponent,
    }
})
    .use(router)
    .use(store)
    .mount("#app");