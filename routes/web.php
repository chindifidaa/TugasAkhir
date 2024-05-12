<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Administrator\Room\RoomController;
use App\Http\Controllers\Administrator\User\UserController;
use App\Http\Controllers\Administrator\Dashboard\DashboardController;

use App\Http\Controllers\Contact\ContactController as GuestContactController;
use App\Http\Controllers\Destination\DestinationController as GuestDestinationController;
use App\Http\Controllers\Gallery\GalleryController as GuestGalleryController;
use App\Http\Controllers\Room\RoomController as GuestRoomController;


Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('auth',[AuthController::class, 'index'])->name('auth');
Route::post('login',[AuthController::class, 'login'])->name('login');

Route::get('histories',[GuestDestinationController::class, 'index'])->name('histories');
Route::get('destinations',[GuestDestinationController::class, 'index'])->name('destinations');
Route::get('galleries',[GuestGalleryController::class, 'index'])->name('galleries');
Route::get('contacts',[GuestContactController::class, 'index'])->name('contacts');

Route::prefix('rooms')->group( function () {
    Route::get('',[GuestRoomController::class, 'index'])->name('rooms');
    Route::get('detail',[GuestRoomController::class, 'detail'])->name('detail.rooms');
    Route::get('payments',[GuestRoomController::class, 'payment'])->name('payments.rooms');
});


Route::prefix('apps')->middleware('auth')->group( function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('apps.dashboard');

    Route::prefix('rooms')->group( function () {
        Route::get('',[RoomController::class, 'index'])->name('apps.rooms');
        Route::get('create',[RoomController::class, 'create'])->name('apps.rooms.create');
        Route::post('store',[RoomController::class, 'store'])->name('apps.rooms.store');
        Route::get('{room}/edit',[RoomController::class, 'edit'])->name('apps.rooms.edit');
        Route::post('{room}/update',[RoomController::class, 'update'])->name('apps.rooms.update');
        Route::get('{room}/delete',[RoomController::class, 'delete'])->name('apps.rooms.delete');
    });

    Route::prefix('users')->group( function () {
        Route::get('',[UserController::class, 'index'])->name('apps.users');
        Route::get('create',[UserController::class, 'create'])->name('apps.users.create');
        Route::post('store',[UserController::class, 'store'])->name('apps.users.store');
    });

    Route::get('logout',[AuthController::class,'logout'])->name('apps.logout');
});
