<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimoniController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'Logout'])->middleware('auth');

// Registrasi
Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'registrasi']);

// Dashboard admin
Route::get('/dashboard', [DashboardController::class, 'dash'])->middleware('auth');

// Services admin
Route::resource('/services', ServicesController::class)->except('show', 'edit', 'update', 'destroy')->middleware('auth');
Route::delete('/services/{id}', [ServicesController::class, 'delete'])->middleware('auth');
Route::get('/services/{id}', [ServicesController::class, 'showw'])->middleware('auth');
Route::get('/services/{id}/edit', [ServicesController::class, 'editt'])->middleware('auth');
Route::post('/services/{id}/edit', [ServicesController::class, 'updated'])->middleware('auth');

// Portfolio
Route::resource('/portfolio', PortfolioController::class)->middleware('auth');

// Testimoni
Route::resource('/testimoni', TestimoniController::class)->middleware('auth');

// Landing page
Route::get('/', [LandingpageController::class, 'index']);
