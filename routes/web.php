<?php

use Illuminate\Support\Facades\Route;

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
@include('system-user.php');
Route::get('/', [\App\Http\Controllers\front\FrontController::class,  'index']);
Route::get('/{index?}', [\App\Http\Controllers\front\FrontController::class,  'index']);
Route::get('/blog', [\App\Http\Controllers\front\FrontController::class,  'blog']);
Route::get('/blog/detail', [\App\Http\Controllers\front\FrontController::class,  'blogDetail']);
Route::get('/programs', [\App\Http\Controllers\front\FrontController::class,  'programs']);
Route::get('/packages', [\App\Http\Controllers\front\FrontController::class,  'packages']);
Route::get('/package/details', [\App\Http\Controllers\front\FrontController::class,  'packageDetail']);
Route::get('/program/details', [\App\Http\Controllers\front\FrontController::class,  'programDetail']);
