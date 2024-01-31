<script setup lang="ts">
import Navbar from "./components/Navbar.vue";
import AvailableModules from "./components/AvailableModules.vue";
import SelectedModule from "./components/SelectedModule.vue";
import ModuleSettings from "./components/ModuleSettings.vue";
</script>
<template>
  <Navbar />
  <main class="main">
    <AvailableModules />
    <SelectedModule />
    <ModuleSettings />
  </main>
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
