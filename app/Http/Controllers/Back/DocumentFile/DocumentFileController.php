<?php

namespace App\Http\Controllers\Back\DocumentFile;

use App\Http\Controllers\Controller;
use App\Services\Document\DocumentService;
use App\Services\DocumnetFile\DocumentFileServie;
use Illuminate\Http\Request;

class DocumentFileController extends Controller
{
    protected $documentFile;

    protected $document;

    public function __construct(DocumentFileServie $documentFile, DocumentService $document)
    {
        $this->documentFile = $documentFile;
        $this->document = $document;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $documents = $this->documentFile->paginate(25);
        // return view('back.document.index', compact('documents'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($this->documentFile->store($data)) {
            toastr()->success('Request Processed successfully');
            return redirect()->route('document.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('document.index');
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
        // $documentFile = $this->documentFile->findByColumn('id', $id);
        // return view('back.documentFile.edit',compact('documentFile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if ($this->documentFile->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('document.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('document.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->documentFile->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('document.index');
        }
        // toastr()->error('Something went wrong');
        // return redirect()->route('document.index');
    }

    public function getDocumentFileForm(Request $request)
    {
        $document_id = $request->id;
        $documentFiles = $this->documentFile->findByColumns(['document_id' => $request->id], true);
        $document = $this->document->findByColumn('id', $document_id);
        return view('back.document.custom-form.document-file-form', compact('documentFiles','document'));
    }

    public function getDocumentFileView($id)
    {
        $documentFile = $this->documentFile->findByColumn('id', $id);
        return view('back.document.custom-form.document-file-view', compact('documentFile'));
    }
}
