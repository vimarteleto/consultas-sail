<?php

use App\Http\Controllers\API\AppointmentController;
use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\SpecialtyController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// users
Route::middleware('auth:api')->group(function () {
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/users/{id}', [UserController::class, 'getUserById']);
    Route::get('/users/appointments/{id}', [UserController::class, 'getAppointmentsByUserId']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::delete('/users/{id}', [UserController::class, 'deleteUser']);
});

// patients
Route::middleware('auth:api')->group(function () {
    Route::post('/patients', [PatientController::class, 'createPatient']);
    Route::get('/patients', [PatientController::class, 'getPatients']);
    Route::get('/patients/{id}', [PatientController::class, 'getPatientById']);
    Route::get('/patients/appointments/{id}', [PatientController::class, 'getAppointmentsByPatientId']);
    Route::put('/patients/{id}', [PatientController::class, 'updatePatient']);
    Route::delete('/patients/{id}', [PatientController::class, 'deletePatient']);
});

// specialties
Route::middleware('auth:api')->group(function () {
    Route::post('/specialties', [SpecialtyController::class, 'createSpecialty']);
    Route::get('/specialties', [SpecialtyController::class, 'getSpecialties']);
    Route::get('/specialties/{id}', [SpecialtyController::class, 'getSpecialtyById']);
    Route::get('/specialties/doctors/{id}', [SpecialtyController::class, 'getDoctorsBySpecialtyId']);
    Route::put('/specialties/{id}', [SpecialtyController::class, 'updateSpecialty']);
    Route::delete('/specialties/{id}', [SpecialtyController::class, 'deleteSpecialty']);
});

// appointments
Route::middleware('auth:api')->group(function () {
    Route::post('/appointments', [AppointmentController::class, 'createAppointment']);
    Route::get('/appointments', [AppointmentController::class, 'getAppointments']);
    Route::get('/appointments/{id}', [AppointmentController::class, 'getAppointmentById']);
    Route::get('/appointments/patient/{id}', [AppointmentController::class, 'getAppointmentPatient']);
    Route::get('/appointments/doctor/{id}', [AppointmentController::class, 'getAppointmentDoctor']);
    Route::put('/appointments/{id}', [AppointmentController::class, 'updateAppointment']);
    Route::delete('/appointments/{id}', [AppointmentController::class, 'deleteAppointment']);
});
