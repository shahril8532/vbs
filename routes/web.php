<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; 
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DriversController;
use App\Http\Controllers\PenggunasController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\DownloadFileController;

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
//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return redirect('login');
//});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('landingpage');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'permission']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');  
    Route::get('/landing', [LandingController::class, 'index'])->name('landingpage');  
    Route::group(['prefix'=> 'users', 'as' => 'users.'], function(){
        Route::resource('permissions', PermissionsController::class);
        Route::resource('roles', RolesController::class);
        Route::resource('drivers', DriversController::class,);
        Route::resource('vehicles', VehiclesController::class,); 
        Route::resource('bookings', BookingsController::class,); 
        Route::resource('penggunas', PenggunasController::class,); 
        Route::resource('reports', ReportsController::class,); 
        Route::get('file-upload', [FileController::class, 'index'])->name('index');
        Route::post('file-upload', [FileController::class, 'store'])->name('file.store'); 
        Route::get('filter', [ReportsController::class, 'filter'])->name('reports.filter'); 
        Route::get('sent-mail', [BookingsController::class, 'contact_mail'])->name('sent-mail'); 
    });
    Route::resource('users', UsersController::class);
    Route::get('export', [BookingsController::class, 'export'])->name('export');
    
});