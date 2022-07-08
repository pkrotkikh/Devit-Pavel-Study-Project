import { createApp } from 'vue'
import router from './router/index'
import TwitterNavbar from "./components/components/TwitterNavbar/TwitterNavbar"
import LoginPage from "./components/pages/LoginPage"

const app = createApp({})
app.component('twitter-navbar', TwitterNavbar)
app.component('login-page', LoginPage)

app.use(router).mount('#app')
