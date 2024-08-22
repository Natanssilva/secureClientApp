import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import Aura from '@primevue/themes/aura';   //setar tema
import './assets/styles/style.css'
import App from './App.vue'
import './assets/styles/main.css'
import './assets/styles/main.css'

const app = createApp(App);
app.use(PrimeVue, {
    theme: {
        preset: Aura
    }
});

app.mount('#app');

