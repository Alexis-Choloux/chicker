<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('auth\login');
});

Route::middleware('auth')->group(function() {
    Route::resource('/chicks', App\Http\Controllers\ChickController::class);

    Route::get('/chicks', [App\Http\Controllers\ChickController::class, 'index'])->name('home'); 

    Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');

    Route::get('/comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments');
});



// SIDEBAR
// to explore
Route::get('/explore',[App\Http\Controllers\ExploreController::class, 'index'])->name('explore');


// to profile
Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');

Auth::routes();


// PROFILE
// profile edit
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit');

Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'update'])->name('update');


// password edit
Route::get('/profile/{user}/edit-password', [App\Http\Controllers\ProfileController::class, 'editPassword'])->name('edit-password');

Route::patch('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('update-password');


// abonnements
Route::post('/profile/{user}/follow', [App\Http\Controllers\FollowsController::class, 'store']);



