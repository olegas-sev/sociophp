<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::group(['middleware' => ['web']], function() {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signup', [UserController::class, 'postSignUp'])->name('signup');
    Route::post('/signin', [UserController::class, 'postSignIn'])->name('signin');
    Route::get('/logout', [UserController::class, 'getLogout'])->name('logout');

    Route::get('/dashboard', [PostController::class, 'getDashboard'])->name('dashboard')->middleware('auth');

    Route::post('/create-post', [PostController::class, 'postCreatePost'])->name('post.create')->middleware('auth');
    Route::get('/delete-post/{post_id}', [PostController::class, 'getDeletePost'])->name('post.delete')->middleware('auth');
    Route::post('/edit', [PostController::class, 'postEditPost'])->name('edit')->middleware('auth');


    Route::get('/account', [UserController::class, 'getAccount'])->name('account')->middleware('auth');
    Route::post('/update-account', [UserController::class, 'postSaveAccount'])->name('account.save')->middleware('auth');
    Route::get('/userimage/{filename}', [UserController::class, 'getUserImage'])->name('account.image')->middleware('auth');
});
