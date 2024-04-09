<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\Admin;
use App\Http\Controllers\pages\Driver;
use App\Http\Controllers\pages\AuthController;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\pages\LMSG44RouteController;

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
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

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
      Route::get('admin/dashboard', [Admin::class, 'dashboard'])->name('admin.dashboard');

      //DELIVERY LIST
      Route::get('admin/delivery', [Admin::class, 'deliveryList'])->name('delivery');
      //SCHEDULE

      Route::get('admin/delivery-scheduling', [Admin::class, 'scheduling'])->name('delivery-scheduling');

      // Route::get('admin/add-schedule', [Admin::class, 'addsched'])->name('add-schedule');
      Route::get('admin/add-schedule', [Admin::class, 'addSchedule'])->name('add.schedule');
      Route::post('admin/submitSchedule', [Admin::class, 'saveRoute'])->name('submitSchedule');
      // Route::post('admin/save-schedule', [Admin::class, 'saveSchedule'])->name('save.schedule');
      // Route::post('save-route', [Admin::class, 'saveRoute']);
      Route::post('save-route', [LMSG44RouteController::class, 'saveRoute']);
      //
      Route::get('admin/vehicles-information', [Admin::class, 'vehicleInfo'])->name('vehicles-information');
      Route::get('admin/vehicles-information/{id}', [Admin::class, 'infodisplay'])->name('vehicles-infodisplay');
      Route::get('admin/reports', [Admin::class, 'report'])->name('report');
      Route::get('admin/driver-performance', [Admin::class, 'performance'])->name('driver-performance');
      Route::get('admin/order', [Admin::class, 'order'])->name('order');
      Route::get('admin/all-sched', [Admin::class, 'allsched'])->name('all-sched');
      Route::get('admin/on-route-list', [Admin::class, 'onroute'])->name('onroute');
      Route::get('admin/driver-reports', [Admin::class, 'reported'])->name('drive-reports');
      Route::get('admin/vehicle-issues', [Admin::class, 'issues'])->name('vehicle-issues');
      Route::get('admin/service', [Admin::class, 'service'])->name('service');
      Route::get('admin/maintenance-overview', [Admin::class, 'maintenanceOverview'])->name('maintenance-overview');
      Route::get('admin/fuels-report', [Admin::class, 'fuelReport'])->name('fuels-report');
      Route::get('admin/incident-report', [Admin::class, 'incidents'])->name('incident-report');

  
      




      // Maintenance Schedule
      Route::get('admin/vehicle-maintenance', [Admin::class, 'maintenance'])->name('vehicle-maintenance');
      Route::post('admin/schedMaintenance', [Admin::class, 'schedMaintenance'])->name('schedMaintenance');

      // Vehicle Report
      Route::get('admin/vehicles-report', [Admin::class, 'vehicleReport'])->name('vehicles-report');
  

      // DRIVER SIDE OPERATE AND ASSIGN
      Route::get('admin/operator', [Admin::class, 'operator'])->name('operator');
      Route::get('admin/vehicle', [Admin::class, 'view'])->name('vehicle');
      Route::get('admin/drivers', [Admin::class, 'drivers'])->name('drivers');

      //ASSIGN OPERATOR
      Route::get('assign/{id}', [Admin::class, 'assign'])->name('admin.assign');
      Route::post('admin/assign', [Admin::class, 'assignSuccess'])->name('assignSuccess');

      //ASSIGN CANCEL
      Route::get('canceloperator/{id}', [Admin::class, 'cancel'])->name('admin.assigncancel');
      Route::delete('admin/cancel', [Admin::class, 'cancelSuccess'])->name('assignCancel');

      //ASSIGN SCHEDULE
      // Route::get('canceloperator/{id}', [Admin::class, 'cancel'])->name('admin.assigncancel');
      // Route::get('canceloperator/{id}', [Admin::class, 'cancel'])->name('admin.assigncancel');
      
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
      Route::get('dashboard', [Driver::class, 'dashboard'])->name('user.dashboard');


  // Middleware for users who have completed their profile
  Route::middleware('profile.complete')->group(function () {
      Route::get('map', [Driver::class, 'map'])->name('map');
      Route::get('assignments', [Driver::class, 'assignments'])->name('assignments');
      Route::get('driver-report', [Driver::class, 'report'])->name('user.report');
      Route::get('history', [Driver::class, 'history'])->name('history');
      Route::get('faq', [Driver::class, 'faq'])->name('user.faq');

      // Vehicle Report Form
      Route::get('vehicle-report', [Driver::class, 'vreport'])->name('vehicle-report');
      Route::post('submitVehicleReport', [Driver::class, 'submitReport'])->name('submitVehicleReport');

      // Fuel Report Form
      Route::get('fuel-report', [Driver::class, 'freport'])->name('fuel-report');
      Route::post('submitFuelReport', [Driver::class, 'FuelReport'])->name('submitFuelReport');

      // Incident Report Form
      Route::get('incident', [Driver::class, 'incident'])->name('incident');
      Route::post('submitIncident', [Driver::class, 'submitIncident'])->name('submitIncident');
  });

      // Profile related routes
      Route::get('profile', [Driver::class, 'profile'])->name('profile');
      
      // Add more routes as needed for the driver user role
    });




    Route::get('/home',[AuthController::class, 'index']);



// 
