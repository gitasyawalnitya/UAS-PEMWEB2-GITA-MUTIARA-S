<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\UserController;
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


Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login-auth');
    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});
Route::get('/', [DashboarController::class, 'index'])->name('dashboard')->middleware('auth');

Route::controller(UserController::class)
->middleware('auth')
->prefix('users')
->group(function () {
    Route::get('/', 'index')->name('users');
    Route::get('/create', 'create')->name('users-create');
    Route::post('/', 'store')->name('users-store');
    Route::get('/edit/{id}', 'edit')->name('users-edit');
    Route::post('/update/{id}', 'update')->name('users-update');
    Route::delete('/destroy/{id}', 'destroy')->name('users-delete');
});

Route::controller(ArticleController::class)
->middleware('auth')
->prefix('articles')
->group(function () {
    Route::get('/', 'index')->name('articles');
    Route::get('/create', 'create')->name('articles-create');
    Route::post('/', 'store')->name('articles-store');
    Route::get('/edit/{id}', 'edit')->name('articles-edit');
    Route::post('/update/{id}', 'update')->name('articles-update');
    Route::delete('/destroy/{id}', 'destroy')->name('articles-delete');
    Route::get('/pdf/{id}', 'pdf')->name('articles-pdf');
});
