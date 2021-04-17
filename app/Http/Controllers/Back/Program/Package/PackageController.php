<?php

namespace App\Http\Controllers\Back\Program\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\Destination\DestinationRequest;
use App\Services\Destination\DestinationService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    protected $package;
    protected $program;
    protected $destination;

    public function __construct(
        PackageService $package,
        ProgramService $program,
        DestinationService $destinationService)
    {
        $this->package = $package;
        $this->program = $program;
        $this->destination = $destinationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = $this->package->paginate(25);
        return view('back.program.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = $this->program->findByColumns(["is_active" => 1], true);
        $destinations = $this->destination->findByColumns(["is_active" => 1], true);
        return view('back.program.package.create', compact('programs', 'destinations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($this->package->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('package.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('package.create');
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
        $programs = $this->program->findByColumns(["is_active" => 1], true);
        $destinations = $this->destination->findByColumns(["is_active" => 1], true);
        $package = $this->package->findByColumn('slug', $slug);
        $pricings = $package->pricings;
        return view('back.program.package.edit', compact('programs', 'destinations', 'package', 'pricings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DestinationRequest $request, $slug)
    {
        $data = $request->all();
        if ($this->package->update($slug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('package.index', $slug);
        }
        toastr()->error('Something went wrong');
        return redirect()->route('package.index', $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->package->delete($slug)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('program.package.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('program.package.index');

    }

    public function getPricingForm()
    {$pricings = null;
        return view('back.program.package.forms.custom-form.pricing-form',compact('pricings'));
    }
}
