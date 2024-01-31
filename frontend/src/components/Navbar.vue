<script setup lang="ts">
import { useGlobalStore } from "../store/global.store";
const store = useGlobalStore();
</script>
<template>
  <nav class="nav">
    <img src="/logo.svg" alt="logo" />
    <button class="button" @click="store.generateFiles()">
      GENERATE FILES
    </button>
  </nav>
</template>
