<?php

namespace App\Providers;

use App\Models\Menu\Menu;
use App\Models\Page\Page;
use App\Services\Page\PageService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class PageProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    function __construct($app)
    {
        parent::__construct($app);
    }

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        if (Schema::hasTable('site_settings')) {
//            $siteKey = getSetting("SETTING_RECAPTCHA_SITE_KEY");
//            $secretKey = getSetting("SETTING_RECAPTCHA_SECRET_KEY");
//            Config::set('recaptcha.api_site_key', $siteKey);
//            Config::set('recaptcha.api_secret_key', $secretKey);
//        }
//        if (Schema::hasTable('menus')) {
//            $menu = new Menu();
//            $headerMenus = $menu->whereNull('parent_id')->wherePlacing('    header')->whereIsActive(1)->orderBy('position')->get();
//            view()->composer('layouts.front.header', function ($view) use ($headerMenus) {
//                $view->with(['menus' => $headerMenus]);
//
//            });
//            $footer_menus_with_children = $menu->whereNull('parent_id')->wherePlacing('footer')->whereIsActive(1)
//                ->whereHas('children', function ($qry){})->orderBy('position')->take(3)->get();
//            view()->composer('layouts.front.footer', function ($view) use ($footer_menus_with_children) {
//                $view->with(['menus' => $footer_menus_with_children]);
//
//            });
//            $footer_menus = $menu->whereNull('parent_id')->wherePlacing('footer')->whereIsActive(1)->orderBy('position')->get();
//            view()->composer('layouts.front.footer', function ($view) use ($footer_menus) {
//                $view->with(['footer_menus' => $footer_menus]);
//
//            });
//        }

//        dd($menus->first()->children->first()->title);
    }
}
