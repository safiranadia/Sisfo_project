<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategorysController;
use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\Admin\BorrowsController;
use App\Http\Controllers\Admin\ReturnsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('register', [AuthController::class, 'viewRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});

Route::middleware('auth')->post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth', AdminMiddleware::class)->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::post('/users', [UsersController::class, 'store'])->name('user.store');
    Route::put('/users/{user}', [UsersController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('user.destroy');
    Route::get('/categorys', [CategorysController::class, 'index'])->name('categorys');
    Route::post('/categorys', [CategorysController::class, 'store'])->name('category.store');
    Route::put('/categorys/{category}', [CategorysController::class, 'update'])->name('category.update');
    Route::delete('/categorys/{category}', [CategorysController::class, 'destroy'])->name('category.destroy');
    Route::get('/items', [ItemsController::class, 'index'])->name('items');
    Route::post('/items', [ItemsController::class, 'store'])->name('item.store');
    Route::put('/items/{item}', [ItemsController::class, 'update'])->name('item.update');
    Route::delete('/items/{item}', [ItemsController::class, 'destroy'])->name('item.destroy');
    Route::get('/borrows', [BorrowsController::class, 'index'])->name('borrows');
    Route::post('/borrows/{id}/approve', [BorrowsController::class, 'approve'])->name('borrows.approve');
    Route::get('/borrows/export', [BorrowsController::class, 'export'])->name('borrows.export');
    Route::get('/returns', [ReturnsController::class, 'index'])->name('returns');
    Route::get('/returns/export', [ReturnsController::class, 'export'])->name('returns.export');
});