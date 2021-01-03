<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalController;
use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Admin\Placecontroller;
use App\Http\Controllers\Admin\Flightcontroller;
use App\Http\Controllers\PaymentController;



Route::get('/registration', [GlobalController::class, 'register']);
Route::get('/login', [GlobalController::class, 'login']);
Route::post('/load_state', [GlobalController::class, 'loadState']);
Route::post('/load_city', [GlobalController::class, 'loadCity']);
Route::post('/email_validate', [GlobalController::class, 'emailValidate']);
Route::post('/create_user', [GlobalController::class, 'createUser']);
Route::post('/validate', [GlobalController::class, 'userValidate']);
Route::get('/logout', [GlobalController::class, 'logout']);
Route::get('/flightsearch', [GlobalController::class, 'flightSearch']);
Route::post('/booking', [GlobalController::class, 'booking']);
Route::post('/flight_payment', [GlobalController::class, 'flightPayment']);
Route::get('/trips', function () { return view('trips'); });
Route::get('/flights', [GlobalController::class, 'flights']);
Route::get('/', [GlobalController::class, 'home']);

Route::get('/payment-initiate',function(){
    return view('payment-initiate');
});

// for Initiate the order
Route::post('/payment-initiate-request',[PaymentController::class, 'Initiate'] );

// for Payment complete
Route::post('/payment-complete',[PaymentController::class, 'Complete']);




Route::prefix('/bookingadmin')->namespace('Admin')->group(function(){
    Route::get('/', [Admincontroller::class, 'login']);
    Route::post('/validate', [Admincontroller::class, 'isValidate']);
    Route::middleware(['adminauth'])->group(function () {
        Route::get('/dashboard', [Admincontroller::class, 'dashboard']);
        Route::get('/flights', [Flightcontroller::class, 'flights']);
        Route::get('/add_flight', [Flightcontroller::class, 'addFlight']);
        Route::get('/edit_flight/{id}', [Flightcontroller::class, 'editFlight']);
        Route::get('/delete_flight/{id}',[Flightcontroller::class, 'deleteFlight']);
        Route::post('/saveflight', [Flightcontroller::class, 'saveFlight']);
        Route::get('/places', [Placecontroller::class, 'places']);
        Route::get('/add_place',[Placecontroller::class, 'addPlace']);
        Route::get('/edit_place/{id}',[Placecontroller::class, 'editPlace']);
        Route::get('/delete_place/{id}',[Placecontroller::class, 'deletePlace']);
        Route::post('/saveplace',[Placecontroller::class, 'savePlace']);
        Route::get('/logout', [Admincontroller::class, 'logout']);
    });

    Route::fallback(function () { return view('errors.404_admin'); });
});


Route::fallback(function () { return view('errors.404'); });



