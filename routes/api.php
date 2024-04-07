<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DriverContoller;

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

///GETTING USER USING API
Route::get('users',[DriverContoller::class,'users']);
///

///GETTING USER USING API
Route::get('vehicle',[DriverContoller::class,'vehicle']);

Route::get('vehicle/{id}',[DriverContoller::class,'vehiclefind']);
///

///GETTING USER USING API
Route::get('driver/operator',[DriverContoller::class,'operator']);
///
