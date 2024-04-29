<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/about', \App\Livewire\About::class)->name('about');
Route::get('/contact', \App\Livewire\Contact::class)->name('contact');
Route::get('/stocks', \App\Livewire\Stocks\Index::class)->name('stocks.index');


Route::get('/users/{user}', \App\Livewire\Users\Show::class)->name('users.show');
