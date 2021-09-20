<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\OAuthController;
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
    return redirect()->route('home');
});

Route::prefix('/')->group(function() {
    Route::view('home', 'home')->name('home');
    Route::post('/get-token', [OAuthController::class, 'doGenerateToken'])->name('generate.token');
    Route::get('/get-token', [OAuthController::class, 'doSuccessToken'])->name('token.success');
    Route::post('/send', [MailController::class, 'doSendEmail'])->name('send.email');
});