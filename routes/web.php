<?php

use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ReservationDetail;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Middleware\CheckSession;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
})->name('/');

Route::middleware('auth')->group(function () {
    Route::get('/reservations/create', [ReservationController::class, 'create']);
    Route::post('/reservations/create', [ReservationController::class, 'create']);

    Route::post('/reservations/reserve', [ReservationController::class, 'store']);

    Route::post('/reservations/reminder', [MailController::class, 'sendReminder']);
    
    Route::put('/reservations/update', [ReservationController::class, 'confirmPayment']);
    
    Route::delete('/reservations/delete', [ReservationController::class, 'closeReservation']);
    Route::delete('/reservations/{reservation}/delete', [ReservationController::class, 'cancelReservation']);
    
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit']);
    Route::put('/reservations/{reservation}/update', [ReservationController::class, 'update']);
    
    Route::post('/reservations/search', [ReservationController::class, 'search']);
    Route::get('/reservations/{reservation:confirm_number}', [ReservationController::class, 'show']);
    
    Route::get('/logout', [UserController::class, 'destroy']);
});

Route::middleware('guest')->group(function () {
    Route::post('/register/create', [UserController::class, 'store']);
    Route::get('/register', [UserController::class, 'create']);

    Route::post('/login/auth', [UserController::class, 'authenticate']);
    Route::get('/login', [UserController::class, 'index'])->name('login');
});

Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/vehicles', [VehicleController::class, 'index']);
Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show']);