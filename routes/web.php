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
    return view('admin.login');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// for admin template load route
Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'showAdminLoginForm'])-> name('admin.login');
Route::get('admin/register', [App\Http\Controllers\AdminController::class, 'showAdminRegisterForm'])-> name('admin.register');
Route::get('admin/dashboard', [App\Http\Controllers\AdminController::class, 'showAdminDashboard'])-> name('admin.dashboard');

// login and registration route
Route::post('admin/login', [\App\Http\Controllers\Auth\LoginController::class, 'login']) -> name('admin.login');
Route::post('admin/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']) -> name('admin.register');
Route::post('admin/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']) -> name('admin.logout');

// post route
Route::resource('post','App\Http\Controllers\PostController');

// category route
Route::resource('category','App\Http\Controllers\CategoryController');
Route::get('category/status-inactive/{id}', 'App\Http\Controllers\CategoryController@statusUpdateInactive');
Route::get('category/status-active/{id}', 'App\Http\Controllers\CategoryController@statusUpdateActive');


// tag route
Route::resource('tag','App\Http\Controllers\TagController');
Route::get('tag/status-inactive/{id}', 'App\Http\Controllers\TagController@statusUpdateInactive');
Route::get('tag/status-active/{id}', 'App\Http\Controllers\TagController@statusUpdateActive');
