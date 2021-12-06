import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'

import Signin from './components/signin_signup/Signin.vue';
import Signup from './components/signin_signup/Signup.vue';
// import Menu from './components/menu/Menu.vue';
import Myevent from './components/myevent/Myevent.vue';
import Findevent from './components/findevent/Findevent.vue';
import Categories from './components/categories/Categories.vue';
import Eventform from './components/myevent/Eventform.vue';

const router = createRouter({
    history:createWebHistory(),
    routes: [
            {
                path: "/",
                component: Signin,
            },
            {
                path: "/signin",
                component: Signin,
            },
            {
                path: "/signup",
                component: Signup,
            },
            {
                path:"/menu",
                component:Myevent,
            },
            {
                path:"/myevent",
                component:Myevent
            },
            {
                path:"/findevent",
                component:Findevent
            },
            {
                path:"/categories",
                component:Categories
            },
        ],
    });

const app = createApp(App)
app.component('event-form',Eventform),
app.use(router);
app.mount('#app');



