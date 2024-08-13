<template>
  <Head :title="page.title" />
  <section class="h-screen grid content-center">
    <div class="flex items-center justify-center">
      <div
        class="flex flex-col justify-center items-center m-5 bg-slate-800 rounded-lg p-5 shadow-xl hover:bg-gradient-to-tr from-slate-800 to-slate-700"
      >
        <h1 class="font-inter text-2xl text-amber-400 font-bold block">
          <Link class="hover:text-amber-300" href="/">
            {{ page.title }}
          </Link>
        </h1>
        <p>
          {{ page.subtitle }}
        </p>
      </div>
    </div>
  </section>
</template>

<script setup>
defineProps({
  page: Object,
});
</script>

<style>
</style>