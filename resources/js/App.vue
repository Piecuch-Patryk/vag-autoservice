<template>
  <MainNav />
  <router-view />
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import MainNav from './components/nav/MainNav.vue';

export default defineComponent({
  components: {
    MainNav,
  },
  setup() {
    
  },
  mounted() {
    // import assets like img
  }
})
</script>
