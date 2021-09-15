<?php

namespace App\Http\Controllers\Back\Document;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Document\DocumentRequest;
use App\Services\Category\CategoryService;
use App\Services\Course\CourseService;
use App\Services\Department\DepartmentService;
use App\Services\Document\DocumentService;

class DocumentController extends Controller
{
    protected $document;
    protected $course;
    protected $department;
    protected $category;

    public function __construct(DocumentService $document, CourseService $course, DepartmentService $department, CategoryService $category)
    {
        $this->document = $document;
        $this->course = $course;
        $this->department = $department;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = $this->document->paginate(25);
        return view('back.document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = $this->course->all();
        $categories = $this->category->getParents();
        $departments = $this->department->findByColumns(['is_active' => 1], true);
        return view('back.document.create', compact('courses', 'categories', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequest $request)
    {
        $data = $request->all();
        if ($this->document->store($data)) {
            toastr()->success('Request Processed successfully');
            return redirect()->route('document.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('document.create');
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
        $document = $this->document->findByColumn('id', $id);
        $courses = $this->course->all();
        $categories = $this->category->getParents();
        $departments = $this->department->findByColumns(['is_active' => 1], true);
        return view('back.document.edit',compact('document','courses', 'categories','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequest $request, $id)
    {
        $data = $request->all();
        if ($this->document->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('document.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('document.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->document->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('document.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('document.index');
    }
}
