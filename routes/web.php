<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandCRUDController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('adminAuth')->prefix('admin')->group(function ()
{
    Route::get('/', [BrandCRUDController::class, 'index'])->name('admin');
    Route::resource('brand', BrandCRUDController::class);
    Route::resource('vehicle', VehicleCRUDController::class);
    // Route::resource('users', AdminController::class);
    // Route::resource('courses', CourseController::class);
});
