<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/inventories', \App\Livewire\Inventories::class)->name('inventories');
Route::get('/terminations', \App\Livewire\Terminations::class)->name('terminations');
Route::get('/forecast', \App\Livewire\Forecast::class)->name('forecast');
Route::get('/reports', \App\Livewire\Reports::class)->name('reports');

Route::get('/addresses', \App\Livewire\Addresses::class)->name('addresses');

Route::get('/units', \App\Livewire\Units\Index::class)->name('units.index');


Route::get('/bills', \App\Livewire\Bills::class)->name('bills');

Route::get('/claims', \App\Livewire\Claims::class)->name('claims');

Route::get('/users/{user}', \App\Livewire\Users\Show::class)->name('users.show');

Route::get('/deliveries', \App\Livewire\Deliveries\Index::class)->name('deliveries.index');

Route::get('/stagings', \App\Livewire\Stagings\Index::class)->name('stagings.index');

Route::get('/terminations', \App\Livewire\Terminations\Index::class)->name('terminations.index');

Route::get('/claims', \App\Livewire\Claims\Index::class)->name('claims.index');
