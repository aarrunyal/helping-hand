<?php

namespace App\Http\Controllers\Back\Destination;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Blog\BlogRequest;
use App\Http\Requests\Destination\DestinationRequest;
use App\Http\RequestsBack\Page\PageRequest;
use App\Services\Destination\DestinationService;
use App\Services\Page\PageService;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    protected $destination;

    public function __construct(DestinationService $destination)
    {
        $this->destination = $destination;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = $this->destination->paginate(25);
        return view('back.destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.destination.create');
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
        if ($this->destination->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('destination.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('destination.create');
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
        $destination = $this->destination->findByColumn('slug', $slug);
        return view('back.destination.edit', compact('destination'));
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
        if ($this->destination->update($slug, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('destination.index', $slug);
        }
        toastr()->error('Something went wrong');
        return redirect()->route('destination.index', $slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->destination->delete($slug)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('destination.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('destination.index');

    }
}
