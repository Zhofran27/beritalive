<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', App\Livewire\Beritas\Index::class)->name('beritas.index');

Route::get('/create', App\Livewire\Beritas\Create::class)->name('beritas.create');

Route::get('/edit/{id}', App\Livewire\Beritas\Edit::class)->name('beritas.edit');