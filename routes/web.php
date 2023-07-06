<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->controller(AuthController::class)->group(function() {
    Route::post('process', 'authProcess')->name('auth.process');
});

Route::prefix('dashboard')->controller(DashboardController::class)->group(function() {
    Route::get('/', 'index');
});

Route::resource('client', ClientController::class)->except('create','edit');
Route::prefix('client')->controller(ClientController::class)->group(function() {
    Route::get('show/datatable', 'showDatatable')->name('client.main.table');
});
