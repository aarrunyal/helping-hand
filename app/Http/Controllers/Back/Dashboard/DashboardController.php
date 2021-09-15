<?php


namespace App\Http\Controllers\Back\Dashboard;

use App\Services\Announcement\AnnouncementService;
use App\Services\Application\ApplicationService;
use App\Services\Course\CourseService;
use App\Services\Department\DepartmentService;
use App\Services\Destination\DestinationService;
use App\Services\Document\DocumentService;
use App\Services\DocumentRequest\DocumentRequestService;
use App\Services\GoogleAnalytics\GoogleAnalyticsService;
use App\Services\Inquiry\InquiryService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;
use App\Services\SystemUser\SystemUserService;

class DashboardController
{
    protected $analytics;
    protected $announcement;
    protected $application;
    protected $course;
    protected $document;
    protected $documentRequest;
    protected $department;
    protected $inquiry;
    protected $destination;
    protected $program;
    protected $package;
    protected $systemUser;

    public function __construct(
        GoogleAnalyticsService $analyticsService,
        ApplicationService $applicationService,
        InquiryService $inquiryService,
        DestinationService $destinationService,
        ProgramService $programService, PackageService $packageService,
        CourseService $courseService,
        DepartmentService $departmentService,
        AnnouncementService $announcementService,
        DocumentService $documentService,
        SystemUserService $systemUserService,
        DocumentRequestService $documentRequestService
    )
    {
        $this->analytics = $analyticsService;
        $this->announcement = $announcementService;
        $this->application = $applicationService;
        $this->course = $courseService;
        $this->department = $departmentService;
        $this->document = $documentService;
        $this->inquiry = $inquiryService;
        $this->destination = $destinationService;
        $this->program = $programService;
        $this->package = $packageService;
        $this->systemUser = $systemUserService;
        $this->documentRequest = $documentRequestService;
    }

    function index()
    {
        $announcements = $this->announcement->findByColumns(['is_active' => 1], true);
        $applications = $this->application->findByColumns([], true, 5);
        $courses = $this->course->findByColumns(['is_active' => 1], true);
        $departments = $this->department->findByColumns(['is_active' => 1], true);
        $documents = $this->document->findByColumns(['is_active' => 1], true);
        $documentRequests = $this->documentRequest->getDocumentRequest();
        $latestAnnouncements = $this->announcement->getAnnouncement();
        $totalAnnouncements = $this->announcement->findByColumns([], true);
        $inquiries = $this->inquiry->findByColumns([], true, 5);
        $staffs = $this->systemUser->getStaff();
        $students = $this->systemUser->getStudent();
        $teachers = $this->systemUser->getTeacher();
        $totalApplication = $this->application->totalApplications();
        $totalInquiry = $this->inquiry->totalApplications();
        $totalDestination = $this->destination->totalApplications();
        $totalProgram = $this->program->totalApplications();
        $totalPackage = $this->package->totalApplications();
        $totalUsers = $this->systemUser->findByColumns([],true);
        return view('back.dashboard.index', compact(
            'announcements',
            'applications',
            'courses',
            'documents',
            'documentRequests',
            'departments',
            'inquiries',
            'latestAnnouncements',
            'staffs',
            'students',
            'teachers',
            'totalApplication',
            'totalAnnouncements',
            'totalDestination',
            'totalProgram',
            'totalInquiry',
            'totalPackage',
            'totalUsers'
        ));
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
