<?php

namespace App\Console\Commands\SiteSetting;

use Illuminate\Console\Command;

class SiteSetting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site-setting:create';

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
        $settings = config('site-setting');
        foreach ($settings as $setting) {
            $s = \App\Models\Models\SiteSetting\SiteSetting::whereTitle($setting)->first();
            if (empty($s)){
                $setting['is_active'] = 1;
                \App\Models\Models\SiteSetting\SiteSetting::create($setting);
            }
        }
    }
}
