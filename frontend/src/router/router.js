import { createRouter, createWebHistory } from 'vue-router'
import LoginScreen from '../views/LoginScreen.vue'
import RegisterScreen from '../views/RegisterScreen.vue'
import ForgetPasswordScreen from '../views/ForgetPasswordScreen.vue'
import IndexScreen from '../views/IndexScreen.vue'
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
  },
  {
    path: '/forget-password',
    name: 'ForgetPassword',
    component: ForgetPasswordScreen
  },
  {
    path: '/index',
    name: 'Index',
    component: IndexScreen
  }
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL), // Usando import.meta.env para acessar variáveis de ambiente no Vite
    routes
  })

export default router
