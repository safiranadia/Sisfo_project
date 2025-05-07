<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\User\BorrowsController;
use App\Http\Controllers\Api\User\ItemsController;
use App\Http\Controllers\Api\User\ReturnsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::get('/borrowCount/{userId}', [BorrowsController::class, 'countByUserId']);
    Route::get('/borrows/{userId}', [BorrowsController::class, 'showByUserId']);
    Route::get('/borrows/{borrowId}/{userId}', [BorrowsController::class, 'showByBorrowIdAndUserId']);
    Route::post('/borrows', [BorrowsController::class, 'create']);
    Route::delete('/borrows/{id}', [BorrowsController::class, 'destroy']);
    Route::get('/returnCount/{userId}', [ReturnsController::class, 'countByUserId']);
    Route::get('/returns/{userId}', [ReturnsController::class, 'showByUserId']);
    Route::post('/returns', [ReturnsController::class, 'store']);
    Route::get('/items', [ItemsController::class, 'showItems']);
    Route::get('/items/{id}', [ItemsController::class, 'showItem']);
});

