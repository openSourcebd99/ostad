<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('/profile', [ProfileController::class, 'createProfile']);
Route::get('/user-agent', [ProfileController::class, 'getUserAgent']);
Route::get('/page-info', [ProfileController::class, 'getPageInfo']);
Route::get('/sample-json', [ProfileController::class, 'getSampleJson']);
Route::post('/upload-file', [ProfileController::class, 'uploadFile']);
Route::get('/get-cookie', [ProfileController::class, 'getCookie']);
Route::post('/submit', [ProfileController::class, 'submit']);
