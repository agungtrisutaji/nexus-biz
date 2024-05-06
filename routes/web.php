<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/about', \App\Livewire\About::class)->name('about');
Route::get('/contact', \App\Livewire\Contact::class)->name('contact');
Route::get('/inventories', \App\Livewire\Inventories::class)->name('inventories');
Route::get('/terminations', \App\Livewire\Terminations::class)->name('terminations');
Route::get('/forecast', \App\Livewire\Forecast::class)->name('forecast');
Route::get('/reports', \App\Livewire\Reports::class)->name('reports');

Route::get('/addresses', \App\Livewire\Addresses::class)->name('addresses');


Route::get('/partnership', \App\Livewire\Partnership::class)->name('partnership');
Route::post('/parnership', [\App\Livewire\Partnership::class, 'addAddress'])->name('partnership.addAddress');

Route::get('/stocks', \App\Livewire\Stocks\Index::class)->name('stocks.index');

Route::get('/products', \App\Livewire\Products\Index::class)->name('products.index');
Route::get('/products/create', \App\Livewire\Products\Create::class)->name('products.create');

Route::get('/bills', \App\Livewire\Bills::class)->name('bills');

Route::get('/claims', \App\Livewire\Claims::class)->name('claims');

Route::get('/users/{user}', \App\Livewire\Users\Show::class)->name('users.show');

Route::get('/deliveries', \App\Livewire\Deliveries\Index::class)->name('deliveries.index');

Route::get('/stagings', \App\Livewire\Stagings\Index::class)->name('stagings.index');

Route::get('/terminations', \App\Livewire\Terminations\Index::class)->name('terminations.index');

Route::get('/claims', \App\Livewire\Claims\Index::class)->name('claims.index');
