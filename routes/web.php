<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::group(['middleware' => 'auth'], function(){    //protecting routes by middleware

    Route::get('users', [UserController::class, 'users'])->name('users-data');

    // Crud's routes
    //route of trashed posts
    Route::get('posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');

    Route::get('posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');

    //force delete(permanently delete)
    Route::delete('posts/{id}/deleted', [PostController::class, 'forceDelete'])->name('posts.force_delete');

    //resource controller of CRUD
    Route::resource('posts', PostController::class);

});




