import './bootstrap'
import '../css/styles.scss'
import '../css/variables.css'
import { createApp } from 'vue'
import router from './router'
import App from './App.vue'

createApp(App)
    .use(router)
    .mount('#app')