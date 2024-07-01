<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\SendMessage;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'mercureAuthorization'])
    ->name('dashboard');

Route::get('sendmessage', SendMessage::class)
    ->middleware(['auth', 'verified'])
    ->name('sendmessage');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
