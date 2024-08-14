<template>
  <div class="flex gap-5 justify-between font-inter">
    <button
      class="bg-amber-400 hover:bg-amber-500 text-slate-800 font-bold py-2 px-4 rounded-md"
      @click="$emit('counter-decreased')"
    >
      Decrement
    </button>
    <button
      class="bg-amber-400 hover:bg-amber-500 text-slate-800 font-bold py-2 px-4 rounded-md"
      @click="$emit('counter-increased')"
    >
      Increment
    </button>
  </div>
</template>

<script setup>
defineEmits(["counter-increased", "counter-decreased"]);
</script>

<style>
</style>