import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import './assets/styles/main.css'
import '@fortawesome/fontawesome-free/css/all.css'
import router from './router/router' 
import { createApp } from 'vue'
import App from './App.vue'
import './plugins/axios.js'
import './assets/styles/element-variables.scss';

const app = createApp(App)

app.use(ElementPlus)
app.use(router)
app.mount('#app')