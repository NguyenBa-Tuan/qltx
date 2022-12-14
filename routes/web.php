<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandCRUDController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleCRUDController;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [LoginController::class, 'showRegisterForm'])->name('showRegisterForm');
Route::post('/register', [LoginController::class, 'register'])->name('register');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/{id}', [IndexController::class, 'productDetail'])->name('index.product-detail');
Route::post('/{id}', [IndexController::class, 'booking'])->name('index.booking');

Route::get('/search/{search}', [SearchController::class, 'index'])->name('search.vehicles');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/', [BrandCRUDController::class, 'index'])->name('admin');
    Route::resource('brand', BrandCRUDController::class);
    Route::resource('vehicle', VehicleCRUDController::class);
    Route::get('/booking-history', [AdminController::class, 'bookingHistory'])->name('admin.bookingHistory');
    // Route::resource('users', AdminController::class);
    // Route::resource('courses', CourseController::class);
    Route::get('/request', [AdminController::class, 'requestRentForm'])->name('admin.requestRentForm');
    Route::post('/request/{id}', [AdminController::class, 'requestRent'])->name('admin.requestRent');
    Route::get('/revenue-month', [AdminController::class, 'revenueMonth'])->name('admin.revenueMonth');
});

Route::middleware('user')->prefix('user')->group(function () {
    Route::get('/booking-history', [UserController::class, 'bookingHistory'])->name('bookingHistory');
});
