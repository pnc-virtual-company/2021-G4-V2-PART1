import { createApp } from 'vue';
import { createRouter, createWebHistory } from "vue-router";
import App from './App.vue';

// import Menu from './components/menu/Menu.vue'
import Signin from './components/signin_signup/Signin.vue';
import Signup from './components/signin_signup/Signup.vue';
import Myevent from './components/myevent/Myevent.vue';
import Findevent from './components/findevent/Findevent.vue';
import Categories from './components/categories/Categories.vue';
import Category_Card from './components/categories/Category_Card.vue';
import Categoriesform from './components/categories/Categoriesform.vue';
import event_card from './components/myevent/event_card.vue';
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
            }
        ],
    });

const app = createApp(App)
app.use(router);
app.component('category-card',Category_Card);
app.component('category-form',Categoriesform);
app.component('event-card',event_card)
app.mount('#app');


