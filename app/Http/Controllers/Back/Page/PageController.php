<?php

namespace App\Http\Controllers\Back\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Page\PageRequest;
use App\Services\Page\PageService;

class PageController extends Controller
{
    protected $page;

    public function __construct(PageService $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->page->paginate(25);
        return view('back.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.page.create');
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
        if ($this->page->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('page.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('page.create');
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
        $page = $this->page->findByColumn('slug', $slug);
        return view('back.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $slug)
    {
        $data = $request->all();
        if ($this->page->update($slug, $data)){
            toastr()->success('Request processed successfully');
            return redirect()->route('page.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('page.edit', $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->page->delete($slug))
            return redirect()->route('page.index');
        return redirect()->route('page.index');
    }
}
