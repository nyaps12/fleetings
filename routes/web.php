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
use App\Http\Controllers\GoogleController;
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

//Login Things
Route::redirect(uri: '/', destination: 'login');

Route::get('auth/google', [GoogleController::class, 'loginWithGoogle'])->name('google.login');
Route::any('auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('google.callback');

Route::get('/password-request', function () {
  return view('auth.forgot-password');
})->name('password.request');

Route::get('/email-request', function () {
  return view('auth.forgot-password');
})->name('password.email');

//

//language
Route::get('lang/{locale}', [LanguageController::class, 'swap']);


Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'admin.auth',
  'verified',
])->group(function () {
  // Admin Routes
  Route::get('admin/dashboard', [Admin::class, 'dashboard'])->name('dashboard');

  //SCHEDULE

  Route::get('admin/delivery-scheduling', [Admin::class, 'scheduling'])->name('delivery-scheduling');
  // Route::get('admin/add-schedule', [Admin::class, 'addsched'])->name('add-schedule');
  Route::get('admin/add-schedule', [Admin::class, 'addSchedule'])->name('add.schedule');
  Route::post('admin/save-schedule', [Admin::class, 'saveSchedule'])->name('save.schedule');
  // Route::post('save-route', [Admin::class, 'saveRoute']);

  //
  Route::get('admin/vehicles-information', [Admin::class, 'info'])->name('vehicles-information');
  Route::get('admin/vehicles-information/{id}', [Admin::class, 'infodisplay'])->name('vehicles-infodisplay');
  Route::get('admin/vehicle-maintenance', [Admin::class, 'maintenance'])->name('vehicle-maintenance');
  Route::get('admin/reports', [Admin::class, 'report'])->name('report');
  Route::get('admin/driver-performance', [Admin::class, 'performance'])->name('driver-performance');
  Route::get('admin/order', [Admin::class, 'order'])->name('order');
  Route::get('admin/all-sched', [Admin::class, 'allsched'])->name('all-sched');
  Route::get('admin/on-route-list', [Admin::class, 'onroute'])->name('onroute');
  Route::get('admin/driver-reports', [Admin::class, 'reported'])->name('drive-reports');
  Route::get('admin/vehicle-issues', [Admin::class, 'issues'])->name('vehicle-issues');

  // DRIVER SIDE OPERATE AND ASSIGN
  Route::get('admin/operator', [Admin::class, 'operator'])->name('operator');
  Route::get('admin/vehicle', [Admin::class, 'view'])->name('vehicle');
  Route::get('admin/drivers', [Admin::class, 'drivers'])->name('drivers');

  //ASSIGN OPERATOR
  Route::get('admin/assign/{id}', [Admin::class, 'assign'])->name('admin.assign');
  Route::post('admin/assign', [Admin::class, 'assignSuccess'])->name('assignSuccess');

  //ASSIGN CANCEL
  Route::get('admin/canceloperator/{id}', [Admin::class, 'cancel'])->name('admin.assigncancel');
  Route::delete('admin/cancel', [Admin::class, 'cancelSuccess'])->name('assignCancel');

  /// PROFILE THINGS
  // Route::get('admin/profile', [Admin::class, 'profile'])->name('profile.show');

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
  'driver.auth' // Add your custom middleware here
])->group(function () {
  // Define routes specific to driver users here
  // For example:
  Route::get('dashboard', [Driver::class, 'dashboard'])->name('dashboard.index');

  // Middleware for users who have completed their profile
  Route::middleware('profile.complete')->group(function () {
      Route::get('map', [Driver::class, 'map'])->name('map');
      Route::get('assignments', [Driver::class, 'assignments'])->name('assignments');
      // Route::get('report', [Driver::class, 'report'])->name('report');
      Route::get('history', [Driver::class, 'history'])->name('history');
      Route::get('vehicle-report', [Driver::class, 'vreport'])->name('vehicle-report');
      Route::get('fuel-report', [Driver::class, 'freport'])->name('fuel-report');
  });

  // Profile related routes
  Route::get('profile', [Driver::class, 'profile'])->name('profile');
  
  // Add more routes as needed for the driver user role
});




Route::get('/home',[AdminController::class, 'index']);



// 
