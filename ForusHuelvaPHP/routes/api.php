<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\calendarController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CourtsController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentFeesController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\SportsController;
use App\Http\Controllers\SubFeesController;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\QRCodeController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('/provinces', ProvinceController::class);

Route::apiResource('/register', RegisterController::class);

Route::apiResource('/clients', ClientsController::class);

Route::apiResource('/courts', CourtsController::class);

Route::apiResource('/rentfees', RentFeesController::class);

Route::apiResource('/subfees', SubFeesController::class);

Route::apiResource('/times', TimeController::class);

Route::apiResource('/sports', SportsController::class);

Route::apiResource('/bankAccount', BankAccountController::class);

Route::apiResource('/resource', PasswordController::class);

Route::apiResource('/calendar', calendarController::class);


//generar qr

Route::get('/generate-qr', [QRCodeController::class, 'generate']);
