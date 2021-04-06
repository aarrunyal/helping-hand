<?php

namespace App\Http\Controllers\Back\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\Blog\BlogRequest;
use App\Services\Blog\BlogService;
use App\Services\Blog\PageService;
use App\Services\Blog\ContactService;

class BlogController extends Controller
{
    protected $blog;

    public function __construct(BlogService $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = $this->blog->paginate(25);
        return view('back.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();
        if ($this->blog->store($data))
            return redirect()->route('blog.index');
        return redirect()->route('blog.create');
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
        $blog = $this->blog->findByColumn('slug', $slug);
        return view('back.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, $slug)
    {
        $data = $request->all();
        if ($this->blog->update($slug, $data))
            return redirect()->route('blog.index');
        return view('back.blog.edit', compact('blog'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if ($this->blog->delete($slug))
            return redirect()->route('blog.index');
        return redirect()->route('blog.index');
    }
}
