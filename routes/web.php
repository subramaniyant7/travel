<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\Placecontroller;
use App\Http\Controllers\Admin\Flightcontroller;



Route::get('/registration', function () { return view('register'); });
Route::get('/login', [GlobalController::class, 'login']);
Route::post('/validate', [GlobalController::class, 'userValidate']);
Route::get('/logout', [GlobalController::class, 'logout']);
Route::get('/search', function () { return view('search'); });
Route::post('/booking', [GlobalController::class, 'booking']);
Route::get('/trips', function () { return view('trips'); });
Route::get('/flights', function () { return view('flights'); });
Route::get('/', function () { return view('home'); });

Route::prefix('/bookingadmin')->namespace('Admin')->group(function(){
    Route::get('/', function(){ return view('admin/login'); });
    Route::post('/validate', [Admincontroller::class, 'isValidate']);
    Route::middleware(['adminauth'])->group(function () {
        Route::get('/dashboard', [Admincontroller::class, 'dashboard']);
        Route::get('/flights', [Flightcontroller::class, 'flights']);
        Route::post('/loadplace', [Flightcontroller::class, 'loadPlace']);
        Route::get('/add_flight', [Flightcontroller::class, 'addFlight']);
        Route::post('/saveflight', [Flightcontroller::class, 'saveFlight']);
        Route::get('/places', [Placecontroller::class, 'places']);
        Route::get('/add_place',[Placecontroller::class, 'addPlace']);
        Route::get('/edit_place/{id}',[Placecontroller::class, 'editPlace']);
        Route::get('/delete_place/{id}',[Placecontroller::class, 'deletePlace']);
        Route::post('/saveplace',[Placecontroller::class, 'savePlace']);
        Route::get('/logout', [Admincontroller::class, 'logout']);
    });

});

