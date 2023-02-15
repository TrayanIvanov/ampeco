<?php

use App\Http\Controllers\Api\BitcoinTradesApiController;
use App\Http\Controllers\Api\SubscribersApiController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'show']);
Route::post('/', [HomeController::class, 'store']);

Route::get('/vue', [HomeController::class, 'showVue']);

Route::apiResource('bitcoin-trades', BitcoinTradesApiController::class);
Route::apiResource('subscribe', SubscribersApiController::class);
