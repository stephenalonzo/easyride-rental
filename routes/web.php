<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ReservationDetail;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware\CheckSession;

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

Route::post('/reservations/reserve', [ReservationController::class, 'store']);

Route::post('/reservations/details', [ReservationController::class, 'details']);

Route::get('/reservations/search', [ReservationController::class, 'index']);
Route::post('/reservations/search', [ReservationController::class, 'search']);

Route::get('/reservations/{reservation:confirm_number}', [ReservationController::class, 'show'])->name('show');

Route::get('/flush', [ReservationController::class, 'flush'])->name('flush');