import { createRouter, createWebHistory } from "vue-router";
import Home from '../components/pages/Home.vue'
import About from '../components/pages/About.vue'
import LoginPage from '../components/pages/LoginPage.vue'

const routes = [
    {path: '/home', name: 'Home', component: Home},
    {path: '/about', name: 'About', component: About},
    {path: '/login', name: 'Login', component: LoginPage},
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router
