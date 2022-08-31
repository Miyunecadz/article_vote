<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthenticationController;
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

Route::get('/', function () {
    return redirect('/home');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [ArticleController::class, 'index']);
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/create', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/{article}', [ArticleController::class, 'update'])->name('articles.update');

    Route::get('/upvote/{article}', [ArticleController::class, 'upvote'])->name('articles.upvote');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticationController::class, 'loginPage'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'authenticateUser'])->name('authenticateUser');

    Route::get('/register', [AuthenticationController::class, 'registerPage'])->name('register');
    Route::post('/register', [AuthenticationController::class, 'registerUser'])->name('registerUser');
});
