<?php

namespace App\Http\Controllers\Back\Program\Package;

use App\Http\Controllers\Controller;
use App\Services\Program\Package\PackageItineraryService;
use Illuminate\Http\Request;

class PackageItineraryController extends Controller
{
    protected $itinerary;


    public function __construct(
        PackageItineraryService $itinerary)
    {
        $this->itinerary = $itinerary;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($packageId)
    {
        $itinerarys = $this->itinerary->paginate(25);
        return view('back.program.itinerary.index', compact('itinerarys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($packageId)
    {
        $programs = $this->program->findByColumns(["is_active" => 1], true);
        $destinations = $this->destination->findByColumns(["is_active" => 1], true);
        return view('back.program.itinerary.create', compact('programs', 'destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeAndUpdate(Request $request, $packageSlug)
    {
        $data = $request->all();
        if ($this->itinerary->storeAndUpdate($packageSlug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('package.edit', $packageSlug);
        }
        toastr()->error('Something went wrong');
        return redirect()->route('package.edit', $packageSlug);
    }

}
