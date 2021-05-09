<?php

namespace App\Http\Controllers\Back\Inquiry;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Page\PageRequest;
use App\Services\Inquiry\InquiryService;
use App\Services\Page\PageService;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    protected $inquiry;

    public function __construct(InquiryService $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiries = $this->inquiry->paginate(25);
        return view('back.inquiry.index', compact('inquiries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parentPages = $this->inquiry->getParents();
        return view('back.inquiry.create', compact('parentPages'));
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
        if ($this->inquiry->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('inquiry.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('inquiry.create');
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
        $inquiry = $this->inquiry->findByColumn('slug', $slug);
        $parentPages = $this->inquiry->getParents();
        return view('back.inquiry.edit', compact('inquiry', 'parentPages'));
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
        if ($this->inquiry->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('inquiry.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('inquiry.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->inquiry->delete($slug))
            return redirect()->route('inquiry.index');
        return redirect()->route('inquiry.index');
    }

    public function getDetail($id)
    {
        $inquiry = $this->inquiry->findByColumn('id', $id);
        return view('back.inquiry.detail', compact('inquiry'));
    }
}
