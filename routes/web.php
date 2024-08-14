<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    sleep(1); // Inertia Progressbar - Test delay;
    $page = [
        'title'    => 'Welcome.vue',
        'subtitle' => 'page in persistent Layout as slot'
    ];
    return Inertia::render('Welcome', ['page' => $page]);
});

Route::get('/reactive', function () {
    sleep(1); // Inertia Progressbar - Test delay;
    $page = [
        'title'    => 'Reactive.vue',
        'subtitle' => 'reactivity test counter'
    ];
    return Inertia::render('Reactive', ['page' => $page]);
});
