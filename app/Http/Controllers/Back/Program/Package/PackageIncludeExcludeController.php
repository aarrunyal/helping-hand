<?php

namespace App\Http\Controllers\Back\Program\Package;

use App\Http\Controllers\Controller;
use App\Services\Program\Package\PackageFaqService;
use App\Services\Program\Package\PackageIncludeExcludeService;
use Illuminate\Http\Request;

class PackageIncludeExcludeController extends Controller
{
    protected $includeExclude;


    public function __construct(
        PackageIncludeExcludeService $includeExclude)
    {
        $this->includeExclude = $includeExclude;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($packageId)
    {
        $includeExcludes = $this->includeExclude->paginate(25);
        return view('back.program.include-exclude.index', compact('includeExcludes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($packageId)
    {
        return view('back.program.include-exclude.create', compact('programs', 'destinations'));
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
        if ($this->includeExclude->storeAndUpdate($packageSlug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('package.edit', $packageSlug);
        }
        toastr()->error('Something went wrong');
        return redirect()->route('package.edit', $packageSlug);
    }

}
