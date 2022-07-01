import { createApp } from 'vue'
import router from './router/index'
import TwitterNavbar from "./components/TwitterNavbar"

const app = createApp({})
app.component('twitter-navbar', TwitterNavbar)

app.use(router).mount('#app')
