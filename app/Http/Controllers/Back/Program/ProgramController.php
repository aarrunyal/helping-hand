<?php

namespace App\Http\Controllers\Back\Program;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Blog\BlogRequest;
use App\Http\Requests\Program\ProgramRequest;
use App\Services\Blog\BlogService;
use App\Services\Category\CategoryService;
use App\Services\Program\ProgramService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    protected $program;
    protected $category;

    public function __construct(
        ProgramService $program, CategoryService $category)
    {
        $this->program = $program;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = $this->program->paginate(25);
        return view('back.program.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->findByColumns(['is_active' => 1, "is_parent"=>1], true);
        return view('back.program.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        $data = $request->all();
        if ($this->program->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('program.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('program.create');
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
        $program = $this->program->findByColumn('slug', $slug);
        $categories = $this->category->findByColumns(['is_active' => 1, "is_parent"=>1], true);
        return view('back.program.edit', compact('program', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, $slug)
    {
        $data = $request->all();
        if ($this->program->update($slug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('program.index');
        }
        toastr()->error('Something went wrong');
        return view('back.program.edit', compact('program'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->program->delete($slug)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('program.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('program.index');
    }
}
