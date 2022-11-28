<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandCRUDController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VehicleCRUDController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/{id}', [IndexController::class, 'productDetail'])->name('index.product-detail');
Route::post('/{id}', [IndexController::class, 'booking'])->name('index.booking');

Auth::routes();
Route::get('login', [UserLogin::class, 'showLoginForm'])->name('login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('adminAuth')->prefix('admin')->group(function () {
    Route::get('/', [BrandCRUDController::class, 'index'])->name('admin');
    Route::resource('brand', BrandCRUDController::class);
    Route::resource('vehicle', VehicleCRUDController::class);
    // Route::resource('users', AdminController::class);
    // Route::resource('courses', CourseController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
