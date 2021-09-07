<?php

namespace App\Http\Controllers\Back\Course;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Course\CourseRequest;
use App\Services\Course\CourseService;

class CourseController extends Controller
{
    protected $course;

    public function __construct(CourseService $course)
    {
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->course->paginate(25);
        return view('back.course.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $data = $request->all();
        if ($this->course->store($data)) {
            toastr()->success('Request Processed successfully');
            return redirect()->route('course.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('course.create');
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
    public function edit($id)
    {
        $course = $this->course->findByColumn('id', $id);
        return view('back.course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $data = $request->all();
        if ($this->course->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('course.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('course.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->course->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('course.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('course.index');
    }
}

