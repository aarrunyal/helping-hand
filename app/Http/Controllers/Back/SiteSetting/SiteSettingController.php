<?php


namespace App\Http\Controllers\Back\SiteSetting;


use App\Http\Requests\Back\SiteSetting\SiteSettingRequest;
use App\Services\SiteSetting\SiteSettingService;

class SiteSettingController
{

    public $siteSetting;


    public function __construct(SiteSettingService $siteSetting)
    {
        $this->siteSetting = $siteSetting;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteSettings = $this->siteSetting->paginate(25);
        return view('back.site-setting.index', compact('siteSettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.site-setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiteSettingRequest $request)
    {
        $data = $request->all();
        if ($this->siteSetting->store($data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('site-setting.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('site-setting.create');
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
        $siteSetting = $this->siteSetting->findByColumn('id', $id);
        return view('back.site-setting.edit', compact('siteSetting'));
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
        if ($this->siteSetting->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('site-setting.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('site-setting.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->siteSetting->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('site-setting.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('site-setting.index');
    }
}
