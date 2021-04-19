<?php


namespace App\Http\Controllers\front;


use App\Services\Destination\DestinationService;
use App\Services\Page\PageService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;

class FrontController
{
    protected $package;
    protected $program;
    protected $destination;
    protected $page;

    function __construct(
        PackageService $package,
        ProgramService $program,
        DestinationService $destinationService,
        PageService $pageService)
    {
        $this->package = $package;
        $this->program = $program;
        $this->destination = $destinationService;
        $this->page = $pageService;
    }

    public function index()
    {
        $packages = $this->package->findByColumns(["is_active" => 1, "is_featured" => 1], true, 6);
        $programs = $this->program->findByColumns(["is_active" => 1, "is_featured" => 1], true, 6);
        $destinations = $this->destination->findByColumns(['is_active' => 1], true);
        $popularProject = $this->package->findByColumns(['is_active' => 1], true);
        $footerPages = $this->page->findByColumns(['is_active' => 1, "placing" => 'footer'], true);
        return
            view('front.index', compact(
                'packages',
                'programs', 'destinations', 'popularProject', 'footerPages'));
        return view('front.coming-soon');

    }

    public function blog()
    {
        return view('front.blog');
    }

    public function blogDetail()
    {
        return view('front.blog-detail');
    }

    public function programs()
    {
        $filter = ["is_active" => 1];
        $programs = $this->program->findByColumns($filter, true);
        return view('front.programs', compact('programs'));
    }

    public function packages($slug=null)
    {
        $filter = ["is_active" => 1];
        $program = $this->program->findByColumn('slug', $slug);
        if (!empty($slug) && !empty($program))
            $filter['program_id'] = $program->id;
        $packages = $this->package->findByColumns($filter, true);
        return view('front.packages', compact('packages'));
    }

    public function packageDetail($slug)
    {
        return view('front.package');
    }

    public function programDetail($slug)
    { $program = $this->program->findByColumn('slug', $slug);
        return view('front.program-detail', compact('program'));
    }
}
