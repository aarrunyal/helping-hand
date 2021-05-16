<?php

namespace App\Console\Commands\SiteMap;

use Illuminate\Console\Command;
use Spatie\Sitemap\Tags\Url;

class SitemapGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        \Spatie\Sitemap\SitemapGenerator::create(env('APP_URL'))
            ->hasCrawled(function (Url $url) {
                if ($url->segment(1) == null) {
                    $url->setPriority(1.0);
                } else {
                    $url->setPriority(0.8);
                }

                return $url;
            })
            ->writeToFile(public_path().'/'.'sitemap.xml');;
    }
}
