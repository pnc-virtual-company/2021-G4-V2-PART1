import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue'

import Signin from './components/signin_signup/Signin.vue';
import Signup from './components/signin_signup/Signup.vue';

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
        ],
    });

const app = createApp(App)
app.use(router);
app.mount('#app')
