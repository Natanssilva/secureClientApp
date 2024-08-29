<template>
  <section
    class="bg-background bg-no-repeat bg-cover flex h-screen items-center justify-center p-4 sm:p-6"
  >
    <div
      class="p-4 border border-black-300 rounded-lg shadow-lg w-full max-w-sm bg-white sm:max-w-md lg:max-w-lg"
    >
      <h1 class="text-center text-lg font-semibold mb-4">
        Seja bem-vindo de volta!
      </h1>
      <div class="flex justify-center flex-col space-y-6">
        <div class="card p-4 sm:p-6">
          <FloatLabel>
            <InputText
              id="email"
              @input="validateEmail"
              v-model="email"
              size="large"
              class="w-full"
            />
            <label for="email">Email@exemplo.com</label>
          </FloatLabel>
          <p v-if="emailError" class="text-red-500 text-sm">{{ emailError }}</p>
        </div>

        <div class="card p-4 sm:p-6">
          <FloatLabel>
            <Password
              class="w-full"
              v-model="senha"
              promptLabel="Digite uma senha"
              weakLabel="Muito Fraca"
              mediumLabel="Mediana. Adicione caracteres especiais (@#39428)"
              strongLabel="Senha forte."
              toggleMask
            />
            <label for="senha">Senha</label>
          </FloatLabel>
          <span class="flex justify-start p-2 mt-6">
            <a class="text-sm underline text-indigo-600" href="#"
              >Esqueceu a senha?</a
            >
          </span>
        </div>
        <div>
          <!-- <Button label="Primary" /> -->
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from "vue";
import InputText from "primevue/inputtext";
import FloatLabel from "primevue/floatlabel";
import Password from "primevue/password";
import Button from "primevue/button";

// Definindo variáveis separadas para cada campo
const email = ref("");
const senha = ref("");
</script>

<style scoped></style>
