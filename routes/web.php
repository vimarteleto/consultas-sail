<?php

use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\PatientsController;
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

Route::middleware('auth')->group(function () {
    Route::get('/patients', [PatientsController::class, 'getPatients'])->name('patients');
    Route::post('/patient/edit/{id}', [PatientsController::class, 'updatePatient'])->name('edit-patient');
    Route::get('/patient/delete/{id}', [PatientsController::class, 'deletePatient'])->name('delete-patient');
    Route::get('/patient/create', [PatientsController::class, 'createPatient'])->name('create-patient');
    Route::post('/patient/store', [PatientsController::class, 'storePatient'])->name('store-patient');
    Route::get('/patient/{id}', [PatientsController::class, 'getPatientById'])->name('patient');
});
