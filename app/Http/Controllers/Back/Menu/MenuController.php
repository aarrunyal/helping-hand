<?php


namespace App\Http\Controllers\Back\Menu;


use App\Http\Controllers\Controller;
use App\Http\Requests\Back\SiteSetting\SiteSettingRequest;
use App\Services\Blog\BlogService;
use App\Services\Media\MediaService;
use App\Services\Menu\MenuService;
use App\Services\Page\PageService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;
use Illuminate\Http\Request;

class MenuController extends Controller
{

    public $menu;


    public function __construct(
        MenuService $menuService

    )
    {
        $this->menu = $menuService;


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = $this->menu->paginate(10);
        return view('back.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->menu->store($request->all())) {
            toastr()->success('Request processed successfully');
            return redirect()->route('menu.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('menu.create');
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
        $menu = $this->menu->findByColumn('slug', $slug);
        return view('back.menu.edit', compact('menu'));
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
        $data = $request->all();
        if ($this->menu->update($id, $data)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('menu.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('menu.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->menu->delete($id)) {
            toastr()->success('Request processed successfully');
            return redirect()->route('menu.index');
        }
        toastr()->error('Something went wrong');
        return redirect()->route('menu.index');
    }

    public function getCustomForm($type)
    {
        $packages = null;
        $blogs = null;
        $programs = null;
        $pages = null;
        if ($type == 'page')
            $pages = $this->menu->getValues($type);
        if ($type == 'blog')
            $blogs = $this->menu->getValues($type);
        if ($type == 'package')
            $packages = $this->menu->getValues($type);
        if ($type == 'program')
            $programs = $this->menu->getValues($type);
        return view('back.menu.custom-form.custom-select', compact('type', 'packages', 'blogs', 'programs', 'pages'));
    }

    public function getChildForm($type)
    {
        $packages = null;
        $blogs = null;
        $programs = null;
        $pages = null;
        if ($type == 'page')
            $pages = $this->menu->getValues($type);
        if ($type == 'blog')
            $blogs = $this->menu->getValues($type);
        if ($type == 'package')
            $packages = $this->menu->getValues($type);
        if ($type == 'program')
            $programs = $this->menu->getValues($type);
        return view('back.menu.custom-form.child-form', compact('type', 'packages', 'blogs', 'programs', 'pages'));
    }
}
