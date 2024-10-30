import { createRouter, createWebHistory } from 'vue-router'
import LoginScreen from '../views/LoginScreen.vue'
import RegisterScreen from '../views/RegisterScreen.vue'
// Importar outras views conforme necessário

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: LoginScreen
  },
  {
    path: '/register',
    name: 'Register',
    component: RegisterScreen
  }
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL), // Usando import.meta.env para acessar variáveis de ambiente no Vite
    routes
  })

export default router
