import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import Aura from '@primevue/themes/aura';   //setar tema
import './assets/styles/style.css'
import './assets/styles/main.css'
import App from './App.vue'


const app = createApp(App);
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            prefix: 'p',
            darkModeSelector: "false",
            cssLayer: false
        }
    },

    // Adicionando estilo global para a classe de input do prime VUE
    pt: {    
        global:{
            css: `
            .p-inputtext{   
                width:100%;
            }
            `
        }
        
    }
});

app.mount('#app');

