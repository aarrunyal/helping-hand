<?php

namespace App\Http\Controllers\Back\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Page\PageRequest;
use App\Services\Application\ApplicationService;
use App\Services\Inquiry\InquiryService;
use App\Services\Page\PageService;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $application;

    public function __construct(ApplicationService $application)
    {
        $this->application = $application;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = $this->application->paginate(25);
        return view('back.application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentPages = $this->application->getParents();
        return view('back.application.create', compact('parentPages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $data = $request->all();
        if ($this->application->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('application.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('application.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $application = $this->application->findByColumn('slug', $slug);
        $parentPages = $this->application->getParents();
        return view('back.application.edit', compact('application', 'parentPages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($this->application->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('application.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('application.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->application->delete($id))
            return redirect()->route('application.index');
        return redirect()->route('application.index');
    }

    public function getDetail($id)
    {
        $application = $this->application->findByColumn('id', $id);
        return view('back.application.detail', compact('application'));
    }
}
