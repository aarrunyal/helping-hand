<?php

use App\Http\Controllers\Back\Announcement\AnnouncementController;
use App\Http\Controllers\Back\Auth\LoginController;
use App\Http\Controllers\Back\SystemUser\SystemUserController;
use App\Http\Controllers\Back\SiteSetting\SiteSettingController;
use App\Http\Controllers\Back\Clinet\ClientController;
use App\Http\Controllers\Back\Blog\BlogController;
use App\Http\Controllers\Back\Page\PageController;
use \App\Http\Controllers\Back\Category\CategoryController;
use \App\Http\Controllers\Back\Program\ProgramController;
use \App\Http\Controllers\Back\Destination\DestinationController;
use \App\Http\Controllers\Back\Program\Package\PackageController;
use App\Http\Controllers\Back\Program\Package\PackagePricingController;
use App\Http\Controllers\Back\Program\Package\PackageDateController;
use App\Http\Controllers\Back\Program\Package\PackageFaqController;
use App\Http\Controllers\Back\Program\Package\PackageItineraryController;
use App\Http\Controllers\Back\Testimonial\TestimonialController;
use \App\Http\Controllers\Back\Program\Package\PackageIncludeExcludeController;
use App\Http\Controllers\Back\Inquiry\InquiryController;
use App\Http\Controllers\Back\Application\ApplicationController;
use App\Http\Controllers\Back\Course\CourseController;
use App\Http\Controllers\Back\Media\MediaController;
use App\Http\Controllers\Back\Menu\MenuController;
use App\Http\Controllers\Back\Dashboard\DashboardController;
use App\Http\Controllers\Back\Department\DepartmentController;
use App\Http\Controllers\Back\Document\DocumentController;
use App\Http\Controllers\Back\DocumentFile\DocumentFileController;
use App\Http\Controllers\Back\DocumentRequest\DocumentRequestController;

Route::get('user/login', function () {
    if (!auth()->guard('super-user')->check())
        return view('back.auth.login');
    else
        return redirect()->route('user.dashboard');
})->name('user.auth');
Route::get('/', [DashboardController::class, 'index'])->name('user.home')->middleware('super-user');

Route::post('/admin-login', [LoginController::class, "login"])->name('admin.login');

Route::group(['middleware' => "super-user"], function ($route) {
    $route->get('logout', [LoginController::class, "logout"])->name('user.logout');
    $route->get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');

//    category
    $route->resource('category', CategoryController::class);
    $route->get('category/{slug}/destroy', [CategoryController::class, "destroy"])->name('category.destroy');
    $route->post('category/{slug}/update', [CategoryController::class, "update"])->name('category.update');
    $route->get('category/{id}/sub-category', [CategoryController::class, "getSubCategoryByCategory"])->name('subcategory-by-category');
    $route->get('get/category', [CategoryController::class, "getCategory"])->name('getcategory');

//    department
    $route->resource('department', DepartmentController::class);
    $route->post('department/{id}/update', [DepartmentController::class, "update"])->name('department.update');
    $route->get('department/{id}/destroy', [DepartmentController::class, "destroy"])->name('department.destroy');

//    course
    $route->resource('course', CourseController::class);
    $route->post('course/{id}/update', [CourseController::class, "update"])->name('course.update');
    $route->get('course/{id}/destroy', [CourseController::class, "destroy"])->name('course.destroy');

//    document

    $route->resource('document', DocumentController::class);
    $route->post('document/{id}/update', [DocumentController::class, "update"])->name('document.update');
    $route->get('document/{id}/destroy', [DocumentController::class, "destroy"])->name('document.destroy');

//    document file
    $route->resource('document-file', DocumentFileController::class);
    $route->post('document-file/{id}/update', [DocumentFileController::class, "update"])->name('document-file.update');
    $route->get('document-file/{id}/destroy', [DocumentFileController::class, "destroy"])->name('document-file.destroy');
    $route->get('document-file-form', [DocumentFileController::class, "getDocumentFileForm"])->name('document-file-custom-form');
    $route->get('document-file-view/{id}', [DocumentFileController::class, "getDocumentFileView"])->name('document-file-view');

    //    announcement
    $route->resource('announcement', AnnouncementController::class);
    $route->post('announcement/{id}/update', [AnnouncementController::class, "update"])->name('announcement.update');
    $route->get('announcement/{id}/destroy', [AnnouncementController::class, "destroy"])->name('announcement.destroy');

//  document request
    $route->resource('document-request', DocumentRequestController::class);
    $route->post('document-request/{id}/update', [DocumentRequestController::class, "update"])->name('document-request.update');
    $route->get('document-request/{id}/destroy', [DocumentRequestController::class, "destroy"])->name('document-request.destroy');
    $route->get('document-request-form', [DocumentRequestController::class, "getDocumentRequestForm"])->name('document-request-form');

//  User
    $route->resource('system-user', SystemUserController::class);
    $route->post('system-user/{id}/update', [SystemUserController::class, "update"])->name('system-user.update');
    $route->get('system-user/{id}/destroy', [SystemUserController::class, "destroy"])->name('system-user.destroy');

    //    Media
    $route->resource('media', MediaController::class);
    $route->get('media/{id}/destroy', [MediaController::class, "destroy"])->name('media.destroy');
});
