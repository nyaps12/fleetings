<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\Admin;
use App\Http\Controllers\pages\Driver;
use App\Http\Controllers\pages\AdminContoller;
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

// Routes within the authentication middleware group
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  // Admin Routes
  Route::get('admin/dashboard', [Admin::class, 'dashboard'])->name('dashboard');
  Route::get('admin/delivery-scheduling', [Admin::class, 'scheduling'])->name('delivery-scheduling');
  Route::get('admin/vehicles-information', [Admin::class, 'info'])->name('vehicles-information');
  Route::get('admin/vehicle-maintenance', [Admin::class, 'maintenance'])->name('vehicle-maintenance');
  Route::get('admin/drivers', [Admin::class, 'drivers'])->name('drivers');
  Route::get('admin/reporting-and-analytics', [Admin::class, 'report'])->name('reporting-and-analytics');
  Route::get('admin/driver-performance', [Admin::class, 'performance'])->name('driver-performance');
  Route::get('admin/order', [Admin::class, 'order'])->name('order');
  Route::get('admin/vehicle', [Admin::class, 'view'])->name('vehicle');
  Route::get('admin/all-sched', [Admin::class, 'allsched'])->name('all-sched');
  // Define other admin routes...

  // Resources for Roles and Users
  Route::resources([
      'roles' => RoleController::class,
      'users' => UserController::class,
  ]);
});

// Redirect to login page
Route::redirect('/', '/login');

// Route for changing language
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// Driver Routes (nested within the auth middleware group)
Route::middleware('auth')->group(function () {
  // Define routes specific to driver users here
  // For example:
  Route::get('dashboard', [Driver::class, 'dashboard'])->name('dashboard');
  // Add more routes as needed for the driver user role
});