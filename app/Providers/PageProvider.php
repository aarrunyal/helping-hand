<?php

namespace App\Providers;

use App\Models\Page\Page;
use App\Services\Page\PageService;
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
        $page = new Page();
        $footerPages = $page->whereIsActive(1)->wherePlacing('footer')->orderBy('position', "ASC")->get();
        view()->composer('layouts.front.footer', function ($view) use ($footerPages) {
            $view->with(['pages' => $footerPages]);

        });
    }
}
