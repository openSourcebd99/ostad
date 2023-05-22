<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

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

Route::get('/demo/{name}/{age}', [DemoController::class, 'demoAction']);
Route::get('/demo-json', [DemoController::class, 'demoJsonAction']);
Route::get('/headers', [DemoController::class, 'headersAction']);
Route::post('/file-details', [DemoController::class, 'fileDetails']);
Route::get('/accept-type-json', [DemoController::class, 'acceptTypeJSON']);
Route::get('/get-cookies', [DemoController::class, 'getCookies']);
Route::get('/set-cookie', [DemoController::class, 'setCookie']);
Route::get('/get-json-response', [DemoController::class, 'getJsonResponse']);
Route::get('/set-response-header', [DemoController::class, 'setResponseHeader']);
Route::get('/redirect', [DemoController::class, 'redirectInitiateAction']);
Route::get('/go-to-google', [DemoController::class, 'goToGoogle']);
Route::get('/show-file-binary', [DemoController::class, 'showFileBinary']);
Route::get('/download-file', [DemoController::class, 'downloadFile']);
Route::get('/sample-page', [DemoController::class, 'getSamplePage']);
