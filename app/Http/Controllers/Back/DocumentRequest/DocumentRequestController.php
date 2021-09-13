<?php

namespace App\Http\Controllers\Back\DocumentRequest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\DocumentRequest\DocumentRequestRequest;
use App\Services\DocumentRequest\DocumentRequestService;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{
    protected $documentRequest;

    public function __construct(DocumentRequestService $documentRequest)
    {
        $this->documentRequest = $documentRequest;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentRequests = $this->documentRequest->getData(25);
        // dd($documentRequests);
        return view('back.document-request.index', compact('documentRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.document-request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentRequestRequest $request)
    {
        $data = $request->all();
        if ($this->documentRequest->store($data)) {
            toastr()->success('Request Processed successfully');
            return redirect()->route('document-request.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('document-request.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documentRequest = $this->documentRequest->findByColumn('id', $id);
        return view('back.document-request.edit',compact('documentRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentRequestRequest $request, $id)
    {
        $data = $request->all();
        if ($this->documentRequest->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('document-request.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('document-request.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->documentRequest->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('document-request.index');
        }
        // toastr()->error('Something went wrong');
        // return redirect()->route('document-request.index');
    }

    public function getDocumentRequestForm(Request $request)
    {
        $id = $request->id;
        $documentRequest = $this->documentRequest->findByColumn('id', $id);
        return view('back.document-request.custom-form.document-request-form', compact('documentRequest'));
    }
}
