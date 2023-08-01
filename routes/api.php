<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Domain\Address\Controllers\CityController;

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

    Route::get('cidades', [CityController::class, 'index'])->name('index');

    Route::post('cidades', [CityController::class, 'store'])->name('store');

    Route::put('cidades/{id}', [CityController::class, 'update'])->name('update');

    Route::delete('cidades/{id}', [CityController::class, 'destroy'])->name('destroy');

});
