<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [ActivityController::class, 'index'])->name('activities');
Route::get('/crear', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/', [ActivityController::class, 'store'])->name('activities.store');
