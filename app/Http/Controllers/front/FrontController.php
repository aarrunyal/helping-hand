<?php


namespace App\Http\Controllers\front;


use App\Services\Destination\DestinationService;
use App\Services\Page\PageService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;
use App\Services\Testimonial\TestimonialService;

class FrontController
{
    protected $package;
    protected $program;
    protected $destination;
    protected $page;
    protected $testimonial;

    function __construct(
        PackageService $package,
        ProgramService $program,
        DestinationService $destinationService,
        PageService $pageService,
        TestimonialService $testimonial)
    {
        $this->package = $package;
        $this->program = $program;
        $this->destination = $destinationService;
        $this->page = $pageService;
        $this->testimonial = $testimonial;
    }

    public function index()
    {
        $packages = $this->package->findByColumns(["is_active" => 1, "is_featured" => 1], true, 6);
        $programs = $this->program->findByColumns(["is_active" => 1, "is_featured" => 1], true, 6);
        $destinations = $this->destination->findByColumns(['is_active' => 1], true);
        $popularProject = $this->package->findByColumns(['is_active' => 1], true);
        $footerPages = $this->page->findByColumns(['is_active' => 1, "placing" => 'footer'], true);
        $testimonials = $this->testimonial->findByColumns(['is_active' => 1], true, 9);
        return
            view('front.index', compact(
                'packages',
                'programs',
                'destinations',
                'popularProject',
                'footerPages',
                'testimonials'));
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

    public function packages($slug = null)
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
    {
        $program = $this->program->findByColumn('slug', $slug);
        $otherPrograms = $this->program->getOtherProgram($program);
        $packages = null;
        if (!empty($program->destination_ids))
            $packages = $this->package->getPackageBy($program->destination_ids);

        return view('front.program-detail', compact('program', 'otherPrograms', 'packages'));
    }

    public function inquiry()
    {
        return view('front.inquiry');
    }

    public function applyNow()
    {
        return view('front.apply-now');
    }

    public function page($pageName)
    {
        $page = $this->page->findByColumn('slug', $pageName);
        return view('front.page', compact('page'));
    }
}
