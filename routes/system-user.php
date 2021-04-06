<?php

use App\Http\Controllers\Back\Auth\LoginController;
use App\Http\Controllers\Back\SystemUser\SystemUserController;
use App\Http\Controllers\Back\SiteSetting\SiteSettingController;
use App\Http\Controllers\Back\Clinet\ClientController;
use App\Http\Controllers\Back\Blog\BlogController;
use App\Http\Controllers\Back\Page\PageController;

Route::get('admin/login', function () {
    if (!auth()->guard('super-admin')->check())
        return view('back.auth.login');
    else
        return redirect()->route('admin.dashboard');
});

Route::post('/admin-login', [LoginController::class, "login"])->name('admin.login');

Route::group(['middleware' => "super-admin", "prefix" => "admin"], function ($route) {
    $route->get('logout', [LoginController::class, "logout"])->name('admin.logout');
    $route->get('dashboard', function () {
        return view('back.dashboard.index');
    })->name('admin.dashboard');

//    $route->resource('blog-category', BlogCategoryController::class);
////    $route->get('category', [CategoryController::class, "destroy"])->name('category.destroy');;
//    $route->post('blog-category/{slug}', [BlogCategoryController::class, "update"])->name('blog-category-update');;

    $route->resource('blog', BlogController::class);
    $route->get('blog/{slug}/destroy', [BlogController::class, "destroy"])->name('blog.destroy');
    $route->post('blog/{slug}/update', [BlogController::class, "update"])->name('blog.update');


    $route->resource('system-user', SystemUserController::class);
    $route->get('system-user/{slug}/destroy', [SystemUserController::class, "destroy"])->name('system-user.destroy');
    $route->post('system-user/{slug}/update', [SystemUserController::class, "update"])->name('system-user.update');

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
});



