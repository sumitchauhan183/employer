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



//Login Routes
Route::get('admin',function () {
    return redirect()->route('admin.login');
});
Route::get('/',function () {
    return redirect()->route('admin.login');
});
Route::get('admin/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'showLoginForm'])->name('admin.login');
Route::post('admin/login',[App\Http\Controllers\Admin\Auth\LoginController::class,'login']);
Route::get('admin/dashboard',[App\Http\Controllers\Admin\HomeController::class,'dashboard'])->name('admin.dashboard');
Route::get('admin/logout',[App\Http\Controllers\Admin\HomeController::class,'logout'])->name('admin.logout');


//Forgot Password Routes
Route::get('admin/password/reset',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('admin/password/email',[App\Http\Controllers\Admin\Auth\ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');

//Reset Password Routes
Route::get('admin/password/reset/{token}',[App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('admin/password/reset',[App\Http\Controllers\Admin\Auth\ResetPasswordController::class,'reset'])->name('password.update');

Route::get('admin/home',[App\Http\Controllers\Admin\HomeController::class,'index'])->name('admin.home');

Route::get('no-access',[App\Http\Controllers\HomeController::class,'noaccess'])->name('noaccess');