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
Route::group(['middleware' => "super-user", "prefix" => "admin"], function ($route) {
    $route->get('logout', [LoginController::class, "logout"])->name('user.logout');
    $route->get('dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    $route->get('google/analytics', [DashboardController::class, 'getGoogleAnalyticsData'])->name('dashboard.analytics');
    $route->get('application-by-destination', [DashboardController::class, 'applicationByDestination'])->name('dashboard.application-by-destination');
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

//    $route->resource('blog-category', BlogCategoryController::class);
//    $route->resource('blog-category', BlogCategoryController::class);
//    $route->post('blog-category/{slug}', [BlogCategoryController::class, "update"])->name('blog-category-update');;

    $route->resource('blog', BlogController::class);
    $route->get('blog/{slug}/destroy', [BlogController::class, "destroy"])->name('blog.destroy');
    $route->post('blog/{slug}/update', [BlogController::class, "update"])->name('blog.update');


    $route->resource('system-user', SystemUserController::class);
    $route->post('system-user/{id}/update', [SystemUserController::class, "update"])->name('system-user.update');
    $route->get('system-user/{id}/destroy', [SystemUserController::class, "destroy"])->name('system-user.destroy');

    $route->resource('site-setting', SiteSettingController::class);
    $route->get('site-setting/{slug}/destroy', [SiteSettingController::class, "destroy"])->name('site-setting.destroy');
    $route->post('site-setting/{slug}/update', [SiteSettingController::class, "update"])->name('site-setting-update');

//    client
    $route->resource('client', ClientController::class);
    $route->get('client/{slug}/destroy', [ClientController::class, "destroy"])->name('client.destroy');
    $route->post('client/{slug}/update', [ClientController::class, "update"])->name('client-update');

//    Page
    $route->resource('page', PageController::class);
    $route->get('page/{slug}/destroy', [PageController::class, "destroy"])->name('page.destroy');
    $route->post('page/{slug}/update', [PageController::class, "update"])->name('page.update');

    //    Program
    $route->resource('program', ProgramController::class);
    $route->get('program/{slug}/destroy', [ProgramController::class, "destroy"])->name('program.destroy');
    $route->post('program/{slug}/update', [ProgramController::class, "update"])->name('program.update');

    //    Destination
    $route->resource('destination', DestinationController::class);
    $route->get('destination/{slug}/destroy', [DestinationController::class, "destroy"])->name('destination.destroy');
    $route->post('destination/{slug}/update', [DestinationController::class, "update"])->name('destination-update');

    //    Package
    $route->resource('package', PackageController::class);
    $route->get('package/{slug}/destroy', [PackageController::class, "destroy"])->name('package.destroy');
    $route->post('package/{slug}/update', [PackageController::class, "update"])->name('package-update');
    $route->get('packages', [PackageController::class, "index"])->name('program.package-list');
    $route->get('pricing-form', [PackageController::class, "getPricingForm"])->name('package-pricing-custom-form');
    $route->get('date-form', [PackageController::class, "getDateForm"])->name('package-date-custom-form');
    $route->get('date-form', [PackageController::class, "getDateForm"])->name('package-date-custom-form');
    $route->get('faq-form', [PackageController::class, "getFaqForm"])->name('package-faq-custom-form');
    $route->get('itinerary-form', [PackageController::class, "getItineraryForm"])->name('package-itinerary-custom-form');
    $route->get('include-exclude-form', [PackageController::class, "getIncludeExcludeForm"])->name('package-include-exclude-custom-form');


    //    Pricing
    $route->post('package/{slug}/pricing/store-update', [PackagePricingController::class, "storeAndUpdate"])->name('package.pricing-store-and-update');

    //    Pricing
    $route->post('package/{slug}/date/store-update', [PackageDateController::class, "storeAndUpdate"])->name('package.date-store-and-update');

    //    Faq
    $route->post('package/{slug}/faq/store-update', [PackageFaqController::class, "storeAndUpdate"])->name('package.faq-store-and-update');

    //    Faq
    $route->post('package/{slug}/itinerary/store-update', [PackageItineraryController::class, "storeAndUpdate"])->name('package.itinerary-store-and-update');

    $route->post('package/{slug}/include-exclude/store-update', [PackageIncludeExcludeController::class, "storeAndUpdate"])->name('package.include-exclude-store-and-update');

    //    Testimonial
    $route->resource('testimonial', TestimonialController::class);
    $route->get('testimonial/{slug}/destroy', [TestimonialController::class, "destroy"])->name('testimonial.destroy');
    $route->post('testimonial/{slug}/update', [TestimonialController::class, "update"])->name('testimonial-update');

//Inquiry
    $route->get('inquiry', [InquiryController::class, "index"])->name('inquiry.index');
    $route->get('inquiry/{id}', [InquiryController::class, "getDetail"])->name('inquiry.detail');
    $route->post('inquiry/{id}', [InquiryController::class, "update"])->name('inquiry.update');

    //Application
    $route->get('application', [ApplicationController::class, "index"])->name('application.index');
    $route->get('application/{id}', [ApplicationController::class, "getDetail"])->name('application.detail');
    $route->post('application/{id}', [ApplicationController::class, "update"])->name('application.update');

    //    Media
    $route->resource('media', MediaController::class);
    $route->get('media/{id}/destroy', [MediaController::class, "destroy"])->name('media.destroy');

    //    Media
    $route->resource('menu', MenuController::class);
    $route->get('menu/{id}/destroy', [MenuController::class, "destroy"])->name('menu.destroy');
    $route->post('menu/{id}', [MenuController::class, "update"])->name('menu-update');
    $route->get('menu/custom-form/{type}', [MenuController::class, "getCustomForm"])->name('menu.custom-form');
    $route->get('menu/child-form/{type}', [MenuController::class, "getChildForm"])->name('menu.child-form');

});
