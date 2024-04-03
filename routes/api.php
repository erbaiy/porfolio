<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExperimentController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InformationContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::post('/login', [AuthController::class, 'login']);
Route::resource('/informations', InformationContoller::class);
Route::resource('/experiences', ExperimentController::class);
Route::resource('/formations', FormationController::class);
