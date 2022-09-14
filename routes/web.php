<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['role:admin'])->group(function() {
    Route::resource('/project', ProjectController::class);
    Route::resource('/task', TaskController::class);
});

Route::middleware(['role:user'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
