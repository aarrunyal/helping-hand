<?php

namespace App\Http\Controllers\Back\Media;

use App\Services\DocumnetFile\DocumentFileServie;
use Illuminate\Http\Request;

class MediaController
{

    public $documentFile;


    public function __construct(DocumentFileServie $documentFile)
    {
        $this->documentFile = $documentFile;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentFiles = $this->documentFile->paginate(25);
        return view('back.media.index', compact('documentFiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('back.documentFile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($this->documentFile->store($request)) {
        //     toastr()->success('Request processed successfully');
        //     return redirect()->route('documentFile.index');
        // }
        // toastr()->error('Something went wrong');
        // return redirect()->route('documentFile.create');
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
        // $documentFile = $this->documentFile->findByColumn('id', $id);
        // return view('back.documentFile.edit', compact('documentFile'));
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
        // $data = $request->all();
        // if ($this->documentFile->update($id, $data)) {
        //     toastr()->success('Request processed successfully');
        //     return redirect()->route('documentFile.index');
        // }
        // toastr()->error('Something went wrong');
        // return redirect()->route('documentFile.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if ($this->documentFile->delete($id)) {
        //     toastr()->success('Request processed successfully');
        //     return redirect()->route('documentFile.index');
        // }
        // toastr()->error('Something went wrong');
        // return redirect()->route('documentFile.index');
    }
}

