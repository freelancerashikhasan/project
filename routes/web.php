<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UrlController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/project1', [App\Http\Controllers\HomeController::class, 'project1'])->name('project1');

Route::prefix('admin')->as('admin.')->group(function () {
    Route::prefix('category')->as('category.')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
    });
    Route::prefix('user')->as('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/store', [UserController::class, 'store'])->name('store');
    });
});
Route::prefix('user')->as('user.')->group(function () {
    Route::prefix('data')->as('data.')->group(function () {
        Route::get('/', [DataController::class, 'index'])->name('index');
        Route::post('/store', [DataController::class, 'store'])->name('store');
    });
    Route::get('/categories', [CategoryController::class, 'getCategories'])->name('categories');
    Route::get('/category/{id}', [CategoryController::class, 'getCategory'])->name('category');
});
Route::prefix('url')->as('url.')->group(function () {
    Route::get('/', [UrlController::class, 'index'])->name('index');
    Route::post('/store', [UrlController::class, 'store'])->name('store');
});
Route::get('/{short_code}', [UrlController::class, 'redirect'])->name('redirect');
