<?php

namespace App\Console\Commands;

use App\Models\Program\Package\Package;
use App\Models\Program\Program;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MigrateProgramToPackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:program';

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('packages')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $programs = Program::all();
        foreach ($programs as $program) {
            $data = [
                "title" => $program->title,
                "destination_id" => $program->destination_ids,
                "program_id" => $program->id,
                "slug" => $program->slug,
                "image" => $program->image,
                "short_description" => $program->short_description,
                "description" => $program->description,
                "is_active" => $program->is_active,
                "is_featured" => $program->is_featured,
            ];
            Package::create($data);
        }
    }
}
