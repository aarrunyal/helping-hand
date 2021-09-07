<?php

namespace App\Http\Controllers\Back\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Department\DepartmentRequest;
use App\Services\Department\DepartmentService;

class DepartmentController extends Controller
{
    protected $department;

    public function __construct(DepartmentService $department)
    {
        $this->department = $department;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->department->paginate(25);
        return view('back.department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->all();
        if ($this->department->store($data)) {
            toastr()->success('Request Processed successfully');
            return redirect()->route('department.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('department.create');
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
        $department = $this->department->findByColumn('id', $id);
        return view('back.department.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {
        $data = $request->all();
        if ($this->department->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('department.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('department.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->department->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('department.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('department.index');
    }
}
