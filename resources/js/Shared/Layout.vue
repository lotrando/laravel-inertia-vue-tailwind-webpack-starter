<template>
  <Navbar />
  <div class="container mx-auto">
    <slot />
  </div>
</template>

<script setup>
import Navbar from "./Navbar.vue";
</script>

<style>
</style>