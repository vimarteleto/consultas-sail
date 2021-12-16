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
    Route::post('/appointment/edit/{id}', [DashboardController::class, 'updateAppointment'])->name('edit-appointment');
    Route::get('/appointment/delete/{id}', [DashboardController::class, 'deleteAppointment'])->name('delete-appointment');
    Route::get('/appointment/create', [DashboardController::class, 'createAppointment'])->name('create-appointment');
    Route::post('/appointment/store', [DashboardController::class, 'storeAppointment'])->name('store-appointment');
    Route::get('/appointment/{id}', [DashboardController::class, 'getAppointmentById'])->name('appointment');
});
