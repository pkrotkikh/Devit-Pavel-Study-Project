import { createApp } from 'vue'
import { createRouter, createWebHistory } from "vue-router";
import Home from './components/Home.vue'
import About from './components/About.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {path: '/home', name: 'Home', component: Home},
        {path: '/about', name: 'About', component: About},
    ],
});

const app = createApp({})

app.use(router).mount('#app')

