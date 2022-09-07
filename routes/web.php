<?php

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use App\Http\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;

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

Route::get('/', Home::class);
Route::get('/shop', Shop::class)->name('shop');
Route::get('/checkout', Checkout::class)->name('checkout');
Route::get('/cart', Cart::class)->name('cart');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', UserDashboard::class)->name('dashboard');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', AdminDashboard::class)->name('dashboard');
});
