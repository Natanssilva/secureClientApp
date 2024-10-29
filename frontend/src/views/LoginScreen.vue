<template>
  <div class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
    <div class="flex flex-col justify-center items-center px-8 lg:px-20 bg-gray-100">
      <!-- Para telas maiores que 1600px -->
      <div class="hidden xl:block absolute top-0 left-0 p-4">
        <img class="h-40 md:h-52 lg:h-52 w-auto max-h-72" src="../assets/img/logo.png" alt="Logo" />
      </div>

      <!-- Para telas menores que 1600px (logo centralizada acima do Sign In) -->
      <div class="flex xl:hidden justify-center mb-4">
        <img class="h-40 md:h-52 lg:h-60 w-auto" src="../assets/img/logo.png" alt="Logo" />
      </div>

      <h1 class="text-4xl font-bold mb-2">Login</h1>
      <p class="mb-6 text-sm">
        Não possui conta?
        <span class="no-underline hover:underline text-secure-color cursor-pointer"
          >Crie agora</span
        >
      </p>

      <el-form
        :model="form"
        :rules="rules"
        ref="loginForm"
        label-position="top"
        class="w-full max-w-md"
      >
        <!-- Campos de login -->
        <el-form-item prop="email">
          <el-input
            class="w-full h-20 p-4 rounded-md"
            v-model="form.email"
            placeholder="exemplo@email.com"
            clearable
          />
        </el-form-item>

        <el-form-item prop="password">
          <el-input
            class="w-full h-20 p-4 rounded-md"
            v-model="form.password"
            type="password"
            placeholder="Digite uma senha"
            show-password
          />
        </el-form-item>

        <div class="flex justify-around items-center mb-4">
          <el-checkbox v-model="checked1" label="Remember me" size="large" />
          <span class="no-underline hover:underline text-secure-color cursor-pointer"
            >Esqueceu a senha?</span
          >
        </div>

        <el-form-item>
          <el-button
            type="primary"
            class="w-full py-3"
            round
            size="large"
            @click="submitForm(loginForm)"
          >
            Entrar
          </el-button>
        </el-form-item>
      </el-form>

      <div class="mt-4 w-full max-w-md">
        <el-divider content-position="center">OU</el-divider>

        <!-- Botão Google -->
        <div>
          <el-button
            class="w-full py-3 flex items-center justify-center mb-3 text-center"
            round
            size="large"
          >
            <i class="fab fa-google mr-2"></i>
            Continuar com Google
          </el-button>
        </div>

        <!-- Botão Facebook -->
        <div>
          <el-button
            class="w-full py-3 flex items-center justify-center mb-3 text-center"
            round
            size="large"
          >
            <i class="fab fa-facebook mr-2"></i>
            Continuar com Facebook
          </el-button>
        </div>
      </div>
    </div>

    <div
      class="hidden lg:flex flex-col justify-center items-center bg-secure-color text-white px-8 lg:px-20"
    >
      <!-- Div para centralizar o conteúdo no grid -->
      <div class="flex-grow flex flex-col justify-center items-center w-full h-full">
        <!-- Centralizando o carousel -->
        <el-carousel
          class="w-full max-w-4xl rounded-lg"
          height="600px"
          :autoplay="false"
          :interval="3000"
          indicator-position="outside"
          motion-blur
        >
          <el-carousel-item v-for="(image, index) in images" :key="index">
            <div class="flex justify-center items-center w-full h-full">
              <img
                :src="image"
                alt="carousel image"
                class="object-cover w-full h-full rounded-lg"
              />
            </div>
          </el-carousel-item>
        </el-carousel>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import { ElDivider, ElForm, ElFormItem } from 'element-plus'
import bussinesImg from '../assets/img/bussines.svg'
import evolucaoImg from '../assets/img/evolucao.svg'
import suporteImg from '../assets/img/suporte.svg'
import axios from '../plugins/axios'

export default {
  name: 'LoginScreen',
  setup() {
    // Definindo os estados reativos necessários
    const form = ref({
      email: '',
      password: ''
    })

    const rules = ref({
      email: [
        { required: true, message: 'O email é obrigatório', trigger: 'blur' },
        {
          type: 'email',
          message: 'Por favor, insira um e-mail válido',
          trigger: ['blur', 'change']
        }
      ],
      password: [
        { required: true, message: 'A senha é obrigatória', trigger: 'blur' },
        { min: 6, message: 'A senha deve ter no mínimo 6 caracteres', trigger: 'blur' }
      ]
    })

    const checked1 = ref(false) // Para o checkbox "Remember me"
    const images = ref([bussinesImg, evolucaoImg, suporteImg])
    const loginForm = ref(null)

    const submitForm = () => {
      loginForm.value.validate((valid) => {
        if (!valid) {
          return false
        }

        axios
          .post('login', form.value)
          .then((response) => {
            console.log(response.data)
          })
          .catch((error) => {
            console.error('Erro ao fazer login:', error)
          })
      })
    }

    return {
      form,
      rules,
      checked1,
      images,
      submitForm,
      loginForm
    }
  }
}
</script>

<style scoped>
body,
html {
  margin: 0;
  padding: 0;
  height: 100%;
  font-family: Arial, sans-serif;
}

i.fab {
  font-size: 1.25rem;
}

.el-carousel__item h3 {
  color: #ffffff;
  line-height: 100%;
  text-align: center;
}

.el-carousel__item:nth-child(2n) {
  background-color: #99a9bf;
}

.el-carousel__item:nth-child(2n + 1) {
  background-color: #d3dce6;
}
</style>
