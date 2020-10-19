<?php

use App\Http\Controllers\ExpressionController;
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
    return view('welcome');
});

Route::view('home', 'home')->middleware('auth')->name('home');

Route::group(['prefix' => 'admin/expressions', 'as' => 'admin.expressions.', 'middleware' => 'auth'], function () {
    Route::get('/create', [ExpressionController::class, 'create'])->name('create');
    Route::delete('/{id}', [ExpressionController::class, 'delete'])->name('delete');
    Route::get('/{expression}/edit', [ExpressionController::class, 'edit'])->name('edit');
    Route::get('/{tables?}', [ExpressionController::class, 'index'])->name('index');
    Route::post('/store', [ExpressionController::class, 'store'])->name('store');
    Route::get('/{id}', [ExpressionController::class, 'show'])->name('show');
    Route::put('/{id}', [ExpressionController::class, 'update'])->name('update');
});

//Articles routes

//Tags routes idk maybe not

