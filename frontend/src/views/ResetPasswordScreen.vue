<template>
  <div class="min-h-screen flex justify-center items-center bg-gray-100">
    <div class="flex flex-col justify-center items-center px-4 lg:px-20 w-full">
      <!-- Logo para telas maiores que 1600px-->
      <div class="hidden xl:block absolute top-0 left-32 p-4">
        <img class="h-60 w-auto max-h-72" src="../assets/img/logo.png" alt="Logo" />
      </div>
      <!-- Logo para telas menores que 1600px  -->
      <div class="flex xl:hidden justify-center mb-4">
        <img class="h-60 w-auto" src="../assets/img/logo.png" alt="Logo" />
      </div>

      <h1 class="text-center text-4xl font-bold mb-2">Redefinição de Senha</h1>

      <el-form
        :model="form"
        :rules="rules"
        ref="resetPasswordForm"
        label-position="top"
        class="w-full max-w-md"
      >
        <el-form-item prop="password">
          <el-input
            class="w-full h-20 p-4 rounded-md"
            v-model="form.password"
            placeholder="Digite uma nova senha"
            clearable
          />
        </el-form-item>

        <el-form-item>
          <el-button
            type="primary"
            class="bttn-secure w-full py-3"
            round
            size="large"
            @click="resetPassword"
          >
            Redefinir
          </el-button>
        </el-form-item>
      </el-form>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import axios from '../plugins/axios'

export default {
  name: 'ResetPasswordScreen',
  setup() {
    
    const form = ref({
      password: ''
    })

    const rules = ref({
      password: [
        { required: true, message: 'A senha é obrigatória', trigger: 'blur' },
        { min: 6, message: 'A senha deve ter no mínimo 6 caracteres', trigger: 'blur' }
      ]
    })

    const resetPasswordForm = ref(null)

    const resetPassword = () => {
      resetPasswordForm.value.validate((valid) => {
        if (!valid) {
          return false
        }

        axios
          .post('users', form.value)
          .then((response) => {
            return ElMessage({
              showClose: true,
              message: 'Usuário Cadastrado com sucesso!',
              grouping: true,
              type: 'success'
            })
          })
          .catch((error) => {
            ElMessage({
              showClose: true,
              message: 'Ocorreu um erro. Por favor, tente novamente mais tarde.',
              grouping: true,
              type: 'error'
            })
          })
      })
    }

    return {
      form,
      rules,
      resetPassword,
      resetPasswordForm
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
