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
//if (env("APP_ENV") == "local") {
    Route::get('/', [\App\Http\Controllers\front\FrontController::class, 'index']);
//Route::get('/{index?}', [\App\Http\Controllers\front\FrontController::class,  'index']);
    Route::get('/blog', [\App\Http\Controllers\front\FrontController::class, 'blog']);
    Route::get('/blog/detail', [\App\Http\Controllers\front\FrontController::class, 'blogDetail']);
    Route::get('/programs', [\App\Http\Controllers\front\FrontController::class, 'programs'])->name('programs');
    Route::get('/program/{slug}/packages', [\App\Http\Controllers\front\FrontController::class, 'packages'])->name('program-package');
    Route::get('/packages', [\App\Http\Controllers\front\FrontController::class, 'packages']);
    Route::get('/package/{slug}', [\App\Http\Controllers\front\FrontController::class, 'packageDetail'])->name('package-details');
    Route::get('/program/{slug}', [\App\Http\Controllers\front\FrontController::class, 'programDetail'])->name('program-details');;
    Route::get('/inquiry', [\App\Http\Controllers\front\FrontController::class, 'inquiry'])->name('inquiry');;
    Route::get('/apply-now', [\App\Http\Controllers\front\FrontController::class, 'applyNow'])->name('apply-now');;
//}
//else {
//    Route::get('/', function () {
//        return view('front.coming-soon');
//    });
}
