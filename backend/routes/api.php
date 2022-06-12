<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LibraryController;

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

Route::post('/library', [LibraryController::class, 'create']);
Route::get('/library/{library}', [LibraryController::class, 'index']);
Route::put('/library/{library}', [LibraryController::class, 'update']);
Route::delete('/library/{library}', [LibraryController::class, 'delete']);
