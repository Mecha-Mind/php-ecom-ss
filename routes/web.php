<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
Route::get('/', function () {
    return view('home');
});


Route::view('/about', 'pages.about')->name('about');
Route::view('/faq', 'pages.faq')->name('faq');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send')
    ->middleware('throttle:5,1');
Route::get('/popular', [ProductController::class, 'popular'])->name('popular');
Route::get('/recent', [ProductController::class, 'recent'])->name('recent');


Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');