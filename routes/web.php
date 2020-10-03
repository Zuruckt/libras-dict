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

Route::view('home', 'home')->middleware('auth');
Route::group(['prefix' => 'expression', 'middleware' => 'auth'], function () {
    Route::get('/create', [ExpressionController::class, 'create']);
    Route::delete('/{id}', [ExpressionController::class, 'delete']);
    Route::get('/{id}/edit', [ExpressionController::class, 'edit']);
    Route::get('/', [ExpressionController::class, 'index']);
    Route::post('/store', [ExpressionController::class, 'store']);
    Route::get('/{id}', [ExpressionController::class, 'show']);
    Route::put('/{id}', [ExpressionController::class, 'update']);
});

