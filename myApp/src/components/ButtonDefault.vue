
<template>
  <ion-button color="black">{{ Text }}</ion-button>
</template>

<script lang="ts">
import { IonButton } from "@ionic/vue";
import { defineComponent } from "vue";

export default defineComponent({
  components: { IonButton },
  props: {
    Text: {
        type: String,
        default: 'Começar',
      }
  }
});
</script>

