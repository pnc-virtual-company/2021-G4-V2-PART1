
import { createRouter, createWebHistory } from "vue-router";

import Signin from '../views/Signin.vue';
import Signup from '../views/Signup.vue';
import Myevent from '../views/Myevent.vue';
import Findevent from '../views/Findevent.vue';
import Categories from '../views/Categories.vue';
// import Dialog from './components/dialog/Dialog.vue'

const routes =  [
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
    }
];

const router = createRouter({
    history:createWebHistory(),
        routes
    });
export default router
