<script setup lang="ts">
import { useGlobalStore } from "../store/global.store";
import { GeneratableModule } from "../types/module.types";
const store = useGlobalStore();
</script>
<template>
  <section class="pane module-settings-pane">
    <h3>MODULE SETTINGS</h3>
    <div class="form-group">
      <div class="form-item">
        <label for="clickout">Clickout</label>
        <div>
          <input
            id="clickout"
            type="text"
            name="clickout"
            v-model="store.clickout"
            placeholder="https://appverk.com"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-item">
        <label for="width">Width (%)</label>
        <div>
          <input
            id="width"
            type="number"
            name="width"
            v-model="store.dimensions.width"
          />
        </div>
      </div>
      <div class="form-item">
        <label for="height">Height (%)</label>
        <div>
          <input
            id="height"
            type="number"
            name="height"
            v-model="store.dimensions.height"
          />
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="form-item">
        <label for="left">Position X (%)</label>
        <div>
          <input
            id="left"
            type="number"
            name="left"
            v-model="store.position.left"
          />
        </div>
      </div>
      <div class="form-item">
        <label for="top">Position Y (%)</label>
        <div>
          <input
            id="top"
            type="number"
            name="top"
            v-model="store.position.top"
          />
        </div>
      </div>
    </div>
    <div
      v-if="store.module === GeneratableModule.Background"
      class="form-group"
    >
      <div class="form-item">
        <label for="color">Background color</label>
        <div>
          <input id="color" type="color" name="color" v-model="store.color" />
        </div>
      </div>
    </div>
    <div v-if="store.module === GeneratableModule.Typo" class="form-group">
      <div class="form-item">
        <label for="content">Typo content</label>
        <div>
          <input
            id="content"
            type="text"
            name="content"
            v-model="store.content"
          />
        </div>
      </div>
    </div>
  </section>
</template>
