<script setup lang="ts">
import { ref } from "vue";
import { GeneratableModule } from "../types/module.types";
import { useGlobalStore } from "../store/global.store";

const store = useGlobalStore();
const availableModules = ref(Object.values(GeneratableModule));
</script>
<template>
  <section class="pane available-modules-pane">
    <h3>AVAILABLE MODULES</h3>
    <button
      class="available-modules-pane__button button"
      v-for="module in availableModules"
      @click="store.module = module"
    >
      {{ module.toUpperCase() }}
    </button>
  </section>
</template>
