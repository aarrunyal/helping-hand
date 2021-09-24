<?php


namespace App\Http\Controllers\Back\Dashboard;

use App\Services\Announcement\AnnouncementService;
use App\Services\Course\CourseService;
use App\Services\Department\DepartmentService;
use App\Services\Document\DocumentService;
use App\Services\DocumentRequest\DocumentRequestService;
use App\Services\GoogleAnalytics\GoogleAnalyticsService;
use App\Services\SystemUser\SystemUserService;

class DashboardController
{
    protected $announcement;
    protected $course;
    protected $document;
    protected $documentRequest;
    protected $department;
    protected $systemUser;

    public function __construct(
        CourseService $courseService,
        DepartmentService $departmentService,
        AnnouncementService $announcementService,
        DocumentService $documentService,
        SystemUserService $systemUserService,
        DocumentRequestService $documentRequestService
    )
    {
        $this->announcement = $announcementService;
        $this->course = $courseService;
        $this->department = $departmentService;
        $this->document = $documentService;
        $this->systemUser = $systemUserService;
        $this->documentRequest = $documentRequestService;
    }

    function index()
    {
        $announcements = $this->announcement->findByColumns(['is_active' => 1], true);
        $courses = $this->course->findByColumns(['is_active' => 1], true);
        $departments = $this->department->findByColumns(['is_active' => 1], true);
        $documents = $this->document->findByColumns(['is_active' => 1], true);
        $documentRequests = $this->documentRequest->getDocumentRequest();
        $latestAnnouncements = $this->announcement->getAnnouncement();
        $totalAnnouncements = $this->announcement->findByColumns([], true);
        $students = $this->systemUser->getStudent();
        $teachers = $this->systemUser->getTeacher();
        $totalUsers = $this->systemUser->findByColumns([],true);
        return view('back.dashboard.index', compact(
            'announcements',
            'courses',
            'documents',
            'documentRequests',
            'departments',
            'latestAnnouncements',
            'students',
            'teachers',
            'totalAnnouncements',
            'totalUsers'
        ));
    }
}
