<template>
  <section class="flex h-screen items-center justify-center">
    <div
      class="p-4 border border-gray-300 rounded-lg shadow-lg w-full max-w-sm"
    >
      <h1 class="text-center text-lg font-semibold mb-4">
        Seja bem-vindo de volta!
      </h1>

      <div class="card p-6">
        <FloatLabel>
          <InputText id="email" v-model="email" class="w-full" />
          <label for="email">Email@exemplo.com</label>
        </FloatLabel>
      </div>

      <div class="card p-6">
        <FloatLabel>
          <Password
            v-model="senha"
            promptLabel="Digite uma senha"
            weakLabel="Muito Fraca"
            mediumLabel="Mediana. Adicione caracteres especiais (@#39428)"
            strongLabel="Senha forte."
            toggleMask
          />
          <label for="senha">Senha</label>
        </FloatLabel>
      </div>
      <div class="card flex flex-wrap  gap-4">
        <div class="flex items-center">
          <Checkbox
            v-model="pizza"
            inputId="ingredient1"
            name="pizza"
            value="Cheese"
          />
          <label for="ingredient1" class="ml-2"> Lembrar de mim? </label>
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
import Checkbox from "primevue/checkbox";

// Definindo variáveis separadas para cada campo
const email = ref("");
const senha = ref("");
</script>

<style scoped>
#input-senha {
  width: 100%;
}
</style>
