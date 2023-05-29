<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Controllers\FormController;
use App\Http\Middleware\RedirectDashboard;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

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


Route::post('/register', [FormController::class, 'register']);

Route::get('/dashboard', [BaseController::class, 'dashboard']);
Route::get('/home', [BaseController::class, 'home'])->middleware([RedirectDashboard::class]);

Route::middleware('AuthMiddleware')->group(function () {
  Route::get('/profile', [BaseController::class, 'profile']);
  Route::get('/settings', [BaseController::class, 'settings']);
});

Route::post('/contact', ContactController::class);

Route::resource('product', ProductController::class);

Route::Resource('/product', PostController::class);

Route::get('/', function () {
  return view('welcome');
});
