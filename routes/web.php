<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Room\RoomController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\Destination\DestinationController;
use App\Http\Controllers\Administrator\Dashboard\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home.index');
})->name('home');


Route::middleware('guest')->group( function () {
    Route::get('login',[AuthController::class, 'index'])->name('login');

    Route::prefix('rooms')->group( function () {
        Route::get('',[RoomController::class, 'index'])->name('rooms');
        Route::get('detail',[RoomController::class, 'detail'])->name('detail.rooms');
        Route::get('payments',[RoomController::class, 'payment'])->name('payments.rooms');
    });

    Route::get('histories',[DestinationController::class, 'index'])->name('histories');

    Route::get('destinations',[DestinationController::class, 'index'])->name('destinations');

    Route::get('galleries',[GalleryController::class, 'index'])->name('galleries');

    Route::get('contacts',[ContactController::class, 'index'])->name('contacts');
});

Route::prefix('apps')->middleware('auth')->group( function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('apps.dashboard');
});
