<template>
  <header
    class="bg-slate-400 dark:bg-gray-800 sm:flex sm:justify-between sm:px-4 sm:py-2 sm:items-center fixed w-full"
  >
    <div class="flex justify-between items-center px-4 py-2 sm:p-0">
      <Link href="/">
        <img class="h-10 sm:h-16" src="img/logo.png" alt="Logo" />
      </Link>

      <div class="sm:hidden">
        <button
          @click="isOpen = !isOpen"
          type="button"
          class="text-gray-300 hover:text-white hover:bg-gray-800 p-1 rounded-xl focus:outline-none block"
        >
          <svg class="w-8 h-8 stroke-current" viewBox="0 0 24 24">
            <path
              v-if="isOpen"
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18 18 6M6 6l12 12"
            />

            <path
              v-if="!isOpen"
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
            />
          </svg>
        </button>
      </div>
    </div>
    <div
      :class="isOpen ? 'block' : 'hidden'"
      class="px-2 pt-3 pb-4 sm:flex text-white uppercase"
    >
      <Link
        class="block font-semibold rounded-md hover:bg-gray-900 hover:text-amber-400 py-1 px-2 sm:ml-1"
        href="/reactive"
        :class="{
          'bg-amber-400 text-amber-900 ': $page.url === '/reactive',
        }"
        >Reactivity</Link
      >
    </div>
  </header>
</template>

<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/vue3";

const isOpen = ref(false);
const page = usePage();
</script>

<style>
</style>