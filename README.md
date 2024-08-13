<p align="center"><img src="header.png" alt="Inertia Logo"></a>

# Fast installation / clone this repository
```
git clone https://github.com/lotrando/laravel-inertia-vue-tailwind-webpack.git
```
# Clear installation

## 1. Create new Laravel project version 9
```
composer create-project laravel/laravel:9 laravel-inertia-vue-webpack
```

# 2. Install Inertia
## Back-end side ( Inertia Laravel plugin )
```
composer require inertiajs/inertia-laravel
```
### Delete welcome.blade.php and create app.blade.php with the following code
```
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
  </head>

  <body class="bg-slate-600 text-gray-400">
    @inertia

  </body>

</html>

```
### Register inertia middleware
```
php artisan inertia:middleware
```
### and add inertia middleware to bootstrap/app.php file.
```
...
    protected $middlewareGroups = [
        'web' => [
            ...
            \App\Http\Middleware\HandleInertiaRequests::class,
        ]
    ]
...
```
### Create Drawer Pages and Shared in resource/js/ and in this folder create Welcome.vue component in Pages and Layout in Shared folder

### Layout.vue
```
<template>
  <div class="container mx-auto">
    <slot />
  </div>
</template>

<script setup>
</script>

<style>
</style>
```

### Welcome.vue
```
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
```

### Change routes/web.php Big letter in Welcome is important
```
<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    sleep(1); // Inertia Progressbar - Test delay;
    $page = [
        'title'       => 'Welcome page',
        'description' => 'Welcome.vue file in persistent Layout as slot'
    ];
    return Inertia::render('Welcome', ['page' => $page]);
});
```
## Front-end side ( Inertia Vue plugin and Vue 3 )
```
npm install @inertiajs/vue3 vue@latest
```
### Change resources/js/app.js file - Init Vue and Inertia with enabled inertia progress bar
```
import { createApp, h } from 'vue'
import { createInertiaApp, Head, Link } from '@inertiajs/vue3'
import Layout from './Shared/Layout.vue'

createInertiaApp({
    resolve: name => {
        const page = require(`./Pages/${name}`).default;
        page.layout = page.layout || Layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el)
    },
    progress: {
        color: 'rgb(251, 191, 36)',
        includeCSS: true,
        showSpinner: true
    },
})
```
# 3. Install Tailwind CSS
```
npm install --save-dev tailwindcss postcss autoprefixer
```
```
npx tailwindcss init -p
```
### tailwincss.config.js
```
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        inter: ['Inter', 'sans-serif'],  // font-inter
      },
    },
  },
  plugins: [],
}
```
### resources/css/app.css
```
@tailwind base;
@tailwind components;
@tailwind utilities;

@import 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap';

```
# 4. Setup Webpack mix
```
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ])
    .sourceMaps()
    .version();
```
# 5. Finish

## Run dev or watch mix
```
npm run dev
```
or
```
npm run watch
```
## or run production
```
npm run build
```

## Your Laravel-Vue-Tailwind App with Inertia monolith completly installed. Now run aplication.
```
php artisan serve
```


