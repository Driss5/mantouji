<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('pages.home');
});

Route::get('/client', function () {
    return view('pages.client');
})->middleware(['auth', 'verified'])->name('client');

// Route::get('/jammiya', function () {
//     return view('pages.jammiya');
// })->middleware(['auth', 'verified'])->name('jammiya');

Route::post('/addProduct', [ProductController::class, 'store'])->name('addProduct');
Route::get('/jammiya', [ProductController::class, 'show'])->middleware(['auth', 'verified'])->name('jammiya');
Route::delete('/deleteProduct/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
Route::get('updateProduct', [ProductController::class, 'update'])->name('updateProduct');

require __DIR__.'/auth.php';
