<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/activities', [ActivityController::class, 'list'])->name('activities.list');
Route::get('/activities/new', [ActivityController::class, 'new'])->name('activities.new');
Route::post('/activities/save', [ActivityController::class, 'save'])->name('activities.save');
