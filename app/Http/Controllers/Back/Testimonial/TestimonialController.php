<?php

namespace App\Http\Controllers\Back\Testimonial;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Page\PageRequest;
use App\Http\Requests\Testimonial\TestimonialRequest;
use App\Services\Destination\DestinationService;
use App\Services\Page\PageService;
use App\Services\Testimonial\TestimonialService;

class TestimonialController extends Controller
{
    protected $testimonial;
    protected $destination;

    public function __construct(
        TestimonialService $testimonial,
        DestinationService $destinationService)
    {
        $this->testimonial = $testimonial;
        $this->destination = $destinationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = $this->testimonial->paginate(25);
        return view('back.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destinations = $this->destination->findByColumns(["is_active" => 1], true);
        return view('back.testimonial.create', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialRequest $request)
    {
        $data = $request->all();
        if ($this->testimonial->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('testimonial.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('testimonial.create');
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
    public function edit($id)
    {
        $testimonial = $this->testimonial->findByColumn('id', $id);
        $destinations = $this->destination->findByColumns(["is_active" => 1], true);
        return view('back.testimonial.edit', compact('testimonial', 'destinations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialRequest $request, $id)
    {
        $data = $request->all();
        if ($this->testimonial->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('testimonial.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('testimonial.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->testimonial->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('testimonial.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('testimonial.index');
    }
}
