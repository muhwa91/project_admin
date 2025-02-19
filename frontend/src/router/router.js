import { createRouter, createWebHistory } from 'vue-router';
// 로그인
import Login from '../pages/auth/Login.vue';
import Home from '../pages/Home.vue';
import About from '../pages/About.vue';

const routes = [
    { path: '/', component: Login },
    { path: '/home', component: Home },
    { path: '/about', component: About },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
