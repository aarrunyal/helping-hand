<?php


namespace App\Http\Controllers\front;


use App\Http\Requests\Front\Application\ApplicationRequest;
use App\Http\Requests\Front\Inquiry\InquiryRequest;
use App\Services\Application\ApplicationService;
use App\Services\Blog\BlogService;
use App\Services\Destination\DestinationService;
use App\Services\Inquiry\InquiryService;
use App\Services\Page\PageService;
use App\Services\Program\Package\PackageDateService;
use App\Services\Program\Package\PackagePricingService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;
use App\Services\Testimonial\TestimonialService;
use Artesaos\SEOTools\Facades\SEOTools;
use PhpParser\Node\Stmt\If_;

class FrontController
{
    protected $package;
    protected $program;
    protected $destination;
    protected $page;
    protected $testimonial;
    protected $blog;
    protected $date;
    protected $pricing;
    protected $application;
    protected $inquiry;

    function __construct(
        PackageService $package,
        ProgramService $program,
        DestinationService $destinationService,
        PageService $pageService,
        TestimonialService $testimonial,
        BlogService $blog,
        PackageDateService $dateService,
        PackagePricingService $pricingService,
        ApplicationService $application,
        InquiryService $inquiry)
    {
        $this->package = $package;
        $this->program = $program;
        $this->destination = $destinationService;
        $this->page = $pageService;
        $this->testimonial = $testimonial;
        $this->blog = $blog;
        $this->date = $dateService;
        $this->pricing = $pricingService;
        $this->application = $application;
        $this->inquiry = $inquiry;
    }

    public function index()
    {
        $packages = $this->package->findByColumns(["is_active" => 1, "is_featured" => 1], true, 6);
        $programs = $this->program->findByColumns(["is_active" => 1, "is_featured" => 1], true, 6);
        $destinations = $this->destination->findByColumns(['is_active' => 1], true);
        $popularProject = $this->package->findByColumns(['is_active' => 1], true);
        $testimonials = $this->testimonial->findByColumns(['is_active' => 1], true, 9);
        $this->setSeo();
        return
            view('front.index', compact(
                'packages',
                'programs',
                'destinations',
                'popularProject',
                'testimonials'));
        return view('front.coming-soon');

    }

    public function blog()
    {
        $featuredBlog = $this->blog->findByColumns(["is_active" => 1, "is_featured" => 1], true);
        $otherBlog = $this->blog->findByColumns(["is_active" => 1, "is_featured" => 0], true);
        $this->setSeo(null, null, 'blog', null);
        return view('front.blog', compact('featuredBlog', 'otherBlog'));
    }

    public function blogDetail($slug)
    {
        $blog = $this->blog->findByColumn('slug', $slug);
        if (empty($blog))
            return redirect()->route('blog-main');
        $this->setSeo($blog->seo_title, $blog->seo_description, 'package', $blog->image_path);
        return view('front.blog-detail', compact('blog'));
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
        $package = $this->package->findByColumns(['slug' => $slug]);
        $otherPackages = $this->package->getOtherPackages(['program_id' => $package->program_id, 'destination_id' => $package->destination_id], $package->id);
        $this->setSeo($package->seo_title, $package->seo_description, 'package', $package->image_path);
        return view('front.package', compact('package', 'otherPackages'));
    }

    public function programDetail($slug)
    {
        $imageUrl = null;
        $program = $this->program->findByColumn('slug', $slug);
        if (sizeof($program->image_path) > 0 && isset($program->image_path['real']))
            $imageUrl = $program->image_path['real'];
        else
            $imageUrl = asset('resources/front/image/cover.jpg');
        $otherPrograms = $this->program->getOtherProgram($program);
        $packages = null;
        if (!empty($program->destination_ids))
            $packages = $this->package->getPackageBy($program->destination_ids);
        $this->setSeo($program->seo_title, $program->seo_description, 'program', $program->image_path);
        return view('front.program-detail', compact('imageUrl','program', 'otherPrograms', 'packages'));
    }

    public function inquiry()
    {
        $destinations = $this->destination->findByColumns(["is_active" => 1], true);
        return view('front.inquiry', compact('destinations'));
    }

    public function applyNow()
    {
        $destinations = $this->destination->findByColumns(["is_active" => 1], true);
        return view('front.apply-now', compact('destinations'));
    }

    public function page($pageName)
    {
        if ($pageName == 'hhf')
            return redirect()->route('admin.auth');
        $page = $this->page->findByColumn('slug', $pageName);
        $this->setSeo($page->seo_title, $page->seo_description, 'program', $page->image_path);
        return view('front.page', compact('page'));
    }

    public function programByDestination($destinationId)
    {
        $programs = $this->program->findAllByDestinationId($destinationId);
        return response()->json($programs);
    }

    public function packageByProgram($programId)
    {
        $programs = $this->package->findByWhereIn('program_id', [$programId], [], true);
        return response()->json($programs);
    }

    public function getPackageDates($packageId)
    {
        $programs = $this->date->findByColumns(['is_active' => 1, 'package_id' => $packageId], true);
        return response()->json($programs);
    }

    public function getPackagePricing($packageId)
    {
        $programs = $this->pricing->findByColumns(['is_active' => 1, 'package_id' => $packageId], true);
        return response()->json($programs);
    }

    public function submitApplication(ApplicationRequest $request)
    {
        $response = $this->application->store($request->all());
        if ($response) {
            return redirect()->route('apply-now')->with(["msg" => "success"]);
        }
        return redirect()->route('apply-now')->with(["msg" => "error"]);
    }

    public function submitInquiry(InquiryRequest $request)
    {
        $response = $this->inquiry->store($request->all());
        if ($response) {
            return redirect()->route('inquiry')->with(["msg" => "success"]);
        }
        return redirect()->route('inquiry')->with(["msg" => "error"]);
    }

    public function setSeo($title = null, $description = null, $type = "program", $image = null)
    {
        $title = !empty($title) ? $title : getSetting("SETTING_SEO_TITLE");
        $description = !empty($description) ? $description : getSetting("SETTING_SEO_DESCRIPTION");
        $imagePath = $image;
        if (empty($imagePath) || sizeof($image) <= 0) {
            $imagePath = getSetting("SETTING_SOCIAL_SHARE_IMAGE", "image_path");
            $imagePath = !empty($imagePath) && sizeof($imagePath) > 0 ? $imagePath['real'] : null;
        }
        $url = request()->url();
        SEOTools::setTitle($title);
        SEOTools::setDescription($description);
        SEOTools::opengraph()->setUrl($url);
        SEOTools::opengraph()->addProperty('type', $type);
        SEOTools::twitter()->setSite($url);
        if (!empty($imagePath))
            SEOTools::jsonLd()->addImage($imagePath);
    }

    public function error500()
    {
        return view('front.errors.500');
    }

    public function error404()
    {
        return view('front.errors.404');
    }
}
