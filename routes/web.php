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
    // Route::get('/', [\App\Http\Controllers\front\FrontController::class, 'index']);
//Route::get('/{index?}', [\App\Http\Controllers\front\FrontController::class,  'index']);
//     Route::get('/blog', [\App\Http\Controllers\front\FrontController::class, 'blog'])->name('blog-main');
//     Route::get('/blog/{slug}', [\App\Http\Controllers\front\FrontController::class, 'blogDetail'])->name('blog-detail');
//     Route::get('/programs', [\App\Http\Controllers\front\FrontController::class, 'programs'])->name('programs');
//     Route::get('/program/{slug}/packages', [\App\Http\Controllers\front\FrontController::class, 'packages'])->name('program-package');
//     Route::get('/packages', [\App\Http\Controllers\front\FrontController::class, 'packages'])->name('packages');
//     Route::get('/package/{slug}', [\App\Http\Controllers\front\FrontController::class, 'packageDetail'])->name('package-details');
//     Route::get('/program/{slug}', [\App\Http\Controllers\front\FrontController::class, 'programDetail'])->name('program-details');;
//     Route::get('/inquiry', [\App\Http\Controllers\front\FrontController::class, 'inquiry'])->name('inquiry');;
//     Route::get('/apply-now', [\App\Http\Controllers\front\FrontController::class, 'applyNow'])->name('apply-now');;
//     Route::get('/{pageName}', [\App\Http\Controllers\front\FrontController::class, 'page'])->name('page');;
//     Route::get('/destination/{id}/program', [\App\Http\Controllers\front\FrontController::class, 'programByDestination'])->name('programs-by-destination');;
//     Route::get('/program/{id}/package', [\App\Http\Controllers\front\FrontController::class, 'packageByProgram'])->name('packages-by-program');;
//     Route::get('/package/{id}/dates', [\App\Http\Controllers\front\FrontController::class, 'getPackageDates'])->name('dates-by-package');;
//     Route::get('/package/{id}/pricing', [\App\Http\Controllers\front\FrontController::class, 'getPackagePricing'])->name('prices-by-package');;
//     Route::post('/user/application', [\App\Http\Controllers\front\FrontController::class, 'submitApplication'])->name('application');;
//     Route::post('/user/inquiry', [\App\Http\Controllers\front\FrontController::class, 'submitInquiry'])->name('submit-inquiry');;
//     Route::get('error/500', [\App\Http\Controllers\front\FrontController::class, 'error500'])->name('error-500');;
// Route::get('error/404', [\App\Http\Controllers\front\FrontController::class, 'error404'])->name('error-404');;
//}
//else {
//    Route::get('/', function () {
//        return view('front.coming-soon');
//    });
//}
