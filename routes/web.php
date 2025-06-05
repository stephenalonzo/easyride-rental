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

Route::get('/reservations/create', [ReservationController::class, 'create'])->middleware(CheckSession::class);

Route::post('/reservations/details', [ReservationController::class, 'details']);

Route::post('/reservations/reserve', [ReservationController::class, 'store']);

Route::get('/reservations/search', [ReservationController::class, 'index']);
Route::post('/reservations/search', [ReservationController::class, 'search']);

Route::post('/reservations/reminder', [MailController::class, 'store']);

Route::put('/reservations/update', [ReservationController::class, 'update']);
Route::delete('/reservations/delete', [ReservationController::class, 'adminDestroy']);

Route::delete('/reservations/{reservation}/delete', [ReservationController::class, 'ownerDestroy']);

Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit']);

Route::post('/register/create', [UserController::class, 'store']);
Route::get('/register', [UserController::class, 'create']);

Route::post('/login/auth', [UserController::class, 'authenticate']);
Route::get('/login', [UserController::class, 'index']);

Route::get('/logout', [UserController::class, 'destroy']);

Route::get('/vehicles', [VehicleController::class, 'index']);
Route::get('/vehicles/{vehicle}', [VehicleController::class, 'show']);