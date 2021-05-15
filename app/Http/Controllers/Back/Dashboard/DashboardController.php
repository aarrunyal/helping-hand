<?php


namespace App\Http\Controllers\Back\Dashboard;


use App\Services\Application\ApplicationService;
use App\Services\Destination\DestinationService;
use App\Services\GoogleAnalytics\GoogleAnalyticsService;
use App\Services\Inquiry\InquiryService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;

class DashboardController
{
    protected $analytics;
    protected $application;
    protected $inquiry;
    protected $destination;
    protected $program;
    protected $package;

    public function __construct(
        GoogleAnalyticsService $analyticsService,
        ApplicationService $applicationService,
        InquiryService $inquiryService,
        DestinationService $destinationService,
        ProgramService $programService, PackageService $packageService
    )
    {
        $this->analytics = $analyticsService;
        $this->application = $applicationService;
        $this->inquiry = $inquiryService;
        $this->destination = $destinationService;
        $this->program = $programService;
        $this->package = $packageService;
    }

    function index()
    {
        $applications = $this->application->findByColumns([], true, 5);
        $inquiries = $this->inquiry->findByColumns([], true, 5);
        $totalApplication = $this->application->totalApplications();
        $totalInquiry = $this->inquiry->totalApplications();
        $totalDestination = $this->destination->totalApplications();
        $totalProgram = $this->program->totalApplications();
        $totalPackage = $this->package->totalApplications();
        return view('back.dashboard.index', compact(
            'applications',
            'inquiries',
            'totalApplication',
            'totalDestination',
            'totalProgram',
            'totalInquiry',
            'totalPackage'));
    }

    function getGoogleAnalyticsData()
    {
        $totalUser[7] = $this->analytics->getTotalVisitors(7);
        $totalUser[15] = $this->analytics->getTotalVisitors(15);
        $totalUser[30] = $this->analytics->getTotalVisitors(30);
        $sessionByCountry = $this->analytics->getSessionByCountry(30);
        $activeUser = $this->analytics->getRealTimeUser();
        return response()->json(['active_user' => $activeUser, 'session_by_country' => $sessionByCountry, 'total_user' => $totalUser]);
    }

    function applicationByDestination()
    {
        $response = $this->application->applicationByDestination();
        return response()->json($response);
    }
}
