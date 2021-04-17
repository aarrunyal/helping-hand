<?php

namespace App\Http\Controllers\Back\Program\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destination\DestinationRequest;
use App\Models\Program\Package\PackagePricing;
use App\Services\Destination\DestinationService;
use App\Services\Program\Package\PackageDateService;
use App\Services\Program\Package\PackagePricingService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;
use Illuminate\Http\Request;

class PackageDateController extends Controller
{
    protected $date;


    public function __construct(
        PackageDateService $date)
    {
        $this->date = $date;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($packageId)
    {
        $dates = $this->date->paginate(25);
        return view('back.program.date.index', compact('dates'));
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
        return view('back.program.date.create', compact('programs', 'destinations'));
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
        if ($this->date->storeAndUpdate($packageSlug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('package.edit', $packageSlug);
        }
        toastr()->error('Something went wrong');
        return redirect()->route('package.edit', $packageSlug);
    }

}
