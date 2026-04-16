<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShopController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/account', fn() => view('pages.account'))->name('account');
Route::get('/cart', fn() => view('pages.cart'))->name('cart');
Route::get('/category/{slug}', fn($slug) => view('pages.category', compact('slug')))->name('category.show');

// ── الصفحة الرئيسية ──
Route::get('/', [ShopController::class, 'home'])->name('home');

// ── الكاتالوج ──
Route::get('/products',              [ShopController::class, 'products'])->name('products');
Route::get('/category/{slug}',       [ShopController::class, 'category'])->name('category.show');
Route::get('/products/{slug}',       [ShopController::class, 'product'])->name('product.show');

// ── الـ Cart والـ Checkout ──
Route::get('/cart',                  [ShopController::class, 'cart'])->name('cart');
Route::get('/checkout',              [ShopController::class, 'checkout'])->name('checkout');

// ── الحساب ──
Route::get('/account',               [ShopController::class, 'account'])->name('account');
Route::get('/account/orders',        [ShopController::class, 'orders'])->name('account.orders');
Route::get('/account/orders/{id}',   [ShopController::class, 'orderDetail'])->name('account.orders.show');

// ── صفحات ثابتة ──
Route::get('/about',   fn() => view('pages.about'))->name('about');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');

// Route::get('/', function () {
//     return view('home');
// });


// Route::view('/about', 'pages.about')->name('about');
// Route::view('/faq', 'pages.faq')->name('faq');

// Route::get('/contact', function () {
//     return view('pages.contact');
// })->name('contact');

// Route::post('/contact', [ContactController::class, 'send'])
//     ->name('contact.send')
//     ->middleware('throttle:5,1');
// Route::get('/popular', [ProductController::class, 'popular'])->name('popular');
// Route::get('/recent', [ProductController::class, 'recent'])->name('recent');


// Route::get('/', [ProductController::class, 'index'])->name('home');
// Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');