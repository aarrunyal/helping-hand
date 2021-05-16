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
        $siteKey = getSetting("SETTING_RECAPTCHA_SITE_KEY");
        $secretKey = getSetting("SETTING_RECAPTCHA_SECRET_KEY");
        Config::set('recaptcha.api_site_key', $siteKey);
        Config::set('recaptcha.api_secret_key', $secretKey);
        $page = new Page();
        $footerPages = $page->whereIsActive(1)->wherePlacing('footer')->orderBy('position', "ASC")->get();
        if (Schema::hasTable('menus')) {
            $menu = new Menu();
            $menus = $menu->whereNull('parent_id')->whereIsActive(1)->orderBy('position')->get();
            view()->composer('layouts.front.header', function ($view) use ($menus) {
                $view->with(['menus' => $menus]);

            });
        }
        view()->composer('layouts.front.footer', function ($view) use ($footerPages) {
            $view->with(['pages' => $footerPages]);

        });
//        dd($menus->first()->children->first()->title);
    }
}
