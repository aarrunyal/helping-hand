<?php


namespace App\Http\Controllers\front;


use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;

class FrontController
{
    protected $package;
    protected $program;
    function __construct(PackageService $package, ProgramService $program)
    {
        $this->package = $package;
        $this->program= $program;
    }

    public function index($index = null)
    {
        $packages = $this->package->findByColumns(["is_active"=>1, "is_featured"=>1], true, 6);
        $programs = $this->package->findByColumns(["is_active"=>1, "is_featured"=>1], true, 6);
        if ($index == "index") return
            view('front.index', compact('packages'));
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
        return view('front.programs');
    }

    public function packages()
    {
        return view('front.packages');
    }

    public function packageDetail()
    {
        return view('front.package');
    }

    public function programDetail()
    {
        return view('front.program-detail');
    }
}
