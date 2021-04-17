<?php

namespace App\Http\Controllers\Back\Program\Package;

use App\Http\Controllers\Controller;
use App\Services\Program\Package\PackagePricingService;
use Illuminate\Http\Request;

class PackagePricingController extends Controller
{
    protected $pricing;


    public function __construct(
        PackagePricingService $pricing)
    {
        $this->pricing = $pricing;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($packageId)
    {
        $pricings = $this->pricing->paginate(25);
        return view('back.program.pricing.index', compact('pricings'));
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
        return view('back.program.pricing.create', compact('programs', 'destinations'));
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
        if ($this->pricing->storeAndUpdate($packageSlug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('package.edit', $packageSlug);
        }
        toastr()->error('Something went wrong');
        return redirect()->route('package.edit', $packageSlug);
    }

}
