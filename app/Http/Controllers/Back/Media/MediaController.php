<?php


namespace App\Http\Controllers\Back\Media;


use App\Http\Controllers\Controller;
use App\Http\Requests\Back\SiteSetting\SiteSettingRequest;
use App\Services\Media\MediaService;
use Illuminate\Http\Request;

class MediaController extends Controller
{

    public $media;


    public function __construct(MediaService $mediaService)
    {
        $this->media = $mediaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = $this->media->paginate(10);
        return view('back.media.index', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->media->store($request)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('media.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('media.create');
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
        $media = $this->media->findByColumn('id', $id);
        return view('back.media.edit', compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(SiteSettingRequest $request, $id)
    {
        $data = $request->all();
        if ($this->media->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('media.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('media.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->media->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('media.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('media.index');
    }
}
