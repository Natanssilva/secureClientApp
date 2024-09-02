<template>
  <div class="container">
    <div class="login-section">
      <!-- Conteúdo da parte de login -->
      <h1>Sign in</h1>
      <p class="">Don't have account? <span class="underline">Create Now</span></p>

      <form>
        <!-- Campos de login -->
        <input type="email" placeholder="E-mail" />
        <input type="password" placeholder="Password" />
        <el-button class="bttn" round :loading-icon="Eleme" loading>Loading</el-button>
      </form>
    </div>
    <div class="image-section">
      <!-- Conteúdo da parte da imagem e frases -->
      <h2>Reach financial goals faster</h2>
      <p>
        Use your Venus card around the world with no hidden fees. Hold, transfer and spend money.
      </p>
      <button class="bttn">Learn more</button>
    </div>
  </div>
</template>

<script>
import { Eleme } from '@element-plus/icons-vue'
export default {
  name: 'LoginScreen'
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

.container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  height: 100vh;
}

.login-section {
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 0 50px;
  background-color: #f9f9f9; /* Cor de fundo da seção de login */
}

.image-section {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #1c3a31; /* Cor de fundo da seção de imagem */
  color: white;
  padding: 0 50px;
}

h1 {
  font-size: 36px;
  margin-bottom: 20px;
}

form {
  display: flex;
  flex-direction: column;
}

input {
  margin-bottom: 10px;
  padding: 15px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.bttn {
  padding: 25px;
  background-color: #006f4a;
  color: white;
  font-size: 16px;

  cursor: pointer;
}

button:hover {
  background-color: #00533b;
}

.el-button .custom-loading .circular {
  margin-right: 6px;
  width: 18px;
  height: 18px;
  animation: loading-rotate 2s linear infinite;
}
.el-button .custom-loading .circular .path {
  animation: loading-dash 1.5s ease-in-out infinite;
  stroke-dasharray: 90, 150;
  stroke-dashoffset: 0;
  stroke-width: 2;
  stroke: var(--el-button-text-color);
  stroke-linecap: round;
}
</style>
