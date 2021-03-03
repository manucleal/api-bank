<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [ App\Http\Controllers\UserController::class, 'login' ]);

Route::group([ 'middleware' => 'auth:api' ], function () {
    Route::get('/transactions', [ App\Http\Controllers\TransactionController::class, 'getTransactions' ]);
    Route::post('/transfer', [ App\Http\Controllers\TransactionController::class, 'setTransfer' ]);
    Route::post('/logout', [ App\Http\Controllers\UserController::class, 'logout' ]);
});