<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::get('/dashboardd', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [ProfileController::class, 'changeView'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/client', function () {
    return view('pages.client');
})->name('client');

Route::post('/addProduct', [ProductController::class, 'store'])->name('addProduct');
// Route::get('/jammiya', [ProductController::class, 'show'])->middleware(['auth', 'verified'])->name('jammiya');
Route::get('/jammiya', [ProductController::class, 'show'])->middleware(['auth', 'verified', 'admin'])->name('jammiya');
Route::delete('/deleteProduct/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
Route::get('editeProduct/{id}', [ProductController::class, 'edite'])->name('editeProduct');
Route::put('updateProduct/{id}', [ProductController::class, 'update'])->name('updateProduct');
Route::get('/viewPageInfo', [ProfileController::class, 'viewPageInfoController'])->middleware(['auth', 'verified'])->name('viewPageInfo');
Route::post('/insertInfoJaam', [ProfileController::class, 'insertInfoJaam'])->name('insertInfoJaam');
Route::put('/updateInfo', [ProfileController::class, 'updateInfo'])->name('updateInfo');


require __DIR__.'/auth.php';
