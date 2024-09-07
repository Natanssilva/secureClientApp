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

      <h1 class="text-4xl font-bold mb-2">Sign in</h1>
      <p class="mb-6 text-sm">
        Don't have an account?
        <span class="no-underline hover:underline text-secure-color cursor-pointer"
          >Create Now</span
        >
      </p>

      <form class="w-full max-w-md">
        <!-- Campos de login -->
        <el-input
          class="w-full h-20 p-4 mb-3 rounded-md"
          v-model="inputEmail"
          placeholder="example@email.com"
          clearable
        />

        <el-input
          class="w-full h-20 p-4 mb-3 rounded-md"
          v-model="inputPassword"
          type="password"
          placeholder="Please input password"
          show-password
        />

        <div class="flex justify-around items-center mb-4">
          <el-checkbox v-model="checked1" label="Remember me" size="large" />
          <span class="no-underline hover:underline text-secure-color cursor-pointer"
            >Forgot Password?</span
          >
        </div>

        <el-button class="w-full py-3" round color="#7447E1" size="large"> Sign in </el-button>
      </form>

      <div class="mt-4 w-full max-w-md">
        <el-divider content-position="center">OR</el-divider>

        <!-- Botão Google -->
        <div>
          <el-button
            class="w-full py-3 flex items-center justify-center mb-3 text-center"
            round
            size="large"
          >
            <i class="fab fa-google mr-2"></i>
            Continue with Google
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
            Continue with Facebook
          </el-button>
        </div>
      </div>
    </div>

    <div
      class="hidden lg:flex flex-col justify-center items-center bg-secure-color text-white px-8 lg:px-20"
    >
      <h2 class="text-2xl font-bold mb-4">Reach financial goals faster</h2>
      <p class="mb-6 text-center">
        Use your Venus card around the world with no hidden fees. Hold, transfer and spend money.
      </p>
      <button class="py-3 px-6 bg-white text-green-800 rounded-md">Learn more</button>
    </div>
  </div>
</template>

<script>
import { ref } from 'vue'
import { ElDivider } from 'element-plus'
export default {
  name: 'LoginScreen',
  setup() {
    // Definindo os estados reativos necessários
    const inputPassword = ref('')
    const inputEmail = ref('')
    const checked1 = ref(false) // Para o checkbox "Remember me"

    return {
      inputPassword,
      inputEmail,
      checked1
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
  font-size: 1.25rem; /* ou ajuste conforme necessário */
}


</style>
