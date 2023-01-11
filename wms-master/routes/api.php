<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\InboundController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ProductController;
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



Route::get('/test-host', [AuthController::class, 'testHost']);
Route::get('/test', [AuthController::class, 'test']);
Route::post('/token', [AuthController::class, 'requestToken']);

Route::post('/test/products', [ProductController::class, 'store']);

Route::get('/test', [InboundController::class, 'test']);

