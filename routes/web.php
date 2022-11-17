<?php

use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Admin\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\Order\AdminOrderComponent;
use App\Http\Livewire\Admin\Order\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\Product\AdminAddProductComponent;
use App\Http\Livewire\Admin\Product\AdminEditProductComponent;
use App\Http\Livewire\Admin\Product\AdminProductComponent;
use App\Http\Livewire\Admin\User\AdminManageUserComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Detail;
use App\Http\Livewire\Home;
use App\Http\Livewire\Search;
use App\Http\Livewire\Shop;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\Order\UserOderDetailsComponent;
use App\Http\Livewire\User\Order\UserOrdersComponent;
use App\Http\Livewire\User\Review\UserReviewComponent;
use App\Http\Livewire\User\UserProfileComponent;
use App\Http\Livewire\User\ChangePasswordComponent;
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
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/product/{slug}', Detail::class)->name('product.details');
Route::get('/search', Search::class)->name('product.search');
Route::get('/product-category/{categorySlug}', CategoryComponent::class)->name('product.category');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');


Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', UserDashboard::class)->name('dashboard');
    Route::get('user/profile', UserProfileComponent::class)->name('profile');
    Route::get('user/update-password', ChangePasswordComponent::class)->name('updatepassword');
    Route::get('orders', UserOrdersComponent::class)->name('orders');
    Route::get('orders/{orderId}', UserOderDetailsComponent::class)->name('orderdetails');

    Route::get('orders/review/{orderProductId}', UserReviewComponent::class)->name('review');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('dashboard', AdminDashboard::class)->name('dashboard');

    Route::get('categories', AdminCategoryComponent::class)->name('categories');
    Route::get('category/add', AdminAddCategoryComponent::class)->name('addcategory');
    Route::get('category/edit/{categorySlug}', AdminEditCategoryComponent::class)->name('editcategory');

    Route::get('products', AdminProductComponent::class)->name('products');
    Route::get('products/add', AdminAddProductComponent::class)->name('addproduct');
    Route::get('product/edit/{product_slug}', AdminEditProductComponent::class)->name('editproduct');

    Route::get('users', AdminManageUserComponent::class)->name('users');

    Route::get('orders', AdminOrderComponent::class)->name('orders');
    Route::get('orders/{orderId}', AdminOrderDetailsComponent::class)->name('orderdetails');
});
