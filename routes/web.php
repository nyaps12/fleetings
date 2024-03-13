<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\Admin;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Redirect to login page
Route::redirect(uri: '/', destination: 'login');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', function () {
    return view('content.admin.dashboard');
  })->name('dashboard');

  // Admin Route //
  Route::get('/', [Admin::class, 'dashboard'])->name('dashboard');
  Route::get('delivery-scheduling', [Admin::class, 'scheduling'])->name('delivery-scheduling');
  Route::get('vehicles-information', [Admin::class, 'info'])->name('vehicles-information');
  Route::get('vehicle-maintenance', [Admin::class, 'maintenance'])->name('vehicle-maintenance');
  Route::get('vehicle-availability', [Admin::class, 'availability'])->name('vehicle-availability');
  Route::get('tracking', [Admin::class, 'track'])->name('tracking');
  Route::get('reporting-and-analytics', [Admin::class, 'report'])->name('reporting-and-analytics');
  Route::get('driver-performance', [Admin::class, 'performance'])->name('driver-performance');
  Route::get('order', [Admin::class, 'order'])->name('order');
  Route::get('vehicle', [Admin::class, 'view'])->name('vehicle');
});

// 

//Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
]);