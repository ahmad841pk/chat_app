<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\ChatsController;
use Illuminate\Support\Facades\Route;




Route::prefix('admin')->group(function () {

    Route::get('login',[LoginController::class,'login'])->name('admin.login.view');
    Route::post('login',[LoginController::class,'authenticate'])->name('admin.authentication');

Route::middleware('auth:admin')->group(function () {
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
        Route::get('/dashboard', function () {
            return view('admin.index');
        })->name('admin.dashboard');

        Route::get('/chat', function () {
            return view('admin.chat.index');
        })->name('admin.chat');

    Route::get('/messages', [ChatsController::class, 'fetchMessages']);
    Route::post('/messages', [ChatsController::class, 'sendMessage'])->name('send.message');




});
});
