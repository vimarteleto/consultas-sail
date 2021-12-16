<?php

use App\Http\Controllers\Web\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'getAppointments'])->name('dashboard');
    Route::get('/appointment/{id}', [DashboardController::class, 'getAppointmentById'])->name('appointment');
});
