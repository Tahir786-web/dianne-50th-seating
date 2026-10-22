<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\TableController;
use App\Http\Controllers\SeatingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth'])->group(function () {

    Route::resource('posts', PostController::class);

    Route::resource('categories', CategoryController::class);

    Route::post(
        '/posts/{post}/comments',
        [CommentController::class, 'store']
    )->name('comments.store');

    Route::delete(
        '/comments/{comment}',
        [CommentController::class, 'destroy']
    )->name('comments.destroy');


    Route::get('/', fn () => redirect()->route('tables.index'));
    Route::resource('tables', TableController::class);
    Route::get('/', [SeatingController::class, 'index'])->name('seating.lookup');
    Route::post('/search', [SeatingController::class, 'search'])->name('seating.search');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
