<?php

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

Route::prefix('/admin')->group(function (){
    // Route::get('/login', [App\Http\Controllers\AdminLoginController::class, 'adminlogin'])->name('adminLogin');
    Route::match(['get','post'], '/login', 'AdminLoginController@adminLogin')->name('adminLogin');
  // Route::group(['middleware'=>['admin']],function (){
   //Route::get('/dashboard', [App\Http\Controllers\AdminLoginController::class, 'dashboard'])->name('adminDashboard');
    });
    
//});
Route::get('/admin/dashboard', [App\Http\Controllers\AdminLoginController::class, 'dashboard'])->name('adminDashboard');
