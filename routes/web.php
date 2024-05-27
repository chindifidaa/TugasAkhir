<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Administrator\Room\RoomController;
use App\Http\Controllers\Administrator\User\UserController;
use App\Http\Controllers\Administrator\Galery\GaleryController;
use App\Http\Controllers\Administrator\Facility\FacilityController;
use App\Http\Controllers\Administrator\Dashboard\DashboardController;
use App\Http\Controllers\Administrator\TypeOfRoom\TypeOfRoomController;
use App\Http\Controllers\Administrator\TypeOfPayment\TypeOfPaymentController;
use App\Http\Controllers\Administrator\TypeOfFacility\TypeOfFacilityController;
use App\Http\Controllers\Administrator\Destination\DestinationController;

use App\Http\Controllers\Room\RoomController as GuestRoomController;
use App\Http\Controllers\Contact\ContactController as GuestContactController;
use App\Http\Controllers\Gallery\GalleryController as GuestGalleryController;
use App\Http\Controllers\Destination\DestinationController as GuestDestinationController;


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

    Route::prefix('galleries')->group( function () {
        Route::get('',[GaleryController::class, 'index'])->name('apps.gallery');
        Route::get('create',[GaleryController::class, 'create'])->name('apps.gallery.create');
        Route::post('store',[GaleryController::class, 'store'])->name('apps.gallery.store');
        Route::get('{galery}/edit',[GaleryController::class, 'edit'])->name('apps.gallery.edit');
        Route::post('{galery}/update',[GaleryController::class, 'update'])->name('apps.gallery.update');
        Route::get('{galery}/delete',[GaleryController::class, 'delete'])->name('apps.gallery.delete');
    });
    Route::prefix('destinations')->group( function () {
        Route::get('',[DestinationController::class, 'index'])->name('apps.destination');
        Route::get('create',[DestinationController::class, 'create'])->name('apps.destination.create');
        Route::post('store',[DestinationController::class, 'store'])->name('apps.destination.store');
        Route::get('{destination}/edit',[DestinationController::class, 'edit'])->name('apps.destination.edit');
        Route::post('{destination}/update',[DestinationController::class, 'update'])->name('apps.destination.update');
        Route::get('{destination}/delete',[DestinationController::class, 'delete'])->name('apps.destination.delete');
    });
    Route::prefix('facilities')->group( function () {
        Route::get('',[FacilityController::class, 'index'])->name('apps.facility');
        Route::get('create',[FacilityController::class, 'create'])->name('apps.facility.create');
        Route::post('store',[FacilityController::class, 'store'])->name('apps.facility.store');
        Route::get('{facility}/edit',[FacilityController::class, 'edit'])->name('apps.facility.edit');
        Route::post('{facility}/update',[FacilityController::class, 'update'])->name('apps.facility.update');
        Route::get('{facility}/delete',[FacilityController::class, 'delete'])->name('apps.facility.delete');
    });

    Route::prefix('type-facilities')->group( function () {
        Route::get('',[TypeOfFacilityController::class, 'index'])->name('apps.typeFacility');
        Route::get('create',[TypeOfFacilityController::class, 'create'])->name('apps.typeFacility.crate');
        Route::post('store',[TypeOfFacilityController::class, 'store'])->name('apps.typeFacility.store');
        Route::get('{typeOfFacility}/edit',[TypeOfFacilityController::class, 'edit'])->name('apps.typeFacility.edit');
        Route::post('{typeOfFacility}/update',[TypeOfFacilityController::class, 'update'])->name('apps.typeFacility.update');
        Route::get('{typeOfFacility}/delete',[TypeOfFacilityController::class, 'delete'])->name('apps.typeFacility.delete');
    });

    Route::prefix('type-payments')->group( function () {
        Route::get('',[TypeOfPaymentController::class, 'index'])->name('apps.typePayment');
        Route::get('create',[TypeOfPaymentController::class, 'create'])->name('apps.typePayment.create');
        Route::post('store',[TypeOfPaymentController::class, 'store'])->name('apps.typePayment.store');
        Route::get('{typePayment}/edit',[TypeOfPaymentController::class, 'edit'])->name('apps.typePayment.edit');
        Route::post('{typePayment}/update',[TypeOfPaymentController::class, 'update'])->name('apps.typePayment.update');
        Route::get('{typePayment}/delete',[TypeOfPaymentController::class, 'delete'])->name('apps.typePayment.delete');
    });

    Route::prefix('type-rooms')->group( function () {
        Route::get('',[TypeOfRoomController::class, 'index'])->name('apps.typeRoom');
        Route::get('create',[TypeOfRoomController::class, 'create'])->name('apps.typeRoom.crate');
        Route::post('store',[TypeOfRoomController::class, 'store'])->name('apps.typeRoom.store');
        Route::get('{typeOfRoom}/edit',[TypeOfRoomController::class, 'edit'])->name('apps.typeRoom.edit');
        Route::post('{typeOfRoom}/update',[TypeOfRoomController::class, 'update'])->name('apps.typeRoom.update');
        Route::get('{typeOfRoom}/delete',[TypeOfRoomController::class, 'delete'])->name('apps.typeRoom.delete');
    });

    Route::prefix('users')->group( function () {
        Route::get('',[UserController::class, 'index'])->name('apps.users');
        Route::get('create',[UserController::class, 'create'])->name('apps.users.create');
        Route::post('store',[UserController::class, 'store'])->name('apps.users.store');
    });

    Route::get('logout',[AuthController::class,'logout'])->name('apps.logout');
});
