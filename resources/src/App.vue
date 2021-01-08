<template>
  <div class="w-screen h-screen font-mono bg-gray-200">
    <router-view />
  </div>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
  name: 'App',
})
</script>
