<template>
  <Head :title="page.title" />
  <section class="h-screen grid content-center">
    <div class="flex items-center justify-center">
      <div
        class="flex flex-col justify-center items-center m-5 datk:bg-slate-800 bg-slate-400 dark:bg-gray-700 rounded-lg p-5 shadow-xl"
      >
        <h1 class="font-matemasie text-2xl text-amber-400 font-bold block">
          <Link class="hover:text-amber-300" href="/">
            {{ page.title }}
          </Link>
        </h1>
        <p class="font-inter text-gray-200 dark:text-gray-500">
          {{ page.subtitle }}
        </p>
        <h2 class="m-5 text-5xl text-amber-400 font-matemasie">
          {{ count }}
        </h2>
        <Counter
          @counter-increased="increment"
          @counter-decreased="decrement"
          class="mt-5"
        />
      </div>
    </div>
  </section>
</template>

<script setup>
import Counter from "../Shared/Counter.vue";
import { ref } from "vue";
const count = ref(0);

defineProps({
  page: Object,
});

const increment = () => {
  count.value++;
};
const decrement = () => {
  count.value--;
};
</script>

<style>
</style>