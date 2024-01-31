<script setup lang="ts">
import { useGlobalStore } from "../store/global.store";
const store = useGlobalStore();
</script>
<template>
  <section class="pane selected-module-pane">
    <h3>SELECTED MODULE</h3>
    <div class="selected-module-pane__module">
      <span>{{ store.module.toUpperCase() }}</span>
    </div>
  </section>
</template>
