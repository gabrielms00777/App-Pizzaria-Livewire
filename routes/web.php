<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\{Dashboard, Category, Product, Order, Users};
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
// auth()->loginUsingId(1);
// auth()->logout();

// Route::view('/', 'welcome');
Route::middleware(['auth', AdminMiddleware::class])->group(function(){
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('/pedidos', Order\Index::class)->name('order.index');
    Route::get('/categorias', Category\Index::class)->name('category.index');
    Route::get('/produtos', Product\Index::class)->name('product.index');
    Route::get('/produtos/criar', Product\Create::class)->name('product.create');
    Route::get('/usuarios', Users\Index::class)->name('users.index');
    Route::get('/usuarios/criar', Users\Create::class)->name('users.create');
});
Route::middleware(['auth'])->group(function(){
    Route::get('/pedidos/criar', Users\Create::class)->name('order.create');
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
