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


// REGISTRATION
Route::get('/', [App\Http\Controllers\RegistrationController::class, 'index']);
Route::post('/user-registration', [App\Http\Controllers\RegistrationController::class, 'registration'])->name('user-register');

Route::get('send-mail', function () {
   
    
   
    dd("Email is Sent.");
});