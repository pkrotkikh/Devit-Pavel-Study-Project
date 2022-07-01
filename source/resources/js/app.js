import { createApp } from 'vue'
import router from './router/index'
import TwitterNavbar from "./components/TwitterNavbar"
import axios from 'axios';

const app = createApp({})
app.component('twitter-navbar', TwitterNavbar)

app.use(router).mount('#app')
