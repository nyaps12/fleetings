<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\Admin;
use App\Http\Controllers\pages\Driver;
use App\Http\Controllers\pages\AdminController;
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
  'admin.auth',
  'verified',
])->group(function () {
  // Admin Routes
  Route::get('admin/dashboard', [Admin::class, 'dashboard'])->name('dashboard');
  Route::get('admin/delivery-scheduling', [Admin::class, 'scheduling'])->name('delivery-scheduling');
  Route::get('admin/add-schedule', [Admin::class, 'addsched'])->name('add-schedule');
  Route::get('admin/vehicles-information', [Admin::class, 'info'])->name('vehicles-information');
  Route::get('admin/vehicles-information/{id}', [Admin::class, 'infodisplay'])->name('vehicles-infodisplay');
  Route::get('admin/vehicle-maintenance', [Admin::class, 'maintenance'])->name('vehicle-maintenance');
  Route::get('admin/reporting-and-analytics', [Admin::class, 'report'])->name('reporting-and-analytics');
  Route::get('admin/driver-performance', [Admin::class, 'performance'])->name('driver-performance');
  Route::get('admin/order', [Admin::class, 'order'])->name('order');

  Route::get('admin/all-sched', [Admin::class, 'allsched'])->name('all-sched');
  Route::get('admin/on-route-list', [Admin::class, 'onroute'])->name('onroute');

  // DRIVER SIDE OPERATE AND ASSIGN
  Route::get('admin/operator', [Admin::class, 'operator'])->name('operator');
  Route::get('admin/vehicle', [Admin::class, 'view'])->name('vehicle');
  Route::get('admin/drivers', [Admin::class, 'drivers'])->name('drivers');

  Route::get('/admin/assign/{id}', [Admin::class, 'assign'])->name('admin.assign');

  Route::post('/admin/assign', [Admin::class, 'assignSuccess'])->name('assignSuccess');

  /// PROFILE THINGS
  Route::get('admin/profile', [Admin::class, 'profile'])->name('profile.show');

  // Resources for Roles and Users
  Route::resources([
      'admin/roles' => RoleController::class,
      'admin/users' => UserController::class,
  ]);

});

// Driver Routes (nested within the auth middleware group)
Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
  'driver.auth', // Add your custom middleware here
])->group(function () {
  // Define routes specific to driver users here
  // For example:
  Route::get('dashboard', [Driver::class, 'dashboard'])->name('dashboard.index');
  Route::get('map', [Driver::class, 'map'])->name('map');
  Route::get('assignments', [Driver::class, 'assignments'])->name('assignments');
  Route::get('report', [Driver::class, 'report'])->name('report');

  /// PROFILE THINGS
  Route::get('profile', [Driver::class, 'profile'])->name('profile');
  // Add more routes as needed for the driver user role
});



Route::get('/home',[AdminController::class, 'index']);



// 
