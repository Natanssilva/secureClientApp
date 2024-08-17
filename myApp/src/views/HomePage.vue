<template>
  <ion-content :fullscreen="true">
    <div>
      <section class="bubble">
        <div class="content">
          <h1 class="text-black font-bold text-4xl mb-16">
            Bem-vindo ao SecureClient
          </h1>
          <!-- <ButtonDefault></ButtonDefault> -->
        </div>
      </section>
      <div>
        
      </div>
    </div>
  </ion-content>
</template>

<script setup lang="ts">
import {
  IonContent,
  IonHeader,
  IonPage,
  IonTitle,
  IonToolbar,
} from "@ionic/vue";
import ButtonDefault from "../components/ButtonDefault.vue";
</script>

<style scoped>
.bubble {
  position: relative;
  height: 100vh; /* Adiciona isso para garantir que a .bubble ocupe toda a altura da tela */
  display: flex;
  justify-content: center;
  align-items: center;
}

.bubble::after {
  content: "";
  border-bottom-left-radius: 50% 100%;
  border-bottom-right-radius: 50% 100%;
  position: absolute;
  top: 0;
  width: 100%;
  background-color: white;
  height: 55vh;
  z-index: -1;
}

.content {
  position: relative;
  z-index: 1;
  text-align: center; /* Opcional: centraliza o texto dentro da div */
}
</style>
