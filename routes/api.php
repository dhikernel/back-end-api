<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Domain\Address\Controllers\CityController;
use App\Domain\Doctor\Controllers\DoctorController;
use App\Domain\Patient\Controllers\PatientController;

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

Route::group(['middleware' => ['jwt.verify'], 'prefix' => 'auth'], function () {

    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');

    Route::post('me', [AuthController::class, 'me'])->name('me');

});

Route::group(['middleware' => 'jwt.auth'], function () {

    Route::get('cidades', [CityController::class, 'index'])->name('city.index');

    Route::post('cidades', [CityController::class, 'store'])->name('city.store');

    Route::put('cidade/{id}', [CityController::class, 'update'])->name('city.update');

    Route::delete('cidade/{id}', [CityController::class, 'destroy'])->name('city.destroy');

    Route::get('medicos', [DoctorController::class, 'index'])->name('doctor.index');

    Route::post('medicos', [DoctorController::class, 'store'])->name('doctor.store');

    Route::put('medico/{id}', [DoctorController::class, 'update'])->name('doctor.update');

    Route::delete('medico/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');

    Route::put('pacientes/{id_paciente}', [PatientController::class, 'update'])->name('patient.update');

    Route::get('medicos/{id}/pacientes', [PatientController::class, 'patient'])->name('doctor.patient');

});
