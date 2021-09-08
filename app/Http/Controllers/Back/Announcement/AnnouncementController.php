<?php

namespace App\Http\Controllers\Back\Announcement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Announcement\AnnouncementRequest;
use App\Services\Announcement\AnnouncementService;

class AnnouncementController extends Controller
{
    protected $announcement;

    public function __construct(AnnouncementService $announcement)
    {
        $this->announcement = $announcement;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = $this->announcement->paginate(25);
        return view('back.announcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {
        $data = $request->all();
        if ($this->announcement->store($data)) {
            toastr()->success('Request Processed successfully');
            return redirect()->route('announcement.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('announcement.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $announcement = $this->announcement->findByColumn('slug', $slug);
        return view('back.announcement.edit',compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, $slug)
    {
        $data = $request->all();
        if ($this->announcement->update($slug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('announcement.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('announcement.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->announcement->delete($slug)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('announcement.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('announcement.index');
    }
}

