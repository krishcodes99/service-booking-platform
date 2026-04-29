<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/provider/dashboard', function () {
    return "Welcome Provider Dashboard";
})->middleware('role:provider');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/services/create', [ServiceController::class, 'create'])
    ->middleware('role:provider');

Route::post('/services', [ServiceController::class, 'store'])
    ->middleware('role:provider');

Route::get('/services', [ServiceController::class, 'index']);    

Route::get('/book/{id}', [BookingController::class, 'create'])
    ->middleware('role:user');

Route::post('/book', [BookingController::class, 'store'])
    ->middleware('role:user');

Route::get('/my-bookings', [BookingController::class, 'index'])
    ->middleware('role:user');

Route::get('/provider/bookings', [BookingController::class, 'providerBookings'])
    ->middleware('role:provider');

Route::post('/booking/{id}/accept', [BookingController::class, 'accept'])
    ->middleware('role:provider');

Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])
    ->middleware('role:provider');

require __DIR__.'/auth.php';
