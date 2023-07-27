<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassLevelController;
use App\Http\Controllers\UsersController;

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/', [LoginController::class, 'showLoginForm']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('class-levels', [ClassLevelController::class, 'index'])->name('class-levels');
    Route::get('/class-levels/{id}/edit', 'App\Http\Controllers\ClassLevelController@edit')->name('class-levels.edit');
    Route::put('class-levels/{id}', 'App\Http\Controllers\ClassLevelController@update')->name('class-levels.update');
    Route::get('class-levels/create', 'App\Http\Controllers\ClassLevelController@create')->name('class-levels.create');
    Route::post('class-levels', 'App\Http\Controllers\ClassLevelController@store')->name('class-levels.store');
    Route::delete('class-levels/{id}', 'App\Http\Controllers\ClassLevelController@destroy')->name('class-levels.destroy');
    Route::get('/users', 'App\Http\Controllers\UsersController@index')->name('users.index');
    Route::get('users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('users', [UsersController::class, 'store'])->name('users.store');
});



Route::get('/home', function () {
    return redirect('/dashboard');
});
