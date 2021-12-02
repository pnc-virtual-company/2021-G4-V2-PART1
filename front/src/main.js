import { createApp } from 'vue'

import {createRouter, createWebHistory } from "vue-router";
import App from './App.vue'

import Categoriesform from './components/category/Categoriesform.vue'
const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Categoriesform },
        { path: '/categoriesForm', component: Categoriesform },
    ]
})



const app = createApp(App);
app.use(router);
app.mount('#app');
