<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/home', function () {
        return view('admin.index');
    })->name('admin.dashboard');

    Route::get('login',[LoginController::class,'login'])->name('admin.login.view');


});
